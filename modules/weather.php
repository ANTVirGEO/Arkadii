<?php
namespace modules;

class weather
{
    public $city = '';
    public $temp = '';

    public function __construct()
    {
        $this->getData();
    }

    private function getData ()
    {
        $data = json_decode(file_get_contents("http://api.wunderground.com/api/f881b6bf3196ffd6/conditions/q/CA/Novosibirsk.json", true));
        $this->city = $data->current_observation->display_location->city;
        $this->temp = $data->current_observation->temp_c;
    }
}