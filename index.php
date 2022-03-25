<?php

require ('model/database.php');
require ('model/vehicles_db.php');
require ('model/type_db.php');
require ('model/class_db.php');
require ('model/make_db.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);


if(!$price){
    $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'list_vehicles';
    }
}

switch($action){
    

    default:

        $type_name = get_type_name($type_id);
        $types = get_types();
        $class_name = get_class_name($class_id);
        $classes = get_classes();
        $make_name = get_make_name($make_id);
        $makes = get_makes();
        $vehicles = get_vehicles_by_make($make_id);
        $vehicles = get_vehicles_by_type($type_id);
        $vehicles = get_vehicles_by_class($class_id);

        
            
        if($make_id){
            $vehicles = get_vehicles_by_make($make_id);
        } else if($type_id){
            $vehicles = get_vehicles_by_type($type_id);
        }else if($class_id){
            $vehicles = get_vehicles_by_class($class_id);
        }else if(($make_id && $type_id) || ($make_id && $class_id)){
            $vehicles = get_vehicles_by_make($make_id);
        }else if($type_id && $class_id){
            $vehicles = get_vehicles_by_type($type_id);
        }else if($make_id && $type_id && $class_id){
            $vehicles = get_vehicles_by_make($make_id);
        }else if($action == "sort_price"){
            $vehicles = sort_vehicles_price();
        }else if($action == "sort_year"){
            $vehicles = sort_vehicles_year();
        }
        
        include ('view/vehicle_list.php');

}
?>