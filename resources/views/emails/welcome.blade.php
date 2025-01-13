<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for registering with our application. We are excited to have you on board!</p>
    <p>If you have any questions, feel free to reach out to our support team.</p>
    <p>Best Regards,<br>The Team</p>
</div>
</body>
</html>
