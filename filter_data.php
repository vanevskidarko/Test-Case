<?php 

include 'fetch_json.php';

$text_priority = 6;

$rating_prioritiy = 2;

$date_priority = 1;

if(isset($_POST['submit'])){
    print_r($_POST);
    $order_by_rating    = $_POST['order_by_rating'];
    $order_by_date      = $_POST['order_by_date'];
    $minimum_rating     = $_POST['minimum_rating'];
    $text_prio          = $_POST['text_prio'];


    foreach($json_data as $key=>$item){
        if($item->rating < $_POST['minimum_rating'] ){
           unset($json_data[$key]);
        }
    }
    function hasTextPriority($reviewText){
        return strlen($reviewText) > 0;
    }
    usort($json_data, function($a, $b) { //Sort the array using a user defined function
        $a_score = 0;
        $b_score = 0;
        


        if ($_POST['text_prio'] === "Yes") {
          $a_score = hasTextPriority($a->reviewText) ? -$text_priority : $text_priority;
          $b_score = hasTextPriority($b->reviewText) ? -$text_priority : $text_priority;
        }
        
        // Sort by rating
        if ($_POST['order_by_rating'] === "Highest First") {
          $a_score += $a->rating === $b->rating ? 0 : ($a->rating > $b->rating ? -$rating_prioritiy : $rating_prioritiy);
          $b_score += $b->rating === $a->rating ? 0 : ($b->rating > $a->rating ? -$rating_prioritiy : $rating_prioritiy);
        } else {
          $a_score += $a->rating === $b->rating ? 0 : ($a->rating > $b->rating ? $rating_prioritiy : -$rating_prioritiy);
          $b_score += $b->rating === $a->rating ? 0 : ($b->rating > $a->rating ? $rating_prioritiy : -$rating_prioritiy);
        }
        
        // Sort by date
         $a_date = new DateTime($a->reviewCreatedOnDate);
         $b_date = new DateTime($b->reviewCreatedOnDate);
        
        if ($_POST['order_by_date'] === "Newest First") {
          $a_score += $a_date > $b_date ? -$date_priority : $date_priority;
          $b_score += $b_date > $a_date ? -$date_priority : $date_priority;
        } else {
          $a_score += $a_date > $b_date ? $date_priority : -$date_priority;
          $b_score += $b_date > $a_date ? $date_priority : -$date_priority;
        }
        
        // -1 means go left, 1 means go right, 0 means stay
        return $a_score === $b_score ? 0 : ($a_score > $b_score ? 1 : -1);
    });


    echo '<pre>';
    print_r($json_data);
} else {
    echo "Error";
}

?>