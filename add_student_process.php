<?php
include("db_connection.php");

$stu_id = $_POST['stu_id'];
$stu_name = $_POST['stu_name'];
$year_of_enrollment = $_POST['year_of_enrollment'];
$stu_major = $_POST['stu_major'];
$cgpa = $_POST['cgpa'];
$year_of_graduation = $_POST['year_of_graduation'];


$sql = "INSERT INTO faculty_tab (sid, Stu_id, Stu_name, Stu_year_of_enrollment, Stu_major, CGPA, year_of_graduation) VALUES (0, '$stu_id', '$stu_name', '$year_of_enrollment', '$stu_major', '$cgpa', '$year_of_graduation')";

if ($conn->query($sql) === TRUE) {
    echo "New student added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>