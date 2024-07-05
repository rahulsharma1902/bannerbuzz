<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #e4004e;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            margin-top: 0;
            font-size: 18px;
            color: #4CAF50;
        }
        .content p {
            margin: 10px 0;
            font-size: 16px;
        }
        .content strong {
            color: #4CAF50;
        }
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #888;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Inquiry</h1>
        </div>
        <div class="content">
            <h2>Contact Details</h2>
            <p><strong>Full Name:</strong> {{ $details['name'] }}</p>
            <p><strong>Email Address:</strong> {{ $details['email'] }}</p>
            <p><strong>Phone Number:</strong> {{ $details['number'] }}</p>
            <p><strong>Company Name:</strong> {{ $details['company'] }}</p>
            <p><strong>Address:</strong> {{ $details['address'] }}</p>
            <p><strong>Country:</strong> {{ $details['country'] }}</p>
            <p><strong>State:</strong> {{ $details['state'] }}</p>
            <p><strong>City:</strong> {{ $details['city'] }}</p>
            <h2>Message</h2>
            <p><strong>Email Topic:</strong> {{ $details['topic'] }}</p>
            <p><strong>Subject:</strong> {{ $details['subject'] }}</p>
            <p><strong>Inquiry:</strong> {{ $details['inquiry'] }}</p>
        </div>
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
