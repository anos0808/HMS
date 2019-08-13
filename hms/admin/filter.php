  <?php
// if (isset($_POST["employee_id"])) {
    if (TRUE) {
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "hms");
    $query = "SELECT p.firstName,p.lastName ,CONCAT(address.street, ', ', address.streetNumber,', ',address.plz,' ',address.city) AS address,p.email,p.gender,p.roomId  FROM patient p
left join address address on p.addressId=address.id
 WHERE p.id = '" . $_POST["employee_id"] . "'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="color:red">';
    while ($row = mysqli_fetch_array($result)) {}
    $output .= '  
           </table>  
      </div>  
      ';
    echo $result;
}
?>
 