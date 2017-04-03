<?php
#security
//require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

$url = 'https://osu.ppy.sh/api/get_user?type=string&u=' . $this->raw_username . '&k=' . $this->api_key;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$content = json_decode($response, 1);

$data = [];
if (count($content) >= 1) {
    foreach ($content[0] as $key => $value) {
        $data[$key] = $value;
    }
}

?>