<?php
include_once 'connection.php';

if (isset($_REQUEST['submit'])) {
  $fname = $_REQUEST['fname'];
    $lname =   $_REQUEST['lname'];
    $email = $_REQUEST['email'];
    $contact = $_REQUEST['contact'];

    // Check if the student with the same details already exists
    $checkQuery = mysqli_query($conn, "SELECT * FROM `instructor` WHERE `LastName`='$lname' AND `FirstName`='$fname'");


    if (mysqli_num_rows($checkQuery) > 0) {
        echo "<script>alert('Instructor already exists in the record!');</script>";
    } else {
        // Insert the new student record

        $sql = mysqli_query($conn, "INSERT INTO `instructor`(`FirstName`, `LastName`, `Email`, `Phone`) VALUES ('$fname','$lname','$email','$contact')");




        

        if ($sql) {
            echo "<script>alert('New Instructor Added!!');</script>";
            echo "<script>document.location='instructor.php';</script>";
        } else {
            echo "<script>alert('Something went wrong!!');</script>";
        }
    }
}



$query1 = mysqli_query($conn, "SELECT * FROM `instructor` WHERE InstructorID ORDER BY InstructorID DESC");
$result = mysqli_num_rows($query1);

if(isset($_GET['delid'])){
  $id =intval($_GET['delid']);
  $sql =mysqli_query($conn,"DELETE FROM `instructor` WHERE InstructorID='$id'");
  echo"<script>alert('Record has been Deleted Successfully!!!)</script>";
  echo"<script>window.location='instructor.php'</script>";

}



?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/instructor.css">
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
          <i class='bx bx-user' ></i>
          <span class="link_name">User</span>
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
      <li class="active">
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
      <span class="text">Instructors List</span>

      <div class="search-bar">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search Instructor Data">
      </div>

      <div class="add-div">
        <button onclick="openModal()">
        <i class='bx bx-user-plus'></i>
        <span>New Instructor</span>
        </button>
      </div>
    </div>







<div class="table-div">

 <section class="table__body">
            <table  style="margin-bottom: 100px;" id="studentTable">
                <thead>
                        <th> Instructor ID</th>
                        <th> First Name</th>
                        <th> Last Name</th>
                        <th> Email</th>
                        <th> Phone</th>
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
                    <td><?php echo $row['InstructorID']; ?></td>
                    <td class="td-cap"><?php echo $row['FirstName']; ?></td>
                    <td class="td-cap"><?php echo $row['LastName']; ?></td>
                    <td class="td-cap"><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Phone']; ?></td>
                
                    <td class="option">
                    <a href="view-update-instrutor.php?editid=<?php echo htmlentities($row['InstructorID'])?>" class="option-btn">
                    <i class='bx bx-show-alt'></i>
                    </a>
                    <a href="instructor.php?delid=<?php echo htmlentities($row['InstructorID'])?>" onClick="return confirm('Do you want to delete this record (InstructorID ID: #<?php echo htmlentities($row['InstructorID'])?>)?');" class="option-btn">
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
      <header>Add new Instructor</header>

      <div class="input-field">
        <label for="lname">First Name</label>
        <input type="text" name="fname" placeholder="First Name" required>
      </div>

      <div class="input-field">
        <label for="fname">Last Name</label>
        <input type="text" name="lname" placeholder="Last Name" required>
      </div>


      

      <div class="input-field">
        <label for="email">Email</label>
        <input style="text-transform: lowercase;" type="email" name="email" placeholder="Email Address" required>
      </div>

      <div class="input-field">
        <label for="contact">Phone</label>
        <input type="tel" pattern="\+63\d{10}" maxlength="13" value="+63" autocomplete="off" name="contact" placeholder="Phone Number" required>
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
