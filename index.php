<?php
define("dbhost", "localhost");
define("dbuser", "root");
define("dbpass", "");
define("dbname", "ucl_ug_2020");

$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname);
echo "Status: Connection successful<hr>"; 

if (!$conn){
  die("Database connection failed: " . mysqli_connect_error()); 
  echo "Status: You are not connected to database";
}
if (!$conn->set_charset("utf8")){
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
} 
/*else{
    printf("Current character set: %s\n", $conn->character_set_name());
}*/

$db_select = mysqli_select_db($conn, dbname);
if (!$db_select){
   die("Database selection failed: " . mysqli_error($conn));
   echo "Your database name is not selected properly";
}

$result = mysqli_query($conn, "SELECT progTitle FROM prog_info LIMIT 10");
$prog_array = array();
while ($row = mysqli_fetch_assoc($result))
{
  $prog_array[] = $row;
}

echo "<h4>Convert the array to string with encode()</h4>";
$encode = json_encode($prog_array);
print_r($encode);


echo "<br><br><h4>Convert the string to array with decode()</h4>";
$decode = json_decode($encode, true);
print_r($decode);


echo "<br><br><h4>Convert the string to array with echo print_r()</h4>";
echo print_r($prog_array, true);


echo "<br><br><h4>Convert the string to array with decode() and loop in clean text </h4>";
$clean = json_decode($encode);
echo "--Single result example--<br>";
echo $clean[2]->progTitle;

echo "<br>--Looping through the array--<br>";
//looping through, be aware limit has been set to 10 rows in query
foreach($clean as $title) {
  echo $title->progTitle . "<br>";
}


//if any errors
echo "<h4>Errors: " . json_last_error_msg(); 
mysqli_close($conn);
?>