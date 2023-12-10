<?php
include_once 'connection.php';


 if (isset($_REQUEST['submit'])) 
 {

 	 $studentID =   $_REQUEST['studentID'];
      $courseID = $_REQUEST['courseID'];
 	 $doe = $_REQUEST['doe'];
    $grade = $_REQUEST['grade'];

   


  $sql = mysqli_query($conn,"INSERT INTO `enrollment`(`StudentID`, `CourseID`, `EnrollmentDate`, `Grade`) VALUES ('$studentID','$courseID','$doe','$grade')");



if($sql){
      echo "<script>alert('New Record Added!!');</script>";
      echo "<script>document.location='enrolled.php';</script>";
    }else{
      echo "<script>alert('Something went wrong!!');</script>";
    }



    
 }







$query1 = mysqli_query($conn, "SELECT * FROM `enrollment` WHERE EnrollmentID ORDER BY EnrollmentID DESC");
$result = mysqli_num_rows($query1);

if(isset($_GET['delid'])){
  $id =intval($_GET['delid']);
  $sql =mysqli_query($conn,"DELETE FROM `enrollment` WHERE EnrollmentID='$id'");
  echo"<script>alert('Record has been Deleted Successfully!!!)</script>";
  echo"<script>window.location='enrolled.php'</script>";

}



?>

<?php

$query2 = mysqli_query($conn, "SELECT * FROM `student` WHERE StudentID ORDER BY StudentID DESC");
$result2 = mysqli_num_rows($query2);


$query3 = mysqli_query($conn, "SELECT * FROM `course` WHERE CourseID ORDER BY CourseID DESC");
$result3 = mysqli_num_rows($query3);


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/enrolled.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
      <span class="text">Enrolled Students</span>

      <div class="search-bar">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search Student Data">
      </div>

      <div class="add-div">
        <button onclick="openModal()">
        <i class='bx bx-user-plus'></i>
        <span>Add User</span>
        </button>
      </div>
    </div>







<div class="table-div">

 <section class="table__body">
            <table  style="margin-bottom: 100px;" id="studentTable">
                <thead>
                        <th> Enrollment ID</th>
                        <th> Student ID</th>
                        <th> Course ID</th>
                        <th> Enrollment Date</th>
                        <th> Grade</th>
                        <th> Option</th>

                    </tr>
                </thead>
                <tbody>
                 <?php 
    for($i=1; $i<=$result;$i++)
{
     $row =  mysqli_fetch_array($query1)
     
 	?>                 
                  <tr>
                    <td><?php echo $row['EnrollmentID']; ?></td>
                    <td class="td-cap"><?php echo $row['StudentID']; ?></td>
                    <td class="td-cap"><?php echo $row['CourseID']; ?></td>
                    <td class="td-cap"><?php echo $row['EnrollmentDate']; ?></td>
                    <td><?php echo $row['Grade']; ?></td>
                    <td class="option">
                    <a href="view-update-enrolled.php?editid=<?php echo htmlentities($row['EnrollmentID'])?>" class="option-btn">
                    <i class='bx bx-show-alt'></i>
                    </a>
                    <a href="enrolled.php?delid=<?php echo htmlentities($row['EnrollmentID'])?>" onClick="return confirm('Do you want to delete this record (Student ID: #<?php echo htmlentities($row['EnrollmentID'])?>)?');" class="option-btn">
                    <i class='bx bx-trash'></i>
                    </a>
                    </td>

                  </tr>   
                  <?php } ?>    


                </tbody>
            </table>
        </section>






</div>



<!-- Modal content goes here -->

















<div class="add-user-modal" id="myModal">
  <div class="add-user-frame">

    <form action="">
      <button onclick="closeModal()" class="close-modal"><i class='bx bx-x'></i></button>
      <header>Add new Student</header>

      <div class="input-field">
        <label for="lname">Student ID</label>
         <div class="custom-select">
  <input style="width: 100%;" type="text" name="studentID" placeholder="Instructor Subject" readonly>
  <div class="dropdown-content">
<?php 
    for($i=1; $i<=$result2;$i++)
{
     $row =  mysqli_fetch_array($query2)
     
 	?>   
    <a href="#"><?php echo $row['StudentID']; ?></a>
<?php } ?> 
  </div>
  <div class="select-arrow">&#9660;</div>
</div>
      </div>

      <div class="input-field">
        <label for="fname">Course ID</label>
       <div class="custom-select2">
  <input style="width: 100%;" type="text" name="courseID" placeholder="Instructor Subject">
  <div class="dropdown-content2">
  <?php 
    for($i=1; $i<=$result3;$i++)
{
     $row =  mysqli_fetch_array($query3)
     
 	?>   
    <a href="#"><?php echo $row['CourseID']; ?></a>

<?php } ?> 
  </div>
  <div class="select-arrow">&#9660;</div>
</div>
      </div>

      <div class="input-field">
        <label for="mname">Date Of Enrollment</label>
        <input type="date" style="text-transform: lowercase;" name="doe" placeholder="Date Of Enrollment" required>
      </div>

      <div class="input-field">
        <label for="dob">Grade</label>
        <input style="text-transform: lowercase;" type="number" name="grade" placeholder="Grade" required>
      </div>

    

      <div class="save-btn">
        <button type="submit" name="submit">Add Data</button>
      </div>

    </form>

  </div>
    
</div>





  </section>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }

    function closeModal() {
        var modal = document.getElementById('myModal');
        var form = modal.querySelector('form');

        // Reset the form to clear input values
        form.reset();

        modal.style.display = 'none';
    }

  







    function searchTable() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tbody = table.getElementsByTagName("tbody")[0];
            tr = tbody.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
</script>



<script>
   document.addEventListener("DOMContentLoaded", function () {
  var customSelect = document.querySelector(".custom-select");
  var customSelect2 = document.querySelector(".custom-select2");

  // Function to handle custom select behavior
  function handleCustomSelect(customSelect, dropdownContent) {
    var input = customSelect.querySelector("input");
    var options = dropdownContent.querySelectorAll("a");

    options.forEach(function (option) {
      option.addEventListener("click", function () {
        input.value = option.textContent;
      });
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener("click", function (e) {
      if (!customSelect.contains(e.target)) {
        dropdownContent.style.display = "none";
      }
    });

    // Show the dropdown when clicking on the input
    input.addEventListener("click", function (e) {
      dropdownContent.style.display = "block";
      e.stopPropagation(); // Prevent the window click event from closing the dropdown
    });

    // Handle custom input
    input.addEventListener("input", function () {
      var inputValue = input.value.toLowerCase();
      options.forEach(function (option) {
        if (option.textContent.toLowerCase() === inputValue) {
          input.value = option.textContent;
          return;
        }
      });
    });
  }

  // Get dropdown content elements
  var dropdownContent = customSelect.querySelector(".dropdown-content");
  var dropdownContent2 = customSelect2.querySelector(".dropdown-content2");

  // Handle custom select behavior for the first dropdown
  handleCustomSelect(customSelect, dropdownContent);

  // Handle custom select behavior for the second dropdown
  handleCustomSelect(customSelect2, dropdownContent2);
});

</script>


  <script src="script.js"></script>

</body>
</html>
