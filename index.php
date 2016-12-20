<?php
use modules\schedulers;
use modules\weather;
require_once('modules/weather.php');
require_once('modules/schedulers.php');

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
    $output = 'АРКААААААААААААДИЙ!!!';
} elseif ($text == 'тест') {
    $output = "ТЕСТ-ТЕСТ-ТЕСТ!!!";
} elseif ($text == 'WH') {
    $data = new schedulers();
    $timing = $data->timing;
    $output = "Ближайшие маршрутки №7 от Технопарка до дома = ";
} elseif ($text == 'погода') {
    $data = new weather();
    $city = $data->city;
    $temp = $data->temp;
    $output = "Погода для города " . $city . " сейчас " . $temp;
} else {
    $output = "WTF r u talking about! ЕВГЕЕЕЕЕНИИИИИИИЙ ИВААААААНООООВИИИИИЧ!!!!";
}
file_get_contents($website . "/sendmessage?chat_id=" . $chatId . "&text=" . $output);



