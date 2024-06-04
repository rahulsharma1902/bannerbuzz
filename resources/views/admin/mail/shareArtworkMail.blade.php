<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .content {
            padding: 20px;
        }
        .product-image {
            text-align: center;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
        }
        .button {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #f39610;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hello {{ $mailData['name'] }},</h1>
        </div>
        <div class="content">
            <p>Your friend would like you to check out this personalized design of a Processed Fabric Banners</p>
            <h2>Product Design:</h2>
            <div class="product-image">
                <img src="{{ asset($mailData['image']) }}" alt="Shared Artwork">
            </div>
            <p><strong>Note:</strong> This is my test mail</p>
            <p>Here’s how you can use this:</p>
            <p>Make your design and place an order to print your Processed Fabric Banners and more if you're ready. We have a range of over 300 products to choose from.</p>
            <a href="{{ url('/') }}" class="button">TAKE ME TO WEBSITE</a>
        </div>
        <div class="footer">
            <p>Questions or Concerns? We are available 24/7 at <a href="mailto:alerts@cre8ive.com">alerts@cre8ive.com</a> or call us at 1800005276.</p>
        </div>
    </div>
</body>
</html>
