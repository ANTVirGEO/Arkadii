<?php
/*set_time_limit(0);
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
} elseif ($text == 'погода') {
    $vah = new weather();
    $output = $vah->data;
} else {
    $output = "WTF r u talking about! ЕВГЕЕЕЕЕНИИИИИИИЙ ИВААААААНООООВИИИИИЧ!!!!";
}
file_get_contents($website . "/sendmessage?chat_id=" . $chatId . "&text=" . $output);*/
echo '<pre>';
print_r("VAH");
echo '</pre>';
$data = file_get_contents("http://api.wunderground.com/api/f881b6bf3196ffd6/conditions/q/CA/Novosibirsk.json", true);
//$date = json_encode($data);


echo '<pre>';
var_dump($date);
echo '</pre>';
die;
$vah = new weather();
$output = $vah->data;
echo '<pre>';
print_r($output);
echo '</pre>';