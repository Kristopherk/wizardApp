<?php 
include "connect.php";
if(isset($_POST['submit'])){
    $uuid=$_POST['uuid'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $code=$_POST['code'];
    $status=$_POST['status'];

    $sql="insert into `wizard_recruits` (uuid,name,description,code,status) 
    values($uuid,'$name','$description','$code','$status')";
    $result=mysqli_query($conn,$sql);

    if($result){
        // echo "Data inserted successfully";

        header('location:display.php');
    }
    // if(!$result){
    //     echo 'Connection error: ' . mysqli_connect_error();
    //  }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Wizard Recruiting List</title>
  </head>
  <body>
  
    <div class="container my-5">
       
    <button class="btn btn-secondary "><a href="display.php" class="text-light text-decoration-none">Go To List</a></button>

    <form method="post" class="my-5">
  <div class="mb-3">
    <label for="UUID" class="form-label">UUID:</label>
    <input type="text" class="form-control" id="UUID" placeholder="Enter UUID" name="uuid" autocomplete="off">
  </div>
  <div class="mb-3 ">
    <label for="wName" class="form-label">Wizard Name:</label>
    <input type="text" class="form-control" id="wName" placeholder="Enter Wizard Name" name="name" autocomplete="off">
  </div>
  <div class="mb-3 ">
    <label for="wDescription" class="form-label">Description:</label>
    <input type="text" class="form-control" id="wDescription" placeholder="Enter Wizard Description" name="description" autocomplete="off">
  </div>
  <div class="input-group mb-3">
  <select class="form-select" id="inputGroupSelect02" name="code">
    <option selected>Code...</option>
    <option value="beginner">beginner</option>
    <option value="experienced">experienced</option>
    <option value="expert">expert</option>
  </select>
  <label class="input-group-text" for="inputGroupSelect02">Options</label>
</div>

  <!-- <div class="mb-3">
    <label for="wCode" class="form-label"id="Wcode">Wizard Code:</label>
    <input type="text" class="form-control" id="Wcode" placeholder="Enter Wizard Code" name="code" autocomplete="off">
  </div> -->
  <label class="form-label">Status:</label>  
  <div class="form-check">      
  <input class="form-check-input" type="radio" name="status" id="activeStatus"  value="active">
  <label class="form-check-label" for="activeStatus">
    Active
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="inactiveStatus" value="inactive" checked>
  <label class="form-check-label" for="inactiveStatus">
    Inactive
  </label>
</div>


  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="activeStatus" name="status">
    <label class="form-check-label" for="activeStatus">Status:</label>
  </div> -->
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>