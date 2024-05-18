<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        
        /* Container for the form */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        /* Form element styling */
        form {
            display: flex;
            flex-direction: column;
        }

        input[type="email"],
        input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(100% - 22px); /* Adjusted for padding */
        }

        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Error message styling */
        .error-message {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* Success message styling */
        .success-message {
            color: green;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        @if ($errors->has('login_error'))
            <div class="error-message">{{ $errors->first('login_error') }}</div>
        @endif
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf 
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="submit" value="Login"><br>
        </form>
    </div>
</body>
</html>
