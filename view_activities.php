View (for Activities) 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<title>CSS Template</title> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" type="text/css" href="style.css"> 
</head> 
<body> 
<div class="header"> 
ActiveAtHome <br> 
Add - Update - View Activities and Trainers in Training 
</div> 
<div class="row"> 
<div class="column side"> 
<?php include 'navigation.html';?>  
</div> 
<div class="column middle"> 
<?php  
include '../private/initialize.php';//initialize the web site 
include_once '../private/class_activities.php'; // include the Activities class 
$id = $_GET['id']; 
if(!$id) { 
echo "problem - redirect"; 
} else { 
echo $id; 
} 
$specific_activities = Activities::find_by_id($id);//call the find_by_id() function 
echo " <p> Details of the selected item </p> "; 
echo "<table>"; 
echo "<tr> <td><b> id </b> </td> <td>" . $specific_activities->ID . "</td> </tr>"; 
echo "<tr> <td> <b> Name </b> </td> <td>" . $specific_activities->Name . "</td> </tr>"; 
echo "<tr> <td> <b> Description </b> </td> <td>" . $specific_activities->Description . "</td> 
</tr>"; 
echo "<tr> <td> <b> Benefits </b> </td> <td>" . $specific_activities->Benefits . "</td> </tr>"; 
echo "<tr> <td> <b> price </b> </td> <td>" . $specific_activities->Price . "</td> </tr>"; 
echo "</table>"; 
?> 
</div> 
</div> 
<div class="footer"> 
BIS Design & Development Module<br> 
Not real site 
</div> 
</body> 
</html>
