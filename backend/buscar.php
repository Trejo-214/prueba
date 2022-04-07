<?php
include "connect.php";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dataBase", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM potencia';    
    $array = array();
    $array['bar'] = array(
        // $val['id'], $val['status'], "silver"
            ["id", "valor"] 
        );
    foreach ($conn->query($sql) as $row=>$val) {
        $array['data'][$row] = array(
            'id' => $val['id'],
            'status' => $val['status'],
            'fecha' => $val['reg_date']
        );
        array_push($array['bar'],["".$val['id']."",$val['status']]);
    }
    echo json_encode($array);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




?>