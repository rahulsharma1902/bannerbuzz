<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Status Update</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px 0;
            color: #333333;
        }
        .content h3 {
            color: #333333;
            margin-bottom: 10px;
        }
        .content p {
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            color: #777777;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <img src="{{ asset('front/img/clogo.png') }}" alt="Cre8ive Logo">
        </div>
        <div class="content">
            <h3>Order Status Update</h3>
            <p>{{ $maildata['message'] }}</p>
            <a href="{{ url('user-dashboard/order-detail') ?? ''}}/{{ $maildata['order_number'] }}" class="button">View Order Details</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Cre8ive. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
