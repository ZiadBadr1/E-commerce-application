<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top of the page */
            min-height: 100vh;
            margin: 0;
        }

        .login-form {
            width: 65%;
            margin-top: 50px; /* Adjust the top margin as needed */
        }
    </style>
    <title>Login Page</title>
</head>
<body>
<form class="p-4 shadow-lg rounded login-form" action="{{route('admin.login')}}" method="POST">
    @csrf
    <h2 class="text-center mb-4">Login</h2>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" >
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
    <div class="d-grid gap-2 mb-3">
        <button class="btn btn-primary" type="submit">Login</button>
    </div>
    <div class="text-center">
        <a href="#" class="text-decoration-none">Forgot password?</a>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
