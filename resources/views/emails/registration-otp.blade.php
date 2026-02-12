<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="padding: 30px 0;">

<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden;">

    <!-- Image -->
    <tr>
        <td align="center" style="padding:0;">
            <img src="cid:PromotionalBook.jpeg"
                 alt="Promotional Book"
                 style="width:100%; max-width:600px; display:block;">
        </td>
    </tr>

    <!-- Content -->
    <tr>
        <td style="padding:30px; text-align:center;">
            <h2>Email Verification</h2>

            <p>Please use the OTP below to verify your email.</p>

            <div style="margin:25px 0;">
                <span style="
                    display:inline-block;
                    padding:15px 30px;
                    font-size:28px;
                    letter-spacing:6px;
                    background:#f1f5f9;
                    border-radius:6px;
                    font-weight:bold;">
                    {{ $otp }}
                </span>
            </div>

            <p style="font-size:14px; color:#666;">
                This OTP expires in 10 minutes.
            </p>
        </td>
    </tr>

</table>

</td>
</tr>
</table>

</body>
</html>
