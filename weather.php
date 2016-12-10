<?php

/**
 * Created by PhpStorm.
 * User: antvirgeo
 * Date: 10.12.16
 * Time: 17:24
 */
class weather
{
    public $city = '';
    public $data = [];

    public function __construct()
    {
        $this->getData();
    }

    private function getData ()
    {
        $this->data = file_get_contents("http://api.wunderground.com/api/Your_Key/conditions/q/CA/San_Francisco.json");
        echo '<pre>';
        print_r($this->data);
        echo '</pre>';
    }

}