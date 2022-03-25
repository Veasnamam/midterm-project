<?php
function get_vehicles_by_type($type_id){
    global $db;
    if ($type_id){
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id
                    WHERE V.type_id = :type_id 
                    ORDER BY price DESC';
    } else{
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id 
                    ORDER BY price DESC';
    }
    $statement = $db->prepare($query);
    if($type_id){
        $statement->bindValue(':type_id', $type_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make($make_id){
    global $db;
    if ($make_id){
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id
                    WHERE V.make_id = :make_id ORDER BY price DESC';
    } else{
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id 
                    ORDER BY price DESC';
    }
    $statement = $db->prepare($query);
    if($make_id){
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($class_id){
    global $db;
    if ($class_id){
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id
                    WHERE V.class_id = :class_id ORDER BY price DESC';
    } else{
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id 
                    ORDER BY price DESC';
    }
    $statement = $db->prepare($query);
    if($class_id){
        $statement->bindValue(':class_id', $class_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function sort_vehicles_price(){
    global $db;
        $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
                  FROM vehicles V
                  LEFT JOIN types T ON V.type_id = T.type_id
                  LEFT JOIN makes M ON V.make_id = M.make_id
                  LEFT JOIN classes C ON V.class_id = C.class_id
                    ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;    
}

function sort_vehicles_year(){
    global $db;
    $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.makeName, C.className, T.typeName 
              FROM vehicles V
              LEFT JOIN types T ON V.type_id = T.type_id
              LEFT JOIN makes M ON V.make_id = M.make_id
              LEFT JOIN classes C ON V.class_id = C.class_id
                ORDER BY year DESC';
    
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}


function delete_vehicle($vehicle_id){
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id){
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
              VALUES (:year, :model, :price, :make_id, :type_id, :class_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}
?>