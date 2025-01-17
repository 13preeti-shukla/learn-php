
<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'crud_operation';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



if (isset($_POST['save_btn'])) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $mobile = $_POST['mobile'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $query ="INSERT INTO `crud`(fname,lname,mobile,email,password) VALUES('$fname','$lname','$mobile','$email','$password')";
   $data = mysqli_query($connection,$query);
    echo "$data";
    die;

if($data){
    header('location:display.php');
    ?>
    <script type="text/javascript">
        alert("data save successfully");
    </script>
    <?php
}
else {
    ?>
    <script type="text/javascript">
    alert("try again");
</script>
<?php
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Curd Opretion</title>
</head>
<body>
    <h2>Curd Opretion </h3>
    <div>
        <form action="" method="POST" >
        <input type="text"name="fname" placeholder ="fname"><br><br>
        <input type="text"name="lname" placeholder ="lname"><br><br>
        <input type="number" name="mobile" placeholder="mobile"><br><br>
        <input type="email"name="email" placeholder ="email"><br><br>
        <input type="password" name="password" placeholder="password"><br><br>

        <input type="submit" name="save_btn" value ="save">
 

   
        
        </form>
    </div>



    <table border="5px" callpadding="10px"callspacing="0px">
    <th>First Name:-</th>
    <th>Last Name:-</th>
    <th>Mobile Number:-</th>
    <th>Email Id:-</th>
    <th>Password:-</th>
    <th>Actions</th>

    <?php 
    $query ="SELECT * FROM crud";
    $data =mysqli_query($connection,$query);
    $result = mysqli_num_rows($data);
    ?>
  <?php  if ($result > 0)?> <?php {?>
      <?php while($row=mysqli_fetch_array($data)){?>
    
         <tr>
<td><?php echo $row['fname'] ?></td>
<td><?php echo $row['lname'] ?></td>
<td><?php echo $row['mobile'] ?></td>
<td><?php echo $row['email'] ?></td>
<td><?php echo $row['password'] ?></td>
<!-- <td><a href='update.php?updatedid=<?php echo $row['id']; ?>'>edit</a></td>
<td><a href='deleted.php?deletedid=<?php echo $row['id']; ?>'>deleted</a></td> -->

        </tr> 
        <?php
       }
    }
    ?>

</table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>