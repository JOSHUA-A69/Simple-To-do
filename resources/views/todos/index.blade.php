@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <div class="todo-header text-center">
        <h2 class="fw-bold">My Todo List</h2>
        <a href="{{ route('todos.create') }}" class="btn btn-primary btn-sm mt-2">
            <i class="fas fa-plus"></i> New Todo
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="todo-list-container">
                <div class="row">
                    @forelse($todos as $todo)
                        <div class="col-md-6 col-lg-4">
                            <div class="card todo-card {{ $todo->completed ? 'completed-card' : '' }}">
                                <div class="card-body">
                                    <h6 class="card-title {{ $todo->completed ? 'text-muted text-decoration-line-through' : '' }}">
                                        {{ $todo->title }}
                                    </h6>
                                    <p class="card-text {{ $todo->completed ? 'text-muted' : '' }}">
                                        {{ $todo->description ?? 'No description' }}
                                    </p>
                                    <div class="todo-actions">
                                        <form action="{{ route('todos.toggle', $todo) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn-action btn-complete {{ $todo->completed ? 'btn-success' : 'btn-outline-success' }}">
                                                <i class="fas {{ $todo->completed ? 'fa-check-circle' : 'fa-circle' }}"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('todos.edit', $todo) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <small class="todo-timestamp">
                                        {{ $todo->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No todos yet. Create your first todo!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection 