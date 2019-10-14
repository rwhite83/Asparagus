<?php

error_reporting(E_ALL);
ini_set('display_errors' , 1);




function dataQuery($query, $params){

    
    $dbuser = "asparagu_jt";
    $dbpass = "team8gumby";
    $dbname = "asparagu_main";

    //not used yet
        $queryType = explode(' ', $query);
        $dbconnection = null;

    //connecting to the DB
        try{
            $dbconnection = new PDO("mysql:host=localhost;dbname=$dbname", $dbuser ,$dbpass);

            // tells PDO to disable emulating prepared statements and use
            //actual prepared statements
            //insures the query and its parameter aren't parsed by PHP before sending
            //it to the MySQL server. prevents injections
            $dbconnection ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $dbconnection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOEXCEPTION $e){
            echo $e->getMessage();
            $errorCode = $e->getCode();
        }

    //getting the pdo_connect.php file ready for queries now
        try{
            $queryResults = $dbconnection->prepare($query);
            $queryResults->execute($params);

            // && $queryType[0] =='SELECT' ??
            //if($queryResults !=null){

                $results = $queryResults->fetchAll(PDO::FETCH_ASSOC);
                        
                return $results;
            //}

            //$queryResults = null; //close properly step one
            //$dbconnection = null; // close properly step two


        } catch(PDOException $e){
            $errorMsg = $e->getMessage();
            echo $errorMsg;
            return false;
        }

    


}

?>