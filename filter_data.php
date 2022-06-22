<?php 

include 'fetch_json.php';

if(isset($_POST['submit'])){
    print_r($_POST);
    $order_by_rating    = $_POST['order_by_rating'];
    $order_by_date      = $_POST['order_by_date'];
    $minimum_rating     = $_POST['minimum_rating'];
    $text_prio          = $_POST['text_prio'];

    usort($json_data, function($a, $b) { //Sort the array using a user defined function
        if( $_POST['order_by_rating'] == "Highest First"){
            return $a->rating > $b->rating ? -1 : 1; //Compare the scores
        } else {
            return $a->rating > $b->rating ? 1 : -1; //Compare the scores
        }
    });


    echo '<pre>';
    print_r($json_data);
} else {
    echo "Error";
}

?>