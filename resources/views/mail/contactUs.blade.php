<!DOCTYPE html>
<html>
<head>
    <title>Contact Inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            margin: 10px 0;
        }
        .content strong {
            display: inline-block;
            width: 150px;
            color: #555;
        }
        .image-container {
            text-align: center;
            margin: 20px 0;
        }
        .image-container img {
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Contact Inquiry</h1>
        <div class="content">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Order Place:</strong> {{ ucfirst($contact->orderplace) }}</p>
            <p><strong>Order Number:</strong> {{ $contact->orderNumber }}</p>
        </div>
    </div>
</body>
</html>
