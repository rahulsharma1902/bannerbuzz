<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email update</title>
</head>
<body>
    <div class="container">
        <table>
            <tbody>
                <tr>
                    <td>
                        <p>
                            Dear {{ $mailData[0] ?? '' }} {{ $mailData[1] ?? '' }}
                        </p>
                        <p>
                            Your One Time Password for updating your email {{ $mailData[2] ?? '' }} is:
                        </p>
                        <h4>
                            {{ $mailData[3] ?? '' }}
                        </h4>
                        <p>
                            Please use this passcode for update your email. Do not share this passcode to anyone.
                        </p>
                        <p>
                            Thank you,
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

  