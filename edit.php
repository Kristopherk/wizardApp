<?php
include 'connect.php';
// include 'update.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php 
include "connect.php";
$uuid=$_GET['updateid'];
$sql="Select * from `wizard_recruits` where UUID=$uuid";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$uuid=$row['UUID'];
$name=$row['Name'];
$description=$row['Description'];
$code=$row['Code'];
$status=$row['Status'];



if(isset($_POST['submit'])){
    $uuid=$_POST['uuid'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $code=$_POST['code'];
    $status=$_POST['status'];

    $sql="update `wizard_recruits` set UUID=$uuid,Name='$name',Description='$description',Code='$code',Status='$status'
    where UUID=$uuid";
    $result=mysqli_query($conn,$sql);
    
    if($result){
        // echo "Data updated successfully";

        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
    

    }

?>

      <div class="container my-5">
       
       <button class="btn btn-secondary "><a href="display.php" class="text-light text-decoration-none">Go To List</a></button>
   
       <form method="post" class="my-5">
     <div class="mb-3">
       <label for="UUID" class="form-label">UUID:</label>
       <input type="text" class="form-control" id="UUID" placeholder="Enter UUID" name="uuid" autocomplete="off" value=<?php echo $uuid;?>>
     </div>
     <div class="mb-3 ">
       <label for="wName" class="form-label">Wizard Name:</label>
       <input type="text" class="form-control" id="wName" placeholder="Enter Wizard Name" name="name" autocomplete="off" value=<?php echo $name;?>>
     </div>
     <div class="mb-3 ">
       <label for="wDescription" class="form-label">Description:</label>
       <input type="text" class="form-control" id="wDescription" placeholder="Enter Wizard Description" name="description" autocomplete="off" value=<?php echo $description;?>>
     </div>
     <div class="mb-3">
       <label for="wCode" class="form-label">Wizard Code:</label>
       <input type="text" class="form-control" id="Wcode" placeholder="Enter Wizard Code" name="code" autocomplete="off" value=<?php echo $code;?>>
     </div>
     <label class="form-label">Status:</label>  
     <div class="form-check">      
     <input class="form-check-input" type="radio" name="status" id="activeStatus"  value="active" <?php if ($row['Status'] == 'active') echo 'checked=checked';?>>
     <label class="form-check-label" for="activeStatus">
       Active
     </label>
   </div>
   <div class="form-check">
     <input class="form-check-input" type="radio" name="status" id="inactiveStatus" value="inactive"<?php if ($row['Status'] == 'inactive') echo 'checked=checked';?>>
     <label class="form-check-label" for="inactiveStatus">
       Inactive
     </label>
   </div>
   
   
     <!-- <div class="mb-3 form-check">
       <input type="checkbox" class="form-check-input" id="activeStatus" name="status">
       <label class="form-check-label" for="activeStatus">Status:</label>
     </div> -->
     <button type="submit" class="btn btn-primary" name="submit">Update</button>
   </form>
   
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>



