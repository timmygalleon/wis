<?php
include_once 'connection.php';



$query1 = mysqli_query($conn, "SELECT * FROM `instructor` WHERE InstructorID ORDER BY InstructorID DESC");
$result = mysqli_num_rows($query1);



if(isset($_POST['update'])){

  $eid =$_GET['editid'];
    $studentID = $_REQUEST['studentID'];
    $courseID =   $_REQUEST['courseID'];
    $doe = $_REQUEST['doe'];
    $grade = $_REQUEST['grade'];


     $sql =mysqli_query($conn, "UPDATE `enrollment` SET `StudentID`='$studentID',`CourseID`='$courseID',`EnrollmentDate`='$doe',`Grade`='$grade' WHERE EnrollmentID='$eid'");




     


  if ($sql) {
    echo "<script>alert('Enrollment has been updated successfully!!');</script>";
    echo "<script>document.location='enrolled.php'</script>";
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
    height: 60%;
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



.custom-select {
      position: relative;
      display: inline-block;
      width: 100%;
    }

    /* Style for the select box */
    .custom-select select {
      display: none; /* Hide default select box */
    }

    /* Style for the custom input */
    .custom-select input {
      width: 100%;
    margin-top: 10px;
    border: 1px solid rgb(133, 133, 133);
    padding: 5px 10px;
    border-radius: 6px;
    outline: none;
    background-color: rgb(241, 241, 241);
    text-transform: capitalize;
    }

    /* Style for the dropdown arrow */
    .custom-select .select-arrow {
      position: absolute;
      top: 25px;
      right: 15px;
      transform: translateY(-50%);
    }

    /* Style for the dropdown options */
    .custom-select .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100%;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }

    /* Style for the dropdown options */
    .custom-select .dropdown-content a {
      color: black;
      padding: 5px 10px;
      text-decoration: none;
      display: block;
      font-size: 12px;
    }

    /* Style for the dropdown options on hover */
    .custom-select .dropdown-content a:hover {
      background-color: #ddd;
    }

    /* Show the dropdown options when the input is focused */
    .custom-select input:focus + .dropdown-content {
      display: block;
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

      <li>
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




      <li class="active">
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
      <span class="text">View & Update Enrollment Info</span>
    </div>







    
<div class="add-user-modal" id="myModal">
  <div class="add-user-frame">
  <?php

    $eid = $_GET['editid'];
    $sql=mysqli_query($conn,"SELECT * FROM `enrollment` WHERE EnrollmentID='$eid'");
    while($row=mysqli_fetch_array($sql)){
    ?>
    <form  method="post">
      <a href="enrolled.php" class="close-modal"><i class='bx bx-x'></i></a>
      
      <header>View & Update Enrollment Info</header>

      <div class="input-field">
        <label>Student ID</label>
        <input type="text" name="studentID" placeholder="Course Code" value="<?php echo $row['StudentID']; ?>" readonly>
      </div>

      <div class="input-field">
        <label>Course ID</label>
        <input type="text" name="courseID" placeholder="Credits" value="<?php echo $row['CourseID']; ?>" readonly>
      </div>

      <div class="input-field">
        <label>Enrollment Date</label>
        <input type="date" style="text-transform: lowercase;" name="doe" placeholder="Enrollment Date" value="<?php echo $row['EnrollmentDate']; ?>">
      </div>

      <div class="input-field">
        <label>Grade</label>
        <input type="number" name="grade" placeholder="Credits" value="<?php echo $row['Grade']; ?>">
      </div>



    

      <div class="save-btn">
        <button type="submit" name="update" onClick="return confirm('Data will be overwritten. Do you want to continue?');">Update Data</button>
      </div>

 <?php } ?>



    </form>

  </div>
    
</div>
























  </section>



<script>
    document.addEventListener("DOMContentLoaded", function() {
    var customSelect = document.querySelector(".custom-select");
    var input = customSelect.querySelector("input");
    var dropdownContent = customSelect.querySelector(".dropdown-content");
    var options = dropdownContent.querySelectorAll("a");

    options.forEach(function(option) {
      option.addEventListener("click", function() {
        input.value = option.textContent;
      });
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener("click", function(e) {
      if (!customSelect.contains(e.target)) {
        dropdownContent.style.display = "none";
      }
    });

    // Show the dropdown when clicking on the input
    input.addEventListener("click", function(e) {
      dropdownContent.style.display = "block";
      e.stopPropagation(); // Prevent the window click event from closing the dropdown
    });

    // Handle custom input
    input.addEventListener("input", function() {
      var inputValue = input.value.toLowerCase();
      options.forEach(function(option) {
        if (option.textContent.toLowerCase() === inputValue) {
          input.value = option.textContent;
          return;
        }
      });
    });
  });
</script>


  <script src="script.js"></script>

</body>
</html>
