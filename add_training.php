<?php 
require_once  
'../private/initialize.php';//initialize the web site 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<title>CSS Template</title> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel=stylesheet type=text/css href=style.css> 
</head> 
<body> 
<div class="header"> 
ActiveAtHome <br> 
Add - update - view activities and trainers in training <br> 
</div> 
<div class="row"> 
<div class="column side"> 
<?php include 'navigation.html';?> 
</div> 
<div class="column middle"> 
<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST') { 
$args=[];//in $args array we collect all the new values 
$args['name']=$_POST['name']; 
$args['email']=$_POST['email']; 
$args['location']=$_POST['location']; 
$args['certifications']=$_POST['certifications']; 
$args['years']=$_POST['years']; 
$args['specialization']=$_POST['specialization']; 
$training = new Training;// we create a new object with the values we just entered 
$training->Name = $args["name"]; 
$training->Email = $args["email"]; 
$training->Location = $args["location"]; 
$training->Certifications = $args["certifications"]; 
$training->Years = $args["years"]; 
$training->Specialization = $args["specialization"]; 
$results = $training->create();//  
if($results){ 
echo "New Record added successfuly"; 
} 
} else { 
echo " <p> Use the following form to enter details for the new item (record / object) <br> "; 
echo "ATTENTION: all *** fields must be numbers </p>"; 
echo  "<form action=add_training.php method='post'>"; 
echo "<table>"; 
echo "<tr> <td> Name </td> <td> <input type='text' name ='name'> </td> </tr>"; 
echo "<tr> <td> Email </td> <td> <input type='text' name ='email'> </td> </tr>"; 
echo "<tr> <td> Location *** </td> <td> <input type='text' name ='location'> </td> </tr>"; 
echo "<tr> <td> Certifications </td> <td> <input type='text' name ='certifications'> </td> </tr>"; 
echo "<tr> <td> Years </td> <td> <textarea name='years' rows='5' cols='30'> </textarea> </td> 
</tr>"; 
echo "<tr> <td> Specialization *** </td> <td> <input type='text' name ='specialization'> </td> 
</tr>"; 
echo "</table>";     
echo " <br> <br> <input type='submit' value='Add New' />"; 
echo "</form>"; 
} 
?> 
</div> 
<div class="footer"> 
BIS Development Module<br> 
Not real site 
</div> 
</body> 
</html> 
