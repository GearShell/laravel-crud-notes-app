<?php
// INSERT INTO `noteshell_tb` (`serialNo`, `name`, `title`, `description`, `dateTime`) VALUES (NULL, 'Ishan Tiwari', 'Laravel Testing', 'Testing website using Dusk', current_timestamp());
$insert = false;
$update = false;
$delete = false;
//Connecting to Database
$servername = "localhost";
$username  = "root";
$password = "";
$database = "notes_app_db";

// Creating the connection
$con = mysqli_connect($servername, $username, $password, $database);

// if Connection failed
if (!$con) {
  die("Sorry unable to connect to the database: " . mysqli_connect_error());
}
// else {
//   echo "connection was Successful <br>";
// }
if (isset($_GET['delete'])) {
  $serialNo = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `noteshell_tb` WHERE `serialNo` = $serialNo";
  $result = mysqli_query($con, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['serialNoEdit'])) {
    // Update the record
    $serialNo = $_POST["serialNoEdit"];
    $name = $_POST["nameEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

    // Sql query to be executed
    $sql = "UPDATE `noteshell_tb` SET `name` = '$name' `title` = '$title' , `description` = '$description' WHERE `noteshell_tb`.`serialNo` = $serialNo";
    $result = mysqli_query($con, $sql);
    if ($result) {
      $update = true;
    } else {
      echo "We could not update the record successfully";
    }
  } else {
    $name = $_POST["name"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Sql query to be executed
    $sql = "INSERT INTO `noteshell_tb` (`name`, `title`, `description`) VALUES ('$name', '$title', '$description')";
    $result = mysqli_query($con, $sql);


    if ($result) {
      $insert = true;
    } else {
      echo "The record was not inserted successfully because of this error ---> " . mysqli_error($con);
    }
  }
}
?>
<!-- HTML Starts Here -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <title>NoteShell - Easy Notes</title>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NoteShell</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <div>
    <h2 class="header text-center my-5" style="font-family: 'Shadows Into Light', cursive;">NoteShell - This is your space</h2>
  </div>
  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>x</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>x</span>
    </button>
  </div>";
  }
  ?>
  <form action="index.php" method="post">
    <div class="container my-5">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Notes Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Notes Description</label>
        <textarea class="form-control" id="desc" name="description" rows="3"></textarea>
      </div>
      <div class="text-center my-4">
        <button class="btn btn-outline-primary btn-lg" type="submit">Add Note</button>
      </div>
    </div>
  </form>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Serial No.</th>
          <th scope="col">Name</th>
          <th scope="col">Notes Title</th>
          <th scope="col">Notes Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `noteshell_tb` WHERE 1";
        $result = mysqli_query($con, $sql);
        $serialNo = 0;


        while ($row = mysqli_fetch_assoc($result)) {

          $serialNo = $serialNo + 1;
          echo "<tr>
                <th scope='row'>$serialNo</th>
                <td>" . $row['name'] . "</td>
                <td>" . $row['title'] . "</td>
                <td>" . $row['description'] . "</td>
                <td><button class='delete btn btn-sm btn-primary' id=d" . $row['serialNo'] .">Delete</button></td>
              </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/PHP_CRUD_App/index.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        } else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>