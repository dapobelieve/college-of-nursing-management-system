<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <table style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <tr>
            <td style="text-align: center;">
                <img src="https://oysconme.edu.ng/images/Oysconmetrans.png" alt="Oysconme Logo" style="max-height: 80px; margin-bottom: 20px;">
                <h2 style="color: #004085;">Oyo State College of Nursing and Midwifery</h2>
                <hr style="border: none; height: 1px; background-color: #ddd; margin: 20px 0;">
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Name:</strong> {{ e($name) }}</p>
                <p><strong>Message:</strong></p>
                <div style="background-color: #f1f1f1; padding: 15px; border-radius: 6px; margin-top: 10px;">
                    <p style="white-space: pre-line; color: #333;">{{ e($messageBody) }}</p>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding-top: 30px; color: #888; font-size: 12px;">
                <p>&copy; {{ date('Y') }} Oyo State College of Nursing and Midwifery. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
