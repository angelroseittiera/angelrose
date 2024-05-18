<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* General page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0; /* Added to remove default padding */
            display: flex;
            flex-direction: column; /* Changed to column for better alignment */
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* Changed to min-height for better vertical centering */
            color: #333;
        }
        
        /* Container for profile information */
        .profile-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Added margin for separation */
        }

        /* Link container styling */
        .link-container {
            text-align: center;
        }

        /* Link styling */
        .link-container a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        
        .link-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profile</h1>
        <p>Name: {{ $data[0]['name'] }}</p>
        <p>Email: {{ $data[0]['email'] }}</p>
    </div>

    <div class="link-container">
        <a href="{{ url('/viewuser') }}">View User</a>
        <a href="{{ url('/addproduct') }}">Add Product</a>
        <a href="{{ url('/viewproduct') }}">View Product</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>
</body>
</html>
