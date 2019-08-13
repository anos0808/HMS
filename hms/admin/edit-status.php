<?php 
require_once "RoomManagement.php";
$RoomManagement = new RoomManagement();
$room_id = $_GET["roomId"];
$patient_id = $_GET["id"];
$result = $RoomManagement->editRoom($room_id, $patient_id);
?>