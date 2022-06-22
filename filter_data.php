<?php 

include 'fetch_json.php';


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

    usort($json_data, function($a, $b) { //Sort the array using a user defined function
        $a_score = 0;
        $b_score = 0;
        


        if ($_POST['text_prio'] === "Yes") {
          $a_score = strlen($a->reviewText) > 0 ? -6 : 6;
          $b_score = strlen($b->reviewText) > 0 ? -6 : 6;
        }
        
        if ($_POST['order_by_rating'] === "Highest First") {
          $a_score += $a->rating === $b->rating ? 0 : ($a->rating > $b->rating ? -2 : 2);
          $b_score += $b->rating === $a->rating ? 0 : ($b->rating > $a->rating ? -2 : 2);
        } else {
          $a_score += $a->rating === $b->rating ? 0 : ($a->rating > $b->rating ? 2 : -2);
          $b_score += $b->rating === $a->rating ? 0 : ($b->rating > $a->rating ? 2 : -2);
        }
        
         $a_date = new DateTime($a->reviewCreatedOnDate);
         $b_date = new DateTime($b->reviewCreatedOnDate);
        
        if ($_POST['order_by_date'] === "Newest First") {
          $a_score += $a_date > $b_date ? -1 : 1;
          $b_score += $b_date > $a_date ? -1 : 1;
        } else {
          $a_score += $a_date > $b_date ? 1 : -1;
          $b_score += $b_date > $a_date ? 1 : -1;
        }
        
        
        return $a_score === $b_score ? 0 : ($a_score > $b_score ? 1 : -1);
    });


    echo '<pre>';
    print_r($json_data);
} else {
    echo "Error";
}

?>