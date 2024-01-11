<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5;index.php">
    <title>Create Database</title>
</head>
<body>
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        $conn = new mysqli($servername, $username, $password);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create Database

        $create_db = "CREATE DATABASE IF NOT EXISTS galleon";
        if ($conn->query($create_db) === true){
            echo "Database Created";
        }else{
            echo "Error creating database: ".$conn->error;
        }

        $conn->select_db("galleon");

        // Create Tables

        $create_users = "CREATE TABLE IF NOT EXISTS Users (
            UserID int NOT NULL AUTO_INCREMENT,
            Username varchar(255),
            Email varchar(255),
            Passwd varchar(255),
            PRIMARY KEY (UserID)
            )";

        $create_student = "CREATE TABLE IF NOT EXISTS Student (
            StudentID int NOT NULL AUTO_INCREMENT,
            FirstName varchar(255),
            LastName varchar(255),
            DateOfBirth date,
            Email varchar(255),
            Phone varchar(255),
            PRIMARY KEY (StudentID)
            )";

        $create_course = "CREATE TABLE IF NOT EXISTS Course (
            CourseID int NOT NULL AUTO_INCREMENT,
            CourseName varchar(255),
            Credits int,
            PRIMARY KEY (CourseID)
            )";

        $create_instructor = "CREATE TABLE IF NOT EXISTS Instructor (
            InstructorID int NOT NULL AUTO_INCREMENT,
            FirstName varchar(255),
            LastName varchar(255),
            Email varchar(255),
            Phone varchar(255),
            PRIMARY KEY (InstructorID)
            )";

        $create_enrollemnt = "CREATE TABLE IF NOT EXISTS Enrollment (
            EnrollmentID int NOT NULL AUTO_INCREMENT,
            StudentID int,
            CourseID int,
            EnrollmentDate date,
            Grade int,
            PRIMARY KEY (EnrollmentID),
            FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
            FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
            )";

        $conn->query($create_users);
        $conn->query($create_student);
        $conn->query($create_course);
        $conn->query($create_instructor);
        $conn->query($create_enrollemnt);

        // Create contents of table

        $users = "INSERT INTO Users (Username, Email, Passwd)
            VALUES ('User1', 'user1@email.com', 'password'),
            ('User2', 'user2@gmail.com', '12345678'),
            ('User3', 'user3@example.com', '87456321')";

        $student = "INSERT INTO Student (FirstName, LastName, DateOfBirth, Email, Phone)
            VALUES ('Yew', 'Wey', '2001-09-08', 'ywe@email.com', '+639245826142'),
            ('Ure', 'Mew', '2021-01-21', 'mew@email.com', '+639245826987'),
            ('Mano', 'Wer', '1999-05-08', 'mple@email.com', '+639245826986')";

        $course = "INSERT INTO course (CourseName, Credits)
            VALUES ('Accounting Essentials', 3),
            ('Web Information System', 3),
            ('Capstone 2', 3)";

        $instructor = "INSERT INTO instructor (FirstName, LastName, Email, Phone)
            VALUES ('TestInst', 'Lastname', 'email@email.com', '+639123456789'),
            ('Tam', 'Lem', 'lem@email.com', '+639123456780'),
            ('Instlo', 'Holo', 'emil@email.com', '+639123456788')";

        $enrollment = "INSERT INTO Enrollment (StudentID, CourseID, EnrollmentDate, Grade)
            VALUES (1, 1, '2023-11-21', 75),
            (2, 2, '2023-11-21', 85),
            (3, 2, '2023-11-21', 95)";

        $conn->query($users);
        $conn->query($student);
        $conn->query($course);
        $conn->query($instructor);
        $conn->query($enrollment);

        $conn->close(); 

        echo "<br><br>Redirecting in 5 seconds...";
    ?>
</body>
</html>
