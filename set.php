<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '301591460:AAEhJBSP6m7Ym-O8TQN5-zDWvhYIsPZTAiU';
$BOT_NAME = 'arkadii_bot';
$hook_url = 'http://arkadii:8080/hook.php';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Set webhook
    $result = $telegram->setWebHook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}