<?php
#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/config.php';
$api_key = $osu_credentials['api_key'];

class Core
{
    private $api_key;
    private $raw_username;
    private $points;

    public function __construct()
    {
        global $api_key;
        $this->api_key = $api_key;
    }

    public function set_username($username)
    {
        if (isset($username) && !empty(trim($username))) {
            $this->raw_username = $username;
        }
    }

    public function set_properties()
    {
        require 'API calls/call_player_data.php';

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function set_points($points)
    {
        $this->points = $points;
    }

    public function get_points()
    {
        return $this->points;
    }

    public function get_username()
    {
        if (isset($this->username)) {
            return $this->username;
        }
    }

    public function get_api_key()
    {
        return isset($this->api_key) ? $this->api_key : 'No API key set...';
    }

    public function get_player_data()
    {
        require 'API calls/call_player_data.php';

        if (count($data) < 1) {
            return false;
        } else {
            return $data;
        }
    }

    public function get_player_rank()
    {
        if (isset($this->pp_rank)) {
            return $this->pp_rank;
        }
    }

    public function get_player_best()
    {
        require 'API calls/call_player_best.php';

        if (count($data) < 1) {
            return false;
        } else {
            return $data;
        }
    }
}

?>