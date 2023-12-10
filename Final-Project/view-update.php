<?php
include_once 'connection.php';



$query1 = mysqli_query($conn, "SELECT * FROM `student` WHERE StudentID ORDER BY StudentID DESC");
$result = mysqli_num_rows($query1);

if(isset($_GET['delid'])){
  $id =intval($_GET['delid']);
  $sql =mysqli_query($conn,"DELETE FROM `student` WHERE StudentID='$id'");
  echo"<script>alert('Record has been Deleted Successfully!!!)</script>";
  echo"<script>window.location='student.php'</script>";

}



if(isset($_POST['update'])){

  $eid =$_GET['editid'];
   $lname =   $_REQUEST['lname'];
    $fname = $_REQUEST['fname'];
    $mname = $_REQUEST['mname'];
    $dob = $_REQUEST['dob'];
    $email = $_REQUEST['email'];
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];

    $sql =mysqli_query($conn, "UPDATE `student` SET `LastName`='$lname',`FirstName`='$fname',`MiddleName`='$mname',`DateOfBirth`='$dob',`Email`='$email',`Phone`='$contact',`Address`='$address' WHERE StudentID='$eid'");


  if ($sql) {
    echo "<script>alert('The record has been updated successfully!!');</script>";
    echo "<script>document.location='student.php'</script>";
}else {
            echo "<script>alert('Something went wrong!!');</script>";
        }


  
}
 



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="main.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
      .active{
        background: #1d1b31;
      }


.add-user-modal {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #000000a1;
    z-index: 1000;
}


.close-modal {
    position: absolute;
    top: -15px;
    right: -15px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #009879;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 3px solid black;
    text-decoration: none;
}

.close-modal i {
    font-size: 25px;
    color: white;
    font-weight: bold;
}

.add-user-frame {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.add-user-frame form {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    width: 50%;
    height: 80%;
    border-radius: 10px;
    background-color: white;
    position: relative;
    flex-wrap: wrap;
    display: flex;
    justify-content: space-evenly;
}

form header {
    width: 100%;
    height: fit-content;
    text-align: center;
    background-color: #009879;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    color: white;
    font-size: 20px;
    padding: 10px;
}

.input-field {
    width: 40%;
    height: auto;
}

input {
    width: 100%;
    margin-top: 10px;
    border: 1px solid rgb(133, 133, 133);
    padding: 5px 10px;
    border-radius: 6px;
    outline: none;
    background-color: rgb(241, 241, 241);
    text-transform: capitalize;
}

.save-btn {
    width: 100%;
}

.save-btn button {
    margin-right: 40px;
    padding: 5px 10px;
    background-color: #009879;
    border: none;
    outline: none;
    border-radius: 5px;
    color: white;
    font-size: 18px;
    float: right;
}

form label {
    font-weight: bold;
}

     </style>

   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-html5' ></i>
      <span class="logo_name">WIS</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
      </li>

      <li  class="active">
        <a href="student.php">
          <i class='bx bxs-user-detail'></i>
          <span class="link_name">Student</span>
        </a>
      </li>
      <li>
        <a href="course.php">
          <i class='bx bx-book-content'></i>
          <span class="link_name">Course</span>
        </a>
      </li>
      <li>
        <a href="instructor.php">
          <i class='bx bx-face'></i>
          <span class="link_name">Instructor</span>
        </a>
      </li>




      <li>
        <a href="enrolled.php">
          <i class='bx bx-book-open'></i>
          <span class="link_name">Enrollment</span>
        </a>
      </li>





</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">View & Update Student Info</span>
    </div>







    
<div class="add-user-modal" id="myModal">
  <div class="add-user-frame">
  <?php

    $eid = $_GET['editid'];
    $sql=mysqli_query($conn,"SELECT * FROM `student` WHERE StudentID='$eid'");
    while($row=mysqli_fetch_array($sql)){
    ?>
    <form  method="post">
      <a href="student.php" class="close-modal"><i class='bx bx-x'></i></a>
      
      <header>View & Update Student Info</header>

      <div class="input-field">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row['LastName']; ?>">
      </div>

      <div class="input-field">
        <label for="fname">First Name</label>
        <input type="text" name="fname" placeholder="First Name" value="<?php echo $row['FirstName']; ?>">
      </div>

      <div class="input-field">
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" placeholder="Middle Name" value="<?php echo $row['MiddleName']; ?>">
      </div>

      <div class="input-field">
        <label for="dob">Date of Birth</label>
        <input style="text-transform: lowercase;" type="date" name="dob" placeholder="Date of Birth" value="<?php echo $row['DateOfBirth']; ?>">
      </div>

      <div class="input-field">
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Address" value="<?php echo $row['Address']; ?>">
      </div>

      <div class="input-field">
        <label for="email">Email</label>
        <input style="text-transform: lowercase;" type="email" name="email" placeholder="Email Address" value="<?php echo $row['Email']; ?>">
      </div>

      <div class="input-field">
        <label for="contact">Contact Number</label>
        <input type="tel" pattern="\+63\d{10}" maxlength="13" autocomplete="off" name="contact" placeholder="Contact Number" value="<?php echo $row['Phone']; ?>">
      </div>

      <div class="save-btn">
        <button type="submit" name="update" onClick="return confirm('Data will be overwritten. Do you want to continue?');">Update Data</button>
      </div>

 <?php } ?>



    </form>

  </div>
    
</div>
























  </section>


  <script src="script.js"></script>

</body>
</html>
