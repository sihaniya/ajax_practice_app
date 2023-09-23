<?php
include "./config/db.php";

$message ="";

// Get All Users
$userResult = $mysqli->query("SELECT `id`, `name` FROM users WHERE status='Active'");
// $su = $userResult->fetch_assoc();
    
if(isset($_POST['create_category'])) {
     // INSERT

     $name = $mysqli->real_escape_string($_POST['name']);  
     $status = $mysqli->real_escape_string($_POST['status']);    
  
     if($name != "" && $status != ""){
          $todoSaveResult = $mysqli->query("INSERT INTO `category`(`name`,`status`) VALUES('$name','$status')");
          if($todoSaveResult){
               $message ="Category Created successfully";
               header('Location:' . 'category.php?success=true&message='. $message);
          }else{
               $message ="feald! Retry.";
               header('Location:' . 'create-category.php?success=false&message=' . $message);
          }
    
     }else{
          $message ="All fields are required.";
          header('Location:' . 'create-category.php?success=false&message=' . $message);
     }
  
 }else if (isset($_POST['edit_category']))  {
     // EDIT

     $todo_id = $_GET['id'];

     $name = $mysqli->real_escape_string($_POST['name']);  
     $status = $mysqli->real_escape_string($_POST['status']); 

     if( $name != "" && $status != "" ){
          $categorySaveResult = $mysqli->query("UPDATE `category` SET `name`='$name', `status`='$status' WHERE id=".$_GET['id']);

     if($todoSaveResult){
          $message ="Category Updated successfully";
     }
     header('Location:' . ' category.php?success=true&message='. $message);
     
     }else{
          $message ="All fields are required.";
          header('Location:' . 'edit-category.php?success=false&message=' . $message);
     }
  
 }else if (isset($_GET['id']) && isset($_GET['action'])){
     // DELETE
     if($_GET['action'] == 'delete'){
          $category_id = $_GET['id'];
          $categoryGetResult = $mysqli->query("DELETE  FROM category WHERE id=" .$_GET['id']);
          if($categoryGetResult){
               $message ="category Delete successfully";
               header('Location:' .'category.php?success=true&message='. $message);
          }
     }
    

  }else if (isset($_GET['id'])){
    
     // Get All todos
     $categoryGetResult = $mysqli->query("SELECT * FROM category WHERE id=" .$_GET['id']);
     $categoryGetRow = $categoryGetResult->num_rows;
     $category = $categoryGetResult->fetch_assoc();
     if( $categoryGetRow == 0) {
           $message ="Something Went Wrong.";
           header('Location:' . 'todos.php?success=false&message=' . $message);
     }

  }else{

               // Admin
               $categoryGetResult = $mysqli->query("SELECT * FROM category");
               $categoryGetRow = $categoryGetResult->num_rows;
}

?>