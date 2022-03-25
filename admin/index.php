<?php

require ('../model/database.php');
require ('./controllers/vehicles.php');
require ('./controllers/classes.php');
require ('./controllers/types.php');
require ('./controllers/makes.php');

switch($action){
    case "list_makes":
        $makes = get_makes();
        include('view/make_list.php');
        break;

    case "add_make":
        add_make($make_name);
        header("Location: .?action=list_makes");
        break;

    case "delete_make":
        if($make_id){
            try{
                delete_make($make_id);
            }catch (PDOException $e){
                $error = "You cannot delete a Vehicle make if vehicles exist in the makes";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_makes");
        }
        break;

    case "list_classes":
        $classes = get_classes();
        include ('view/class_list.php');
        break;

    case "add_class" :
        add_class($class_name);
        header("Location: .?action=list_classes");
        break;

    case "delete_class":
        if($class_id){
            try{
                delete_class($class_id);
            }catch (PDOException $e){
                $error = "You cannot delete a vehicle class if Vehicle exists in the class";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_classes");
        }
        break;
    
    case "list_types":
        $types = get_types();
        include ('view/type_list.php');
        break;

    case "add_type":
        add_type($type_name);
        header("Location: .?action=list_types");
        break;

    case "delete_type":
        if($type_id){
            try{
                delete_type($type_id);
            }catch (PDOException $e){
                $error = "You cannot delete a vehicle type if vehicle exists in the type";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_types");
        }
        break;

    case "show_add_form":
        $type_name = get_type_name($type_id);
        $types = get_types();
        $class_name = get_class_name($class_id);
        $classes = get_classes();
        $make_name = get_make_name($make_id);
        $makes = get_makes(); 
        include('view/vehicle_add.php');
        break;

    case "add_vehicle":
        if(empty($year) || empty($model) || empty($price)){
            $error = "Please Insert into all fields.";
            include('view/error.php');
        } else {
            add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
            header("Location: .?vehicle_id=$vehicle_id");
        }
        break;

    case "delete_vehicle":
        if($vehicle_id){
            delete_vehicle($vehicle_id);
            header("Location: .?action=list_vehicles");
        } else {
            $error = "Missing or incorrect Vehicle id";
            include('view/error.php');
        }
        break;

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