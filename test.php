<!--JSON String to Multidimensional Array-->
<?php
$name = '[
			{"firstname": "Mugurel", "lastname":"Budara"}, 
			{"firstname": "Mihai", "lastname":"Preda"}
		]';
echo $name;

echo "<br><br><h4>Convert the string to array with decode() in clean text</h4>";
$decoded2 = json_decode($name);
// accessing property of object in array
echo $decoded2[0]->firstname . " " . $decoded2[0]->lastname;


echo "<br><br><h4>Convert the string to array with decode() in clean text example 2</h4>";
// $json same as example object above
// pass true to convert objects to associative arrays
$decode = json_decode($name, true);
// numeric/associative array access
echo $decode[1]['firstname']; 


//if any errors
echo "<h4>Errors: " . json_last_error_msg(); 
?>