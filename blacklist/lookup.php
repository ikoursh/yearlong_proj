<?php
$api_token = trim(file_get_contents('lookup_api_token.txt'));

$url = trim(sprintf("http://api.ipstack.com/%s?access_key=%s", htmlspecialchars($_GET["IP"]), $api_token));
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'GET'
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */
}
$json = json_decode($result);



echo sprintf("<p>IP: %s</p>", htmlspecialchars($json->ip));
echo sprintf("<p>IP type: %s</p>", htmlspecialchars($json->type));
echo sprintf("<p>Continent name: %s</p>", htmlspecialchars($json->continent_name));
echo sprintf("<p>Country name: %s</p>", htmlspecialchars($json->country_name));
echo sprintf("<p>Region name: %s</p>", htmlspecialchars($json->region_name));
echo sprintf("<p>City: %s</p>", htmlspecialchars($json->city));
echo sprintf("<p>Zip: %s</p>", htmlspecialchars($json->zip));
echo sprintf("<p>Flag: <img src='%s' alt='flag' width='20px'></p>", htmlspecialchars($json->location->country_flag));
echo sprintf("<a  target=\"_blank\" href='https://www.google.com/maps/@?api=1&map_action=map&center=%s,%s&zoom=13'>Approximate location</a>", htmlspecialchars($json->latitude), htmlspecialchars($json->longitude));

