CREATE DATABASE studentrecord_galleon;

USE studentrecord_galleon;

CREATE TABLE Student (
    StudentID INT PRIMARY KEY AUTO_INCREMENT,
    LastName VARCHAR(250),
    FirstName VARCHAR(250),
    MiddleName VARCHAR(250),
    DateOfBirth DATE, -- Change from VARCHAR(250) to DATE
    Email VARCHAR(250),
    Phone VARCHAR(250),
    Address VARCHAR(250)
);

CREATE TABLE Course (
    CourseID INT PRIMARY KEY AUTO_INCREMENT,
    CourseName VARCHAR(250),
    CourseCode VARCHAR(250),
    Credits INT
);

CREATE TABLE Instructor (
    InstructorID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(250),
    LastName VARCHAR(250),
    Email VARCHAR(250),
    Phone VARCHAR(250),
    TeachingSubject VARCHAR(250)
);

CREATE TABLE Enrollment (
    EnrollmentID INT PRIMARY KEY AUTO_INCREMENT,
    StudentID INT,
    CourseID INT,
    EnrollmentDate DATE, -- Change from VARCHAR(250) to DATE
    Grade VARCHAR(2),
    FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
    FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
);
