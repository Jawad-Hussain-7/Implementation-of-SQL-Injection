<?php
    require_once("../connention.php");
    try{
        if(isset($_POST['search'])){
            $search=$_POST['search'];
            $result = $db->query("SELECT * FROM products WHERE Name LIKE '%$search%'");
            if ($result->rowCount() > 0) {
                $arr = [];
                $inc = 0;
                while ($row = $result->fetch()) {
                    $jsonArrayObject = (array($row['ID'], $row['Name'], $row['Quantity']));
                    $arr[$inc] = $jsonArrayObject;
                    $inc++;
                }
                $json_array = json_encode($arr);
                echo $json_array;
            }
            else{
                echo "No items were found";
            }
        }
        else{
            echo "No items were found";
        }
    }catch(PDOException $ex){
        echo "Server Error";
    }
?>