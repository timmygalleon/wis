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
            width: 100%;
    min-height: 70px;
            background-color: rgb(34, 34, 34);
            position: fixed;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        
main.table {
    width: 100vw;
    height: 100vh;
    background-color: #ede6f6;

    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    min-height: 70px;
    background-color: white;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.back{
    width: 15px;
    height: 15px;
}

.back-box{
        background: black;
    width: 35px;
        height: 35px;
        margin-left: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
}


.table__header .input-group {
    width: 70%;
    height: 45px;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;
    border: .5px solid grey;
    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 100%;
    height: 100%;
    margin-top: 70px;

    background-color: #fffb;

    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.table__body {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}


.table__body::-webkit-scrollbar {
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb {
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb {
    visibility: visible;
}

table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table,
th,
td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    border-bottom: 1px solid grey;
    background-color: #fffffffe;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}






@media (max-width: 1000px) {
    td:not(:first-of-type) {
        /*min-width: 12.1rem;*/
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;

    text-align: center;
    font-size: 1rem;

    margin-left: .5rem;
    transition: .2s ease-in-out;
    display: block;
}

thead th:hover span.icon-arrow {
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow {
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow {
    transform: rotate(180deg);
}

thead th.active,
tbody td.active {
    color: #6c00bd;
}


.add-delete{
    display: flex;
    gap: 10px;
}
    </style>
</head>
<body>



    <main class="table">

<header>
        Student Record
        
    </header>

        <section class="table__body">
            <table  style="margin-bottom: 100px;">
                <thead>
                    <tr style=" border-bottom: 1px solid grey;">
                        <th> Student ID</th>
                        <th> Last Name</th>
                        <th> First Name</th>
                        <th> Middle Name</th>
                        <th> Address</th>
                        <th> Email</th>
                        <th> Contact No.</th>
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
                        <td><?php echo $row['studId']; ?></td>
    <td><?php echo $row['lastName']; ?></td>
    <td><?php echo $row['firstName']; ?></td>
    <td><?php echo $row['middleName']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['contactNo']; ?></td>
       <td class="add-delete"><a href="">View</a><a href="">Delete</a></td>

                    </tr>
                    <?php } ?> 
                    


                </tbody>
            </table>
        </section>

    </main>
</body>
</html>