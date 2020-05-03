<?php

session_start();

$username="cs2019g6";
$password="cs2019g6pwd";
$database="cs2019g6";

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysqli_error($connection));
}

// Set the active MySQL database
$db_selected = mysqli_select_db($connection,$database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error($connection));
}

$midwife_id=$_SESSION['midwife_id'];

// Select all the rows in the markers table
$query1= "SELECT * FROM locations WHERE midwife_id='$midwife_id' AND status='active'";
$result = mysqli_query($connection,$query1);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<locations>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<locations ';
  echo 'mother_nic="' . $row['mother_nic'] . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'widwife_id="' . $row['midwife_id'] . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'status="' . $row['status'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</locations>';

?>
