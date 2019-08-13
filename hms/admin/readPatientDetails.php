  <?php
if (isset($_POST["employee_id"])) {
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "hms");
    $query = "SELECT p.firstName,p.lastName ,CONCAT(address.street, ', ', address.streetNumber,', ',address.plz,' ',address.city) AS address,p.email,p.gender,p.roomId  FROM patient p
left join address address on p.addressId=address.id
 WHERE p.id = '" . $_POST["employee_id"] . "'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="color:red">';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     <td width="30%" ><label Style="color :black;">FirstName</label></td>  
                     <td  width="70%"  Style="background-color: beige;">' . $row["firstName"] . '</td>  
                </tr>  
                 <tr>  
                     <td width="30%"><label Style="color :black;">LastName</label></td>  
                     <td width="70%" Style="background-color: aqua;">' . $row["lastName"] . '</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label Style="color :black;">Address</label></td>  
                     <td width="70%"  Style="background-color: beige;">' . $row["address"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label Style="color :black;">Email</label></td>  
                     <td width="70%" Style="background-color: aqua;">' . $row["email"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label Style="color :black;">Gender</label></td>  
                     <td width="70%" Style="background-color: beige;">' . $row["gender"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label Style="color :black;">Room</label></td>  
                     <td width="70%" Style="background-color: aqua;">' . $row["roomId"] . '</td>  
                </tr>  
           ';
    }
    $output .= '  
           </table>  
      </div>  
      ';
    echo $output;
}
?>
 