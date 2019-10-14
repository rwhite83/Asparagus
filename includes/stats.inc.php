<?php
    session_start();
    //check out the php manual for more about this
    //This is just for database connection
    include 'dbh.inc.php';

    try{
        $conn = new PDO("mysql:host=$dbserverName;dbname=$dbname", $dbuserName, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $ex){

        die("Database connection failed: " . $ex->getMessage());
    }
    //from here we select the table and display records of table using while loop
    
    $sql = "SELECT food.foodname, tracked.totalbought, tracked.totalwasted, user.username 
    FROM user
        INNER JOIN tracked ON user.userid = tracked.userID 
        INNER JOIN food ON food.foodID = tracked.foodID 
    WHERE user.userid = '".$_SESSION["userid"]."'";
    
    $statement=$conn->prepare($sql);
    
    $statement->execute();
    $json = [];
    while($row=$statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);  
        $json['foodname'][] = (String)$foodname;
        $json['totalbought'][] = (int)$totalbought;
        $json['totalwasted'][] = (int)$totalwasted;
        $json['totalconsumed'][] = [(String)$foodname, (int)($totalbought - $totalwasted)];
    }
        $json['username'][] = (String)$username;

    echo json_encode($json);
    
?>