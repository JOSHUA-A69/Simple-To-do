@extends('layouts.app')

@section('content')
    <style>
        .todo-form-container {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .todo-form-card {
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .todo-form-header {
            background: #007bff;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .todo-form-body {
            padding: 15px;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .btn-primary, .btn-secondary {
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #007bff; /* Changed to blue */
            border: none;
            color: white; /* White font */
        }

        .btn-secondary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .btn-secondary a {
            text-decoration: none;
            color: white;
            display: inline-block;
            padding: 10px 15px;
        }

        .btn-secondary a:hover {
            color: white;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .form-check-label {
            font-weight: 500;
            color: #333;
        }
        a {
            text-decoration: none;
        }
    </style>

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
