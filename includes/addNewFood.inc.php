<?php
include 'pdo_connect.php';

session_start();

if(isset($_POST['add']) && isset($_SESSION['userid'])){



        //formats the input. Every word first letter is upper cased. Eg. Dragon Fruit
        
        //units always lower caps

        $foodname = ucwords(strtolower($_POST['foodname']));
        $unit = strtolower($_POST['unit']);


        $query = "select foodname, unit from food where foodname = '$foodname' and unit = '$unit'";
        $params = array();
        $results = dataQuery($query, $params);
        
        
        if(sizeof($results) > 0 ){ //duplicate
        
            $Message = urlencode('found duplicate item in the food database');
        	header("location:../tracker.php?Message=".$Message);
        	
        } else { 
            
            $query = 'insert into food (foodname, unit) VALUES (?,?)';
            $params = array($foodname, $unit);
            $results = dataQuery($query, $params);
            
            
           $Message = urlencode('Success! item has been added to tracked');
        	header("location:../tracker.php?Message=".$Message);
            
        }
    
} else {
    
    //echo 'no session user available please log in';
    
    $Message = urlencode('no session user available, please log in test');
	header("location:../index.php?Message=".$Message);

}


?>