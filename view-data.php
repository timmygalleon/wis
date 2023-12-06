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
    font-family: 'Montserrat', sans-serif;

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


        .form-div{
            display: block;
            margin: auto;
            margin-top: 100px;
            width: 600px;
            height: auto;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            border: 1px solid grey;

        }


        form{
            display: flex;
    justify-content: center;
    flex-wrap: wrap;
    justify-content: space-evenly;
        }

        .title{
            font-size: 30px;
            color: blueviolet;
            display: block;
            width: 100%;
            text-align: center;
            padding-bottom: 20px;
            font-weight: bold;
        }

        .input-field{
            flex-wrap: wrap;
            width: 40%;
        }


        input{
            width: 100%;
            height: 40px;
            border-radius: 10px;
            outline: none;
            border: 1px solid grey;
            padding-left: 20px;
            font-size: 18px;
            box-sizing: border-box;
            margin-top: 10px;
            margin-bottom: 30px;

        }

        ::placeholder{
            font-size: 18px;
            color: grey;
        }

        label{
            font-weight: bold;
        }


        .bottom-spacer{
            width: 100%;
            height: 50px;
        }


        .button-div{
            width: 100%;
            height: auto;
        }



        .edit-div{
            width: 100%;
            height: 30px;
        }

        .update-page{
            padding: 10px 20px;
            background: blueviolet;
            margin-left: 40px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

               .back{
            height: 40px;
            width: 40px;
  border-radius: 10px;

  background: blueviolet;
  color: white;
  font-size: 15px;
  text-decoration: none;
  font-weight: bold;
  position: absolute;
  top: 15px;
  left: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;


}



    </style>
</head>
<body>

<header>
        View Student Record
        <a href="index.php" class="back"><ion-icon name="caret-back-circle-outline"></ion-icon></a>
        
    </header>

<div class="form-div">

    <div class="title">Student Info</div>
    <form action="">
          <?php

$conn = mysqli_connect("localhost", "root", "", "studentinfo");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


        $eid =$_GET['editid'];
        $sql =mysqli_query($conn,"SELECT * FROM `studentinfo` WHERE studId='$eid'");
        while($row=mysqli_fetch_array($sql)){
        
        ?>
        
        <div class="input-field">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" readonly value="<?php echo $row['lastName']; ?>">
        </div>

        <div class="input-field">
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="First Name" readonly value="<?php echo $row['firstName']; ?>">
        </div>

        <div class="input-field">
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" placeholder="Middle Name" readonly value="<?php echo $row['middleName']; ?>">
        </div>

        <div class="input-field">
            <label for="address">Address</label>
            <input type="text" name="address" placeholder="Address" readonly value="<?php echo $row['address']; ?>">
        </div>

        <div class="input-field">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" readonly value="<?php echo $row['email']; ?>">
        </div>

        <div class="input-field">
            <label for="contact">Contact No.</label>
            <input type="text" name="contact"placeholder="Contact Number" readonly value="<?php echo $row['contactNo']; ?>">
        </div>


        <div class="edit-div"><a class="update-page" href="update-record.php?editid=<?php echo htmlentities($row['studId'])?>">Edit Info</a></div>

        
        <?php 

}?>
    </form>
</div>


    <div class="bottom-spacer"></div>



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>