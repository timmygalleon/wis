<?php
include_once 'connection.php';

if (isset($_REQUEST['submit'])) {
    $coursename =   $_REQUEST['coursename'];
    $coursecode = $_REQUEST['coursecode'];
    $coursecredit = $_REQUEST['coursecredit'];


        // Insert the new student record
        $sql = mysqli_query($conn, "INSERT INTO `course`(`CourseName`, `CourseCode`, `Credits`) VALUES ('$coursename','$coursecode','$coursecredit')");

        if ($sql) {
            echo "<script>alert('New Course Added!!');</script>";
            echo "<script>document.location='course.php';</script>";
        } else {
            echo "<script>alert('Something went wrong!!');</script>";
        }
    
}



$query1 = mysqli_query($conn, "SELECT * FROM `course` WHERE CourseID ORDER BY CourseID DESC");
$result = mysqli_num_rows($query1);

if(isset($_GET['delid'])){
  $id =intval($_GET['delid']);
  $sql =mysqli_query($conn,"DELETE FROM `course` WHERE CourseID='$id'");
  echo"<script>alert('Course has been Deleted Successfully!!!)</script>";
  echo"<script>window.location='course.php'</script>";

}



?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/course.css">
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
      <li class="active">
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
      <span class="text">Course List</span>

      <div class="search-bar">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search Course Data">
      </div>

      <div class="add-div">
        <button onclick="openModal()">
        <span>Add Course</span>
        </button>
      </div>
    </div>







<div class="table-div">

 <section class="table__body">
            <table  style="margin-bottom: 100px;" id="studentTable">
                <thead>
                        <th> Course ID</th>
                        <th> Course Name</th>
                        <th> Course Code</th>
                        <th> Credit/s</th>
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
                    <td><?php echo $row['CourseID']; ?></td>
                    <td class="td-cap"><?php echo $row['CourseName']; ?></td>
                    <td class="td-cap" style="text-transform: uppercase;"><?php echo $row['CourseCode']; ?></td>
                    <td class="td-cap"><?php echo $row['Credits']; ?></td>
                    <td class="option">
                    <a href="view-update-course.php?editid=<?php echo htmlentities($row['CourseID'])?>" class="option-btn">
                    <i class='bx bx-show-alt'></i>
                    </a>
                    <a href="course.php?delid=<?php echo htmlentities($row['CourseID'])?>" onClick="return confirm('Do you want to delete this Course (Student ID: #<?php echo htmlentities($row['CourseID'])?>)?');" class="option-btn">
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
      <header>Add new Course/Subject</header>

      <div class="input-field" style="width: 85%;">
        <label for="lname">Course Name</label>
        <input type="text" name="coursename" placeholder="Course Name" required>
      </div>

      <div class="input-field">
        <label for="fname">Course Code</label>
        <input type="text" style="text-transform: uppercase;" name="coursecode" placeholder="Course Code" required>
      </div>

      <div class="input-field">
        <label for="mname">Unit Credit</label>
        <input type="number" name="coursecredit" value="0" placeholder="Credits" required>
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


  <script src="script.js"></script>

</body>
</html>
