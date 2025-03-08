@extends('layouts.app')

@section('content')
    <style>
        .todo-header {
            margin-bottom: 2rem;
        }

        .todo-header a {
            margin-top: 10px;
        }

        .todo-list-container {
            max-height: 70vh; /* Limits the height of the list */
            overflow-y: auto; /* Enables vertical scrolling */
            padding-right: 10px; /* Prevents scrollbar overlap */
        }

        .todo-card {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            background-color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }

        .todo-card:hover {
            transform: scale(1.02);
        }

        .completed-card {
            background-color: #f8f9fa;
        }

        .todo-card h6 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .todo-card p {
            font-size: 1rem;
            color: #6c757d;
        }

        .todo-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-action {
            border: none;
            background: none;
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s ease-in-out;
            padding: 8px;
        }

        .btn-complete {
            color: #28a745;
        }

        .btn-complete:hover {
            color: #218838;
        }

        .btn-edit {
            color: #007bff;
        }

        .btn-edit:hover {
            color: #0056b3;
        }

        .btn-delete {
            color: #dc3545;
        }

        .btn-delete:hover {
            color: #c82333;
        }

        .todo-timestamp {
            display: block;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 15px;
        }

        a {
            text-decoration: none;
        }
    </style>

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