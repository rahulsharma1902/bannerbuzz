<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation Mail</title>
</head>
<body>
    <!-- <h3>
        {{ $mailData['payment_id'] ?? '' }}
    </h3>
    <p>
        {{ $mailData['order_id'] ?? '' }}
    </p> -->
    <div class="container">
        <table>
            <tbody>
                <tr>
                    <td>
                        <p>
                            Dear {{ $mailData['full_name'] ?? '' }}
                        </p>
                        <p>
                            Thank you for placing an order with us. We are pleased to confirm the receipt of your order #{{ $mailData['order_num'] ?? '' }}.
                        </p>
                        <p>
                            We appreciate the trust you have placed in us and aim to provide you with the highest quality of service.
                        </p>
                        <p>
                            Thank you for your purchase,
                        </p>
                        <p>
                            Best Regards,
                        </p>
                        <p>
                            https://cre8iveprinter.cre8iveprinter.co.uk/
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

  