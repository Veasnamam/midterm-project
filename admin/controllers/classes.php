<?php
require ('../model/class_db.php');


$class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}
?>