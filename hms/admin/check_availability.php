<?php
require_once ("include/config.php");
if (! empty($_POST["email"])) {
    $email = $_POST["email"];
    $result = mysql_query("SELECT email FROM patient WHERE email='$email'");
    $count = mysql_num_rows($result);
    echo $count;
    if ($count > 0) {
        echo "<span style='color:red'> Email already exists .</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
        
        echo "<span style='color:green'> Email available for Registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}
$datefrom = $_SESSION['Serverfixdatefrom'] ;
$dateto = $_SESSION['Serverfixdateto'] ;
$dateToday = date("Y-m-d") ;
if($datefrom <$dateToday && $dateToday<$dateto && $_SESSION['usertype'] !="admin" ){
    header('location:fixServer.php');
}
?>
