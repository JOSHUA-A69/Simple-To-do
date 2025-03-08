<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.2rem;
        }
        .container {
            max-width: 800px;
            margin: 100px auto 0;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
        }
        .btn-primary {
            background-color: #6c63ff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #5a54d1;
        }
        .btn-outline-primary {
            background: none;
            border: 2px solid #6c63ff;
            color: #6c63ff;
        }
        .btn-outline-primary:hover {
            background-color: #6c63ff;
            color: white;
        }
        .btn-outline-danger {
            background: none;
            border: 2px solid #ff6b6b;
            color: #ff6b6b;
        }
        .btn-outline-danger:hover {
            background-color: #ff6b6b;
            color: white;
        }
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div>
            <a href="{{ route('todos.index') }}">Todo List</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="footer">
        <span>&copy; 2025 Todo List App</span>
    </footer>
</body>
</html>
