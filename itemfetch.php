<?php
    $conn = mysqli_connect("localhost","root","","ajaxcrud");
    
    $query ="SELECT * FROM ajaxitem";
    $query_run = mysqli_query($conn,$query); 

    $result_array = [];
    if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $row) {
            array_push($result_array, $row);
        }
        header('content-type: application/json');
        echo json_encode($result_array);

    } 
    else
    {
        echo $return = "<h4>No Record found </h4>";
    }


?>