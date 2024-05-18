<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            /* display: flex; */
            /* justify-content: center; */
            align-items: center;
            flex-direction: column;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px;
            max-width: 300px;
            text-align: center;
        }
        .product img {
            max-width: 150px;
            height: auto;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .product p {
            margin: 5px 0;
        }
        .product p.price {
            font-size: 1.2em;
            color: #333;
        }
        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #28a745; /* Green */
            color: white;
        }

        .delete-btn {
            background-color: #dc3545; /* Red */
            color: white;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            opacity: 0.8;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
       
    </style>
</head>
<body>

<a href="{{ url('/adminhome') }}">Back</a>

    <div class="product-container">
        @foreach($data as $item)
            <div class="product">
                <img src="{{ asset('storage/' . $item['url']) }}" alt="{{ $item['pname'] }}">
                <p><strong>{{ $item['pname'] }}</strong></p>
                <p>{{ $item['desc'] }}</p>
                <p class="price">${{ $item['price'] }}</p>
                <p>Quantity: {{ $item['qty'] }}</p>
                <a href="edit/{{ $item['id'] }}" class="edit-btn">Edit</a> 
                <a href="delete/{{ $item['id'] }}" class="delete-btn">Delete</a>
            </div>
        @endforeach
    </div>
</body>
</html>
