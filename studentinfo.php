<?php
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "studentinfo"; 
 
// Create database connection 
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}




$query1 = mysqli_query($conn, "SELECT * FROM `studentinfo`");

$result = mysqli_num_rows($query1);

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>




  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap');

  *{
    margin: 0;
    padding: 0;

  }

  body{
    background-color: antiquewhite;
  }
        header{
            font-size: 24px;
            color: blueviolet;
            font-family: 'Montserrat', sans-serif;
            width: 100vw;
            height: 70px;
            background-color: rgb(34, 34, 34);
            position: fixed;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        table, th, td {
  border:1px solid black;
  padding: 10px; 
}




.tb-div{
    width: 100%;
    height: auto;
    margin-top: 90px;
    display: flex;
    padding: 20px 0;
    align-items: center;
    justify-content: center;
}


.table-info{
    width: 90%;
    height: 100%;
}

.new-data{
    width: 30px;
    height: 30px;
    background: white;
    position: absolute;
    top: 20px;
    right: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: bold;
    color: blueviolet;
    
}
    </style>
</head>
<body>

<header>
        Students Info
        <a class="new-data" href="insert-new.html" ><ion-icon name="add-outline"></ion-icon></a>
    </header>

    <div class="tb-div">
        <div class="table-info">

<table style="width:100%">
<!---------------------------------------->
  <tr>
    <th>Student ID</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Address</th>
    <th>Email</th>
    <th>Contact No.</th>
  </tr>
<!---------------------------------------->
<?php 
    for($i=1; $i<=$result;$i++)
{
     $row =  mysqli_fetch_array($query1)
 	?>
<tr>
    <td><?php echo $row['studId']; ?></td>
    <td><?php echo $row['lastName']; ?></td>
    <td><?php echo $row['firstName']; ?></td>
    <td><?php echo $row['middleName']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['contactNo']; ?></td>
  </tr>
  <?php } ?> 
 
</table>
</div>
</div>



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>