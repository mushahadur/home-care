<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নতুন ইউজার ভেরিফিকেশন</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc; color: #334155;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); overflow: hidden;">
        
        <!-- Header Section -->
        <tr>
            <td style="background-color: #0f172a; padding: 30px; text-align: center;">
                <h1 style="margin: 0; color: #38bdf8; font-size: 22px; font-weight: 700; letter-spacing: 0.5px;">অ্যাডমিন প্যানেল নোটিফিকেশন</h1>
            </td>
        </tr>
        
        <!-- Content Section -->
        <tr>
            <td style="padding: 40px 30px;">
                <h2 style="margin-top: 0; color: #1e293b; font-size: 20px; font-weight: 600; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px;">🔔 নতুন ইউজার ভেরিফিকেশন!</h2>
                
                <p style="color: #64748b; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">আপনার সিস্টেমে একজন নতুন ইউজার সফলভাবে তার অ্যাকাউন্ট ভেরিফাই করেছেন। ইউজারের বিস্তারিত তথ্য নিচে দেওয়া হলো:</p>
                
                <!-- Info Table -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f8fafc; border-radius: 8px; padding: 20px; margin-bottom: 30px; border: 1px solid #e2e8f0;">
                    <tr>
                        <td style="padding: 6px 0; font-weight: 600; color: #475569; width: 30%; font-size: 15px;">নাম:</td>
                        <td style="padding: 6px 0; color: #0f172a; font-size: 15px;">{{ $user_name }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 6px 0; font-weight: 600; color: #475569; font-size: 15px;">ইমেইল:</td>
                        <td style="padding: 6px 0; color: #0f172a; font-size: 15px; font-family: monospace;">{{ $user_email }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 6px 0; font-weight: 600; color: #475569; font-size: 15px;">ভেরিফাইড সময়:</td>
                        <td style="padding: 6px 0; color: #0f172a; font-size: 15px;">{{ now()->format('Y-m-d H:i:s') }}</td>
                    </tr>
                </table>
                
                <!-- Action Button -->
                <div style="text-align: center; margin: 35px 0 20px 0;">
                    <a href="{{ $action_url }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; text-decoration: none; padding: 12px 30px; font-size: 16px; font-weight: 600; border-radius: 6px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">ইউজার দেখুন</a>
                </div>
            </td>
        </tr>
        
        <!-- Footer Section -->
        <tr>
            <td style="background-color: #f1f5f9; padding: 20px 30px; text-align: center; border-top: 1px solid #e2e8f0;">
                <p style="margin: 0; color: #94a3b8; font-size: 12px;">This is an automated system notification from your Laravel Application.</p>
            </td>
        </tr>
    </table>
</body>
</html>
