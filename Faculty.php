<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Faculty</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Faculty</div>
                <div class="list-group list-group-flush">
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('courses')">Courses</button>
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('info')">Info</button>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
					<div id="courses" class="container-fluid" style="display: none;">
                    <h1 class="mt-4">Courses</h1>
					<?php
						include("db_connection.php");

						$faculty_department = "Faculty_department"; // Example department value, replace with the actual value obtained from the faculty table

						$sql = "SELECT c.* FROM courses_tab c
								INNER JOIN faculty_tab f ON c.Offered_in = f.department
								WHERE f.department = '$faculty_department'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<ul>";
							while ($row = $result->fetch_assoc()) {
								echo "<li><strong>Course Name:</strong> " . $row["Course_name"] . " - <strong>Credits:</strong> " . $row["credits"] . 
									" - <strong>Pre Requisite:</strong> " . $row["pre_req"] . " - <strong>Course ID:</strong> " . $row["Course_id"] . "</li>";
							}
							echo "</ul>";
						} else {
							echo "No Courses found";
						}

					?>
					</div>
					<div id="info" class="container-fluid" style="display: none;">
                    <h1 class="mt-4">Personal Info</h1>
					<?php

						$user_id = "user_id";
						
						$sql = "SELECT f.* FROM faculty_tab f
								INNER JOIN users_tab u ON f.Fac_id = u.userid
								WHERE u.userid = '$user_id'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<ul>";
							while ($row = $result->fetch_assoc()) {
								echo "<li><strong>Faculty id:</strong> " . $row["Fac_id"] . " - <strong>Name:</strong> " . $row["Fac_name"] . 
									" - <strong>Date of Birth</strong> " . $row["Fac_DOB"] . " - <strong>Qualification</strong> " . $row["qualification"] . "<strong>Department:</strong> " . $row["department"] . "</li>";
							}
							echo "</ul>";
						} else {
							echo "No Faculty found";
						}
					?>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
