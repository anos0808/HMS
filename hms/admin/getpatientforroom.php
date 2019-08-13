<?php

include ('include/config.php');
if (isset($_GET['roomId'])) {
    $k = $_GET['roomId'];
    //fetchtable rows from mysql db
    $sql = "select id, firstName from patient  where roomId  =  '$k'";
}
$return_arr = array();

//$sql = "select id,firstName from patient  where roomId  =  1";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $firstName = $row['firstName'];
 
    $return_arr[] = array("id" => $id,
        "firstName" => $firstName);
}

// Encoding array in JSON format
echo json_encode($return_arr);
?>