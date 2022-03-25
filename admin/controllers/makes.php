<?php
require ('../model/make_db.php');


$make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

?>