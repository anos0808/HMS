<?php

   ob_start();
   session_start();
   if (isset($_POST['submit'])) {
       $_SESSION['invoiceId'] = $_POST['invoiceId'];
       $_SESSION['custID'] = $_POST['customerID'];  
       $_SESSION['name'] = $_POST['name'];  
       $_SESSION['companyName'] = $_POST['companyName'];   
       $_SESSION['address'] = $_POST['address'];   
       $_SESSION['phone'] = $_POST['phone']; 
       $_SESSION['Product1'] = $_POST['Product1'];   
       $_SESSION['Menge1'] = $_POST['Menge1'];
       $_SESSION['Product2'] = $_POST['Product2'];
       $_SESSION['Menge2'] = $_POST['Menge2']; 
       $_SESSION['Product3'] = $_POST['Product3'];
       $_SESSION['Menge3'] = $_POST['Menge3'];
       header('location:ex.php');
   }

 ?> 

<html>
<head>
<title>Create Bill</title>
</head>

<body>
<h2>Create Bill</h2>

<table>
<!--- begin html form; 
put action page in the "action" attribute of the form tag --->
<form action="" method="post">

<tr>
  <td>Invoice ID:</td>
  <td><input type="text" name="invoiceId" size="4" maxlength="4" required></td>
</tr>
<tr>
  <td>Customer ID:</td>
  <td><input type="Text" name="customerID" size="35" maxlength="50" required></td>
</tr>
<tr>
  <td>Name:</td>
  <td><input type="Text" name="name" size="35" maxlength="50" required></td>
</tr>
<tr>
  <td>Company Name:</td>
  <td><input type="Text" name="companyName" size="4" maxlength="4"required></td>
</tr>
<tr>
  <td>Address:</td>
  <td><input type="Text" name="address" size="16" maxlength="16"required></td>
</tr>
<tr>
  <td>Phone:</td>
  <td><input type="Text" name="phone" size="10" maxlength="10"required></td>
</tr>
<tr>
  <td>Product1</td>
  <td><input type="Text" name="Product1" size="10" maxlength="10"required></td>
    <td>Menge</td>
  <td><input type="Text" name="Menge1" size="10" maxlength="10"required></td>
</tr>

<tr>
  <td>Product2</td>
  <td><input type="Text" name="Product2" size="10" maxlength="10"required></td>
    <td>Menge</td>
  <td><input type="Text" name="Menge2" size="10" maxlength="10"required></td>
</tr>
<tr>
  <td>Product3</td>
  <td><input type="Text" name="Product3" size="10" maxlength="10"required></td>
    <td>Menge</td>
  <td><input type="Text" name="Menge3" size="10" maxlength="10"required></td>
</tr>
<tr>
  <td>Contractor:</td>
  <td><input type="checkbox" name="Contract" value="Yes" checked>Yes</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input type="submit" value="submit" name="submit">&nbsp;<input type="Reset"
value="Clear Form"></td>
</tr>
</form>
<!--- end html form --->
</table>
<div style="width: 50%;
height: 98%;

margin-top: -334px;
margin-left: 40%;">

</div>
</body>
</html>