<?php
include 'pdo_connect.php';

    $data = array("status"=> "fail", "foods" => "not yet retrieved from db");

    $query = 'select * from food';

    $params = array();

    $results = dataQuery($query, $params);
        
        $data['foods'] = $results;

        $json = json_encode($data);
        
        echo $json;

?>