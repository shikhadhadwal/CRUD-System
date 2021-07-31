<!doctype html>

<?php

$insert = false;  //if it is false then insert alert does not appaer
$update = false;
$delete = false;

include('connection.php');

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `form` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset( $_POST['sno_edit'])){
    // Update the record
      $sno = $_POST["sno_edit"];
      $name = $_POST["name_edit"];
      $email = $_POST["email_edit"];
      $phone = $_POST["ph_edit"];

  
    // Sql query to be executed
    $sql = "UPDATE `form` SET `name` = '$name' , `email` = '$email' , `ph` = '$phone' WHERE `form`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
      $update = true;
  }
  else{
      echo "We could not update the record successfully";
  }
}

else {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $ph = $_POST["ph"];
//insert query
  $sql = "INSERT INTO `form` (`name`,`email`,`ph`)VALUES('$name','$email','$ph')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $insert = true; //if it is true then insert alert appears
  }
  else{
    echo "data does not inserted";
  }
}
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- css file used for table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    
    <title>PHP CRUD</title>



  </head>
  <body>

      <!-- edit  modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit modal
</button> -->

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- form to update details -->
      <div class="modal-body">
        <form method=post action=\php_tutorial\crud\home.php>
        <input type="hidden" name="sno_edit" id="sno_edit">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name_edit" id="name_edit" aria-describedby="name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email_edit" name="email_edit" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="ph" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="ph_edit" name="ph_edit" aria-describedby="emailHelp">
        </div>
        </div>
      <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
      </form>
  </div>
</div>
 <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHP CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="update.php">Edit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Contact us</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
 <!-- alerts for insert update delete -->
<?php
if($insert){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Succesfully!</strong> Submitted.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
<?php
if($update){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Succesfully!</strong> Updated.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
<?php
if($delete){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Succesfully!</strong> Deleted.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
<!-- form to insert details -->
<div class="container my-4" >
<h1>Enter your Details</h1>
<form method=post action="\php_tutorial\crud\home.php">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
    </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="ph" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="ph" name="ph" aria-describedby="emailHelp">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!-- table to display the data -->
<div class="container">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <!-- php select query -->
<?php
 $sql="SELECT * FROM `form`";
 $result = mysqli_query($conn, $sql);
 $sno=0;
 while($data = mysqli_fetch_assoc($result)){
   $sno=$sno+1;
?>
    <tr>
      <th scope="row"><?php echo $sno; ?></th>
      <td><?php echo $data['name']; ?></td>
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['ph']; ?></td>
      <td>
      <button class='edit btn btn-sm btn-primary' id="<?php echo $data['sno'] ?>">Edit</button> 
      <button class='delete btn btn-sm btn-primary' id="<?php echo "d".$data['sno'] ?>">Delete</button>   
      </td>
    </tr>  
 <?php
}
?>
</tbody>
</table>
</div>
<!-- JavaScript and jquery -->
<div class="container my-4"></div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
    crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <!-- js file used for table -->
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!-- jquery call function form this link - https://datatables.net/  used for tabless-->
    <script>
          $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>

    <!-- script used for update and delete -->
      <script>
      edits = document.getElementsByClassName('edit');
          Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
              console.log("edit ");
              tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[0].innerText;
        email= tr.getElementsByTagName("td")[1].innerText;
        phone= tr.getElementsByTagName("td")[2].innerText;
        console.log(name,email,phone);
        name_edit.value = name;
        email_edit.value = email;
        ph_edit.value = phone;
        sno_edit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
            })
          })

          deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/php_tutorial/crud/home.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
      </script>
  </body>
</html>