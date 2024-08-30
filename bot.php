<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$chat_id = $update["message"]["chat"]["id"];
$message = strtolower($update["message"]["text"]);

if($message == "/start") {
    sendMessage($chat_id, "🤖 Welcome to your new bot! I'm here to assist you. Type /help to see what I can do.");
} elseif($message == "/help") {
    sendMessage($chat_id, "🛠 Here are the commands you can use:\n\n/start - Start interacting with the bot\n/help - Get a list of available commands\n/info - Learn more about this bot\n/about - Know more about who created this bot\n/quote - Receive a motivational quote");
} elseif($message == "/info") {
    sendMessage($chat_id, "ℹ️ I'm a Telegram bot designed to assist you with various tasks. Use /help to see what I can do.");
} elseif($message == "/about") {
    sendMessage($chat_id, "👤 This bot was created by Waseem Khan. If you have any questions or need assistance, feel free to reach out.");
} elseif($message == "/quote") {
    $quotes = [
        "🌟 The only way to do great work is to love what you do. - Steve Jobs",
        "🚀 Success is not the key to happiness. Happiness is the key to success. - Albert Schweitzer",
        "💡 The best way to predict the future is to invent it. - Alan Kay",
        "🎯 Your time is limited, so don’t waste it living someone else’s life. - Steve Jobs"
    ];
    $random_quote = $quotes[array_rand($quotes)];
    sendMessage($chat_id, $random_quote);
} else {
    sendMessage($chat_id, "❓ I'm not sure how to respond to that. Type /help to see what I can do.");
}

function sendMessage($chat_id, $message) {
    $apiToken = "7537894194:AAFjftKR5XO_zathxXvL6Hvy5G-I9Q-ImBs";
    $url = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chat_id&text=".urlencode($message);
    file_get_contents($url);
}
?>
