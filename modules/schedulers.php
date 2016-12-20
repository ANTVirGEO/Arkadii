<?php
namespace modules;

class schedulers
{
    public $timing = '';

    public function __construct()
    {
        $this->getData();
    }

    private function getData ()
    {
        $data = file_get_contents("http://maps.nskgortrans.ru/components/com_planrasp/helpers/grasp.php?tv=mr&m=7&t=8&r=B&sch=23&s=1489%7C11&v=0", true);
        $curHour = (int) date("H");
        $curMinute = (int) date("i");
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
        foreach ($timeArr as $timeV)
            if (strlen($timeV) < 3 && $nextHour == 0)
                if ($curMinute < (int) $timeV)
                    $minutes[] = $curHour . ':' . $timeV;
            else {
                $minutes[] = $curHour . ':' . substr($timeV, 0, 2);
                if ($nextHour == 0)
                    $curHour = $nextHour = substr($timeV, strpos($timeV, '<span>') + 6, 2);
            }
        $this->timing = implode(", ", $minutes);
    }
}