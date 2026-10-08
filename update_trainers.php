<?php 
require_once '../private/initialize.php'; //initialize the web site 
?> 
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
// Ensure 'id' is passed in the URL 
if (isset($_GET['id'])) { 
$id = $_GET['id']; 
} else { 
// Handle the case where 'id' is not provided in the URL 
    echo "Error: ID not provided."; 
    exit; // or redirect to another page 
} 
 
echo "my id is: " . $id . "<br>"; 
 
// Find the specific training record by ID 
$specific_training = Training::find_by_id($id); // Call the find_by_id() function to find the record 
 
// Check if the training record is found 
if ($specific_training === null) { 
    echo "Error: No training record found for ID: " . $id; 
    exit; // Or redirect the user to another page 
} 
 
// Start checking for POST request 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    // Directly assign values from the form to the object's properties 
    $specific_training->Name = $_POST['name']; 
    $specific_training->Email = $_POST['email']; 
    $specific_training->Location = $_POST['location']; 
    $specific_training->Certifications = $_POST['certifications']; 
    $specific_training->Years = $_POST['years']; 
    $specific_training->Specialization = $_POST['specialization']; 
 
    // Update the record in the database 
    $results = $specific_training->Update(); 
 
    // Check if the update was successful 
    if ($results) { 
        echo "Successful updating"; 
    } else { 
        echo "Error: Could not update the record."; 
    } 
 
    // Show updated record details 
    echo " <p> Details of the updated item </p> "; 
     
    echo "<table>"; 
    echo "<tr> <td> <b> ID </b> </td> <td>" . $specific_trainers->ID . "</td> </tr>"; 
    echo "<tr> <td> <b> Name </b> </td> <td>" . $specific_trainers->Name . "</td> </tr>"; 
    echo "<tr> <td> <b> Email </b> </td> <td>" . $specific_trainers->Email . "</td> </tr>"; 
    echo "<tr> <td> <b> Location </b> </td> <td>" . $specific_trainers->Location . "</td> </tr>"; 
    echo "<tr> <td> <b> Certifications </b> </td> <td>" . $specific_trainers->Certifications . "</td> 
</tr>"; 
    echo "<tr> <td> <b> Years </b> </td> <td>" . $specific_trainers->Years . "</td> </tr>"; 
    echo "<tr> <td> <b> Specialization </b> </td> <td>" . $specific_trainers->Specialization . 
"</td> </tr>"; 
    echo "</table>"; 
} else { 
    // If there is no POST action, present the values of the record in a form to be updated 
    echo " <p> Use the following form to update the selected item <br> "; 
    echo "ATTENTION: all *** fields must be numbers </p>"; 
 
    echo "<form action='update_trainers.php?id=" . $id . "' method='post'>"; 
    echo "<table>"; 
    echo "<tr> <td> Name </td> <td> <input type='text' name='name' value='" . 
htmlspecialchars($specific_trainers->Name) . "'> </td> </tr>"; 
    echo "<tr> <td> Email </td> <td> <input type='text' name='email' value='" . 
htmlspecialchars($specific_trainers->Email) . "'> </td> </tr>"; 
    echo "<tr> <td> Location *** </td> <td> <input type='text' name='location' value='" . 
htmlspecialchars($specific_trainers->Location) . "'> </td> </tr>"; 
    echo "<tr> <td> Certifications </td> <td> <input type='text' name='certifications' value='" . 
htmlspecialchars($specific_trainers->Certifications) . "'> </td> </tr>"; 
    echo "<tr> <td> Years </td> <td> <textarea name='years' rows='5' cols='30'>" . 
htmlspecialchars($specific_trainers->Years) . "</textarea> </td> </tr>"; 
    echo "<tr> <td> Specialization *** </td> <td> <input type='text' name='specialization' value='" 
. htmlspecialchars($specific_trainers->Specialization) . "'> </td> </tr>"; 
    echo "</table>"; 
    echo " <input type='submit' value='Update Record' />"; 
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
 
 
