<?php
// إعدادات البوت
$botToken = "7824477402:AAEBkxuFDgI_UV29vDVhiKz5CXVMlekd8pI";  // ضع التوكن هنا
$chatId = "-1002462190110";  // ضع معرف المجموعة هنا

// رسالة الاختبار
$message = "🚀 هذا اختبار لإرسال رسالة من XAMPP إلى تيليجرام بدون POST!";

// إرسال الرسالة عبر API تيليجرام
$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = ['chat_id' => $chatId, 'text' => $message, 'parse_mode' => 'Markdown'];

$options = [
    'http' => [
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result) {
    echo "✅ تم إرسال الرسالة بنجاح!";
} else {
    echo "❌ حدث خطأ أثناء الإرسال.";
}
?>