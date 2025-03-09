@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endpush

@section('content')
    <div class="todo-form-container">
        <div class="todo-form-card">
            <div class="todo-form-header">
                Edit Todo
            </div>
            <div class="todo-form-body">
                <form action="{{ route('todos.update', $todo) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                            id="title" name="title" value="{{ old('title', $todo->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                            id="description" name="description" rows="3">{{ old('description', $todo->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="completed" name="completed" 
                                {{ $todo->completed ? 'checked' : '' }}>
                            <label class="form-check-label" for="completed">
                                Mark as completed
                            </label>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('todos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Todo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
