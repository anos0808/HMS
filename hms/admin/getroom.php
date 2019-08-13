<?php
include ('include/config.php');

$return_arr = array();

$query = "SELECT * FROM room ORDER BY id";

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $roomId = $row['roomId'];
    $floor = $row['floor'];
    $bed = $row['Bed'];
    
    $return_arr[] = array(
        "id" => $id,
        "roomId" => $roomId,
        "floor" => $floor,
        "Bed" => $bed
    );
}

// Encoding array in JSON format
echo json_encode($return_arr);
?>