<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '301591460:AAEhJBSP6m7Ym-O8TQN5-zDWvhYIsPZTAiU';
$BOT_NAME = 'arkadii_bot';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // log telegram errors
    // echo $e;
}