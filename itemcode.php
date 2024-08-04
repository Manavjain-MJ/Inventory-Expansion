<?php

$conn = mysqli_connect("localhost", "root", "", "ajaxcrud");

if (isset($_POST['checking_add'])) {

  $item_fname = $_POST['item_fname'];
  $item_description = $_POST['item_description'];
  $item_category = $_POST['item_category'];
  
  $item_price = $_POST['item_price'];


  $item_image = $_FILES['item_image']['name'];
  $tempname = $_FILES["item_image"]["tmp_name"];
  $targetpath = "image/" . $_FILES["item_image"]["name"];
  

    if(move_uploaded_file($tempname, $targetpath)) {
      $stmt = mysqli_prepare($conn, "INSERT INTO ajaxitem (item_fname, item_description, item_category, updimage, item_price) VALUES (?, ?, ?, ?, ?)");
      mysqli_stmt_bind_param($stmt, "sssss", $item_fname, $item_description, $item_category, $item_image, $item_price);
      mysqli_stmt_execute($stmt);
  
      if (mysqli_stmt_affected_rows($stmt) > 0){
      //  move_uploaded_file($_FILES["item_image"]["tmp_name"],"images/".$_FILES['item_image']['name']);
      echo $return = "Item Successfully Stored";
    } else {
      echo $return = "Something Went Wrong";
    }
    mysqli_stmt_close($stmt);
}
}


  

  

if (isset($_POST["checking_edit"])) {
  $item_id = $_POST['item_id'];
  $result_array = [];

  $query = "SELECT * FROM ajaxitem WHERE id = '$item_id'";
  $query_run = mysqli_query($conn, $query);

  if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
      array_push($result_array, $row);
    }
    header('content-type: application/json');
    echo json_encode($result_array);
  } else {
    echo $return = "<h4>No Record found </h4>";
  }
}


if (isset($_POST["checking_update"])) {
  $id = $_POST["item_id"];
  $item_fname = $_POST['item_fname'];
  $item_description = $_POST['item_description'];
  $item_category = $_POST['item_category'];
  $item_price = $_POST['item_price'];
  $tmp_image = $_FILES['item_image']['tmp_name'];
  $item_image = $_FILES['item_image']['name'];

    $upload_dir = 'image/'; 
    $image_path = $upload_dir . $item_image;
    move_uploaded_file($tmp_image, $image_path);

    $stmt = mysqli_prepare($conn, "UPDATE ajaxitem SET item_fname=?, item_description=?, item_category=?, updimage=?, item_price=? WHERE id =?");
    mysqli_stmt_bind_param($stmt, "sssssi", $item_fname, $item_description, $item_category, $item_image, $item_price, $id);
    mysqli_stmt_execute($stmt);
  
    if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo $return = "Data Updated Successfully";
  } else {
    echo $return = "Something Went Wrong";
  }
}

if (isset($_POST["checking_delete"])) {
  $id = $_POST['item_id'];
  $query = "DELETE FROM ajaxitem WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);
  if ($query_run) {
    echo $return = "Item Deleted Successfully";
  } else {
    echo $return = "Something Went Wrong!";
  }
}
?>