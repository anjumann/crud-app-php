<?php
    //connetong to database
    // INSERT INTO `incredia` (`sno`, `name`, `email`, `usn`, `password`, `timestamp`) VALUES (NULL, 'anjuman raj', 'anjumanraj2@gmail.com', '4nm20cs036@nmamit.in', '123456', current_timestamp());
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud";
    $insert = false;
    
    $conn = mysqli_connect($servername,$username,$password,$database);
    if (!$conn) {
      die("connection failed" . mysqli_connect_error());
    }

    if (isset($_GET['delete'])) {
      $sno = $_GET['delete'];
      echo $sno;
      $sql="DELETE FROM `incredia` WHERE `incredia`.`sno` = $sno";
      $result = mysqli_query($conn, $sql);
      

    }

    if ($_SERVER['REQUEST_METHOD']=='POST') {
      if (isset($_POST['snoEdit'])){
        //update the data  
        $sno = $_POST['snoEdit'];
        $name = $_POST["nameEdit"];
        $usn = $_POST["usnEdit"];
        $email = $_POST["emailEdit"];
        $password = $_POST["passwordEdit"];
        $sql = "UPDATE `incredia` SET `name` = '$name', `email` = '$email', `usn` = '$usn ', `password` = '$password' WHERE `incredia`.`sno` = $sno";
        $result = mysqli_query($conn,$sql);
      }
      else{
      $name = $_POST["name"];
      $usn = $_POST["usn"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $sql = "INSERT INTO `incredia` ( `name`, `email`, `usn`, `password`, `timestamp`) VALUES ( '$name', '$email', '$usn', '$password', current_timestamp());";
      $result = mysqli_query($conn,$sql);

      if ($result) {
        // echo "Success";
        $insert=true;
      }
      else {
        echo mysqli_error($conn);
      }
    }


    }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <title>Incredia</title>
</head>

<body>

  <!-- Edit modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Launch demo modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit the Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/crud/index.php" method="post">
          <input type="hidden" name="snoEdit" id="snoEdit">  
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input class="form-control" id="nameEdit" type="text" placeholder="Enter the Name" name="nameEdit"
                aria-label="default input example">
            </div>
            <div class="mb-3">
              <label for="usn" class="form-label">USN</label>
              <input class="form-control" id="usnEdit" type="text" placeholder="Enter the USN" name="usnEdit"
                aria-label="default input example">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" id="emailEdit" class="form-control" placeholder="Enter the Email" name="emailEdit"
                aria-describedby="emailHelp">
            </div>
      
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="text" class="form-control" name="passwordEdit" id="passwordEdit">
            </div>
      
            <button type="submit" class="btn btn-primary">Submit Data</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Incredia</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Something</a>
          </li>

          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-4 ">
    <h2>Enter the data</h2>
    <form action="/crud/index.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" id="name" type="text" placeholder="Enter the Name" name="name"
          aria-label="default input example">
      </div>
      <div class="mb-3">
        <label for="usn" class="form-label">USN</label>
        <input class="form-control" id="usn" type="text" placeholder="Enter the USN" name="usn"
          aria-label="default input example">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" id="usn" class="form-control" placeholder="Enter the Email" name="email"
          aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" id="password">
      </div>

      <button type="submit" class="btn btn-primary">Submit Data</button>
    </form>
  </div>

  <div class="container">



  </div>
  <div class="my-4  container">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S. no.</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">USN</th>
          <th scope="col">password</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `incredia`";
        $result = mysqli_query($conn,$sql);
        $sno=0;
        while ($row = mysqli_fetch_assoc($result)) {
          $sno=$sno+1;
          echo "<tr>
          <td>". $sno . "</td>
          <td>". $row['name'] . "</td>
          <td>". $row['email'] . "</td>
          <td>". $row['usn'] . "</td>
          <td>". $row['password'] . "</td>
          <td> <button type='button' id=". $row['sno']." class='edit btn btn-primary'>Update</button> <button type='button' id=d". $row['sno']." class=' delete btn btn-danger'>delete</button> </td>
          
        </tr>";


        }

      ?>


      </tbody>
    </table>
  </div>


  <!-- script  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    edits= document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("edit ", );
        tr= e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[1].innerText;
        email = tr.getElementsByTagName("td")[2].innerText;
        usn = tr.getElementsByTagName("td")[3].innerText;
        password = tr.getElementsByTagName("td")[4].innerText;
        console.log(name,email,usn);
        nameEdit.value=name;
        emailEdit.value=email;
        usnEdit.value=usn;
        passwordEdit.value=password;
        snoEdit.value=e.target.id;

        $('#editModal').modal('toggle');
      })
    })

    deletes= document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("delete ", );
        sno= e.target.id.substr(1,);

        
        if(confirm("r u sure to delete")){
          window.location = `/crud/index.php?delete=${sno}`;
        
        }
        else{
          console.log("ndsjiofoqna");

        }
      })
    })
  </script>
</body>

</html>