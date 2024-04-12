<?php

	include("db_connection.php");


	$userid = $_POST['u'];
	$password = $_POST['p'];


	$sql = "SELECT * FROM users_tab WHERE userid = ? AND password = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $userid, $password);
	$stmt->execute();
	$result = $stmt->get_result();

 if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $role = $row['role'];
        

        switch ($role) {
            case 'Admin':
                header("Location: Admin.php");
                break;
            case 'Faculty':
                header("Location: Faculty.php");
                break;
            case 'Student':
                header("Location: Student.php");
                break;
            default:
                echo "Unknown role";
        }
    } else {

        echo "Invalid credentials";
    }

?>