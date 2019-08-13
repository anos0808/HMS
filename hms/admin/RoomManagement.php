<?php
require "DBController.php";

class RoomManagement
{

    function getPatientByRoom($statusId, $projectName)
    {
        $db_handle = new DBController();
        $query = "SELECT  * FROM Patient WHERE roomId= ? AND project_name = ?";
        $result = $db_handle->runQuery($query, 'is', array(
            $statusId,
            $projectName
        ));
        return $result;
    }

    function getAllRooms()
    {
        $db_handle = new DBController();
        $query = "SELECT * FROM room";
        $result = $db_handle->runBaseQuery($query);
        return $result;
    }

    function editRoom($room_id, $patient_id)
    {
        $db_handle = new DBController();
        $query = "update patient set roomId = ? WHERE id = ?";
        $result = $db_handle->update($query, 'ii', array(
            $room_id,
            $patient_id
        ));
        
        return $result;
    }
}
?>