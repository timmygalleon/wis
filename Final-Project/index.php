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

      .body-info{
        width: 70%;
        height: 60%;
        background: lightgrey;
        display: block;
        margin: 50px auto;
        padding: 20px;
        border-radius: 20px;
      }

      .info-main{
        width: 100%;
        height: 100%;
        background: white;
        text-align: center;

      }

      .h3-title{
        padding-top: 80px;
        padding-bottom: 20px;
        width: 100%;
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
      <li class="active">
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
      <span class="text">Dashboard</span>
    </div>

    <section class="body-info">

    <div class="info-main">


    <h3 class="h3-title">Welcome GALLEON, TIMOTHY G. to your personal page!</h3>
    <p>Please note that every activity is monitored closely. For any problem in the system, contact System Administrator for details. Click the links under MENU to select operation. It is recommended to logout by clicking the logout button everytime you leave your PC.</p>

    </div>







    </section>






  </section>

  <script src="script.js"></script>

</body>
</html>
