<?php

require ('../model/type_db.php');


$type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

?>