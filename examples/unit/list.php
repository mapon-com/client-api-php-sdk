<?php
use Mapon\MaponApi;

include __DIR__ . '/../../vendor/autoload.php';

date_default_timezone_set('GMT');

$apiKey = 'YOUR API KEY';
$apiUrl = 'https://mapon.com/api/v1/';

$api = new MaponApi($apiKey, $apiUrl);

$result = null;

try {
    $result = $api->get('route/list', array(
        'from' => '2017-01-01T00:00:00Z',
        'till' => '2017-01-01T23:59:59Z',
        'include' => array('polyline', 'speed')
    ));
} catch (\Mapon\ApiException $e) {
    echo 'API Error! Code: ' . $e->getCode() . ' Message: ' . $e->getMessage();
}

if ($result && $result->data) {
    foreach ($result->data->units as $unit_id => $unit_data) {
        echo "Unit: " . $unit_id . "\n";
        foreach ($unit_data->routes as $route) {
            if ($route->type == 'route') {
                echo "Route starts at: " . $route->start->time . ", "
                    . (isset($route->end) ? " ends at: " . $route->end->time : " not yet finished") . "\n";
                if (isset($route->polyline)) {
                    $points = $api->decodePolyline($route->polyline, $route->speed, strtotime($route->start->time));
                    echo "Lat/lng points in route: " . count($points) . "\n";
                }
            }
        }
    }
}