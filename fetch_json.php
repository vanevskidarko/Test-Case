<?php

  
// Read the JSON file 
$json = file_get_contents('reviews.json');
  
// Decode the JSON file
$json_data = json_decode($json,false);
  
// Display data
// print_r($json_data);
  
?>