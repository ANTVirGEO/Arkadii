<?php
echo '</pre>';
use modules\schedulers;
use modules\weather;
require_once('modules/weather.php');
require_once('modules/schedulers.php');
/*
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
    $output = "Ближайшие маршрутки №7 от Технопарка до дома = " . $timing;
} elseif ($text == 'погода') {
    $data = new weather();
    $city = $data->city;
    $temp = $data->temp;
    $output = "Погода для города " . $city . " сейчас " . $temp;
} else {
    $output = "WTF r u talking about! ЕВГЕЕЕЕЕНИИИИИИИЙ ИВААААААНООООВИИИИИЧ!!!!";
}
file_get_contents($website . "/sendmessage?chat_id=" . $chatId . "&text=" . $output);*/

$data = file_get_contents("http://maps.nskgortrans.ru/components/com_planrasp/helpers/grasp.php?tv=mr&m=7&t=8&r=B&sch=23&s=1489%7C11&v=0", true);
$curHour = (int) date("H");
$curMinute = (int) date("i");
$curHour = 14;
$curMinute = 54;
$time = explode("<span>" .  $curHour . "</span>", $data);
$time = explode("<span>" . ($curHour + 2) . "</span>", $time[1]);
$time = $time[0];
$time = str_replace("</div>", "", $time);
$time = str_replace("\r", "", $time);
$time = str_replace("\n", "", $time);
$time = str_replace("<div>", "|", $time);
$timeArr = explode("|", $time);
unset($timeArr[0]);
$timeArr[count($timeArr)] = substr($timeArr[count($timeArr)] , 0, 2);
$minutes = [];
$nextHour = 0;
echo '<pre>';
var_dump($timeArr);
echo '</pre>';
echo '<pre>';
var_dump($curHour);
echo '</pre>';
foreach ($timeArr as $timeV)
    $minutes[] = (strlen($timeV) < 3)
foreach ($timeArr as $timeV)
    if (strlen($timeV) < 3 || $nextHour == 0)
        if ($curMinute < (int) $timeV)
            $minutes[] = $curHour . ':' . $timeV;
        else {
            echo '<pre>';
            print_r($curHour);
            print_r($nextHour);
            echo '</pre>';
            $minutes[] = $curHour . ':' . substr($timeV, 0, 2);
            if ($nextHour == 0)
                $curHour = $nextHour = substr($timeV, strpos($timeV, '<span>') + 6, 2);
        }
//$this->timing = implode(", ", $minutes);

echo '<pre>';
var_dump(implode(", ", $minutes));
echo '</pre>';

