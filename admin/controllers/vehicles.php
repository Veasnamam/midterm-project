<?php
require ('../model/vehicles_db.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'list_vehicles';
    }
}
?>