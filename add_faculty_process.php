<?php
include("db_connection.php");

$stu_id = $_POST['fac_id'];
$stu_name = $_POST['fac_name'];
$year_of_enrollment = $_POST['fac_dob'];
$stu_major = $_POST['qualification'];
$cgpa = $_POST['department'];



$sql = "INSERT INTO faculty_tab (sid, Fac_id, Fac_name, Fac_DOB, qualification, department) VALUES (0, '$stu_id', '$stu_name', '$year_of_enrollment', '$stu_major', '$cgpa')";

if ($conn->query($sql) === TRUE) {
    echo "New faculty added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>