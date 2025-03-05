@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Todo List</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> New Todo
        </a>
    </div>

    <div class="row">
        @forelse($todos as $todo)
            <div class="col-md-4 mb-4">
                <div class="card h-100 {{ $todo->completed ? 'bg-light' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title {{ $todo->completed ? 'text-muted text-decoration-line-through' : '' }}">
                            {{ $todo->title }}
                        </h5>
                        <p class="card-text {{ $todo->completed ? 'text-muted' : '' }}">
                            {{ $todo->description ?? 'No description' }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="{{ route('todos.toggle', $todo) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $todo->completed ? 'btn-success' : 'btn-outline-success' }}">
                                        <i class="fas {{ $todo->completed ? 'fa-check-circle' : 'fa-circle' }}"></i>
                                    </button>
                                </form>
                                <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <small class="text-muted">
                                {{ $todo->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No todos yet. Create your first todo!
                </div>
            </div>
        @endforelse
    </div>
@endsection 