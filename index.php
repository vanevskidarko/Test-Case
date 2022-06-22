<?php

$oldJson = file_get_contents('reviews.json',1);

function filterJson($json){

    //Decodes a JSON string, When TRUE, it will be converted into associative arrays. 
    $array = json_decode($json, true);

    //count number of inner arrays
    $nbr = count($array);

    //get all keys of the inner array
    $keys = array_keys($array[0]);

    //iterate through the keys
    foreach($keys as $key){

        //check every inner array per key
        for($x=0; $x<$nbr; $x++){

            //if not 0 than break
            if($array[$x][$key] != "0"){
                break;
            }

            //if we didn't break before the last array, all values are 0 and we can unset those values.     
            if($x == $nbr-1){

                //iterate through the arrays 
                for($x=0; $x<$nbr; $x++){
                    unset($array[$x][$key]);
                }

            }
        }
    }

    $json = json_encode($array);
    return $json;
}

$newJson = filterJson($oldJson);

echo $newJson;

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>