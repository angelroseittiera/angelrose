<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        input[type="text"],
        input[type="number"],
        input[type="file"],
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
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('addproduct.post') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <input type="file" name="image"><br>
            <input type="text" name="pname" placeholder="product name"><br>
            <input type="text" name="desc" placeholder="description"><br>
            <input type="number" name="price" placeholder="price"><br>
            <input type="number" name="qty" placeholder="quantity"><br>
            <input type="submit" name="Add product" value="Add product"><br>
        </form>
    </div>
</body>
</html>
