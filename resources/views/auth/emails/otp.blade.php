<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your OTP Code</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; color: #333333;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); overflow: hidden;">
        <!-- Header / Logo Area -->
        <tr>
            <td style="background-color: #4f46e5; padding: 30px; text-align: center;">
                <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">YOUR APP NAME</h1>
            </td>
        </tr>
        
        <!-- Content Area -->
        <tr>
            <td style="padding: 40px 30px;">
                <h2 style="margin-top: 0; color: #111827; font-size: 20px; font-weight: 600;">Hello {{ $name }},</h2>
                <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin-bottom: 30px;">Please use the following One-Time Password (OTP) to verify your registration and complete your account setup.</p>
                
                <!-- OTP Box -->
                <div style="text-align: center; margin: 30px 0;">
                    <div style="display: inline-block; background-color: #f3f4f6; border: 1px solid #e5e7eb; padding: 15px 40px; border-radius: 6px; font-size: 32px; font-weight: 700; letter-spacing: 6px; color: #1f2937;">
                        {{ $otp }}
                    </div>
                </div>
                
                <p style="color: #ef4444; font-size: 14px; font-weight: 500; margin-bottom: 25px;">⏱️ This OTP is valid for 5 minutes.</p>
                
                <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 30px 0;">
                
                <p style="color: #9ca3af; font-size: 14px; line-height: 1.5; margin-bottom: 0;">If you did not request this verification, please safely ignore this email or contact support if you have concerns.</p>
            </td>
        </tr>
        
        <!-- Footer Area -->
        <tr>
            <td style="background-color: #f9fafb; padding: 20px 30px; text-align: center; border-top: 1px solid #f3f4f6;">
                <p style="margin: 0; color: #9ca3af; font-size: 12px;">&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
