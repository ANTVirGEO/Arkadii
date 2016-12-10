<?php

set_time_limit(0);

// Установка токена

$botToken = "301591460:AAEhJBSP6m7Ym-O8TQN5-zDWvhYIsPZTAiU";
$website = "https://api.telegram.org/bot" . $botToken;

// Получаем запрос от Telegram

$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);
$message = $update["message"];

// Получаем внутренний номер чата Telegram и команду, введённую пользователем в   чате

$chatId = $message["chat"]["id"];
$text = $message["text"];

// Пример обработки команды /start

if ($text == '/start') {
    $welcomemessage = 'АРКААААААААААААДИЙ!!!';

    // Отправляем сформированное сообщение обратно в Telegram пользователю

    file_get_contents($website . "/sendmessage?chat_id=" . $chatId . "&text=" . $welcomemessage);
}