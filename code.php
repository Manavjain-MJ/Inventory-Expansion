<?php

$conn = mysqli_connect("localhost", "root", "", "ajaxcrud");



if (isset($_POST['checking_add'])) {

  $fname = $_POST['fname'];
  $description = $_POST['description'];
  $price = $_POST['price'];


  $image = $_FILES['image']['name'];
  // $ext = pathinfo($image, PATHINFO_EXTENSION); 
  $tempname = $_FILES["image"]["tmp_name"];
  $targetpath = "dataimage/" . $_FILES["image"]["name"];


  if (move_uploaded_file($tempname, $targetpath)) {

    $stmt = mysqli_prepare($conn, "INSERT INTO ajaxcategory(fname, description, image, price) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $fname, $description, $image, $price);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
      echo $return = "Category Successfully Stored";
    } else {
      echo $return = "Something Went Wrong";
    }
  }
}


if (isset($_POST["checking_edit"])) {
  $category_id = $_POST['category_id'];
  $result_array = [];

  $query = "SELECT * FROM ajaxcategory WHERE id = '$category_id'";
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
  $id = $_POST["category_id"];
  $fname = $_POST['fname'];
  $description = $_POST['description'];
  $image = $_FILES['image']['name'];
  $tmp_image = $_FILES['image']['tmp_name'];
  $price = $_POST['price'];

  $upload_dir = 'dataimage/';
  $image_path = $upload_dir . $image;
  move_uploaded_file($tmp_image, $image_path);

  $stmt = mysqli_prepare($conn, "UPDATE ajaxcategory SET fname=?, description=?, image=?, price=? WHERE id =?");
  mysqli_stmt_bind_param($stmt, "ssssi", $fname, $description, $image, $price, $id);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo $return = "Data Updated Successfully";
  } else {
    echo $return = "Something Went Wrong";
  }
}

if (isset($_POST["checking_delete"])) {
  $id = $_POST['category_id'];
  $query = "DELETE FROM ajaxcategory WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);
  if ($query_run) {
    echo $return = "Data Deleted Successfully";
  } else {
    echo $return = "Something Went Wrong!";
  }
}
