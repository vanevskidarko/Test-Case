<?php

require 'fetch_json.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="filter_data.php">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Order By Rating</label>
                        <select class="form-control" name="order_by_rating" id="exampleFormControlSelect1">
                            <option>Highest First</option>
                            <option>Lowest First</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Minimum Rating</label>
                        <select class="form-control" name="minimum_rating" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Order By Date</label>
                        <select class="form-control" name="order_by_date" id="exampleFormControlSelect1">
                            <option>Oldest First</option>
                            <option>Newest First</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Prioritize By Text</label>
                        <select class="form-control" name="text_prio" id="exampleFormControlSelect1">
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>