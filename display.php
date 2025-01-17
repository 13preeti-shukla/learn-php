<?php include "index.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud opreation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="index.php"></a> add save</button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email Id</th>
      <th scope="col">Password</th>
      <th scope="col">Acctions</th>
    </tr>
  </thead>

  <?php
  $sql = "SELECT * FROM `crud`";
  $result =mysqli_query($connection,$sql);
  if ($result) {
   while ($row=mysqli_fetch_assoc($result)) {
    $fname=$row['fname'];
    $lname=$row['lname'];
    $mobile=$row['mobile'];
    $email=$row['email'];
    $password =$row['password'];
    echo ' <tr>
      <th scope="row">'.$fname.'</th>
      <td>'.$lname.'</td>
      <td>'.$mobile.'</td>
      <td> '.$email.'</td>
      <td>'.$password.'</td>
       <td ><a href="btn"class="btn-primary">update</a></td>
  <td><a href="btn " class="btn-success">delete</a></td>
    </tr>';



   }
  }
  
  ?>
 
</table>    </div>
</body>
</html>