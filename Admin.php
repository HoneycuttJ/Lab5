<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrator</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
			<div class="border-end bg-white" id="sidebar-wrapper">
				<div class="sidebar-heading border-bottom bg-light">Admin</div>
				<div class="list-group list-group-flush">
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('students')">View Students</button>
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('faculty')">View Faculty</button>
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('add_student')">Add Student</button>
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('add_faculty')">Add Faculty</button>
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('departments')">Departments</button>
					<button class="list-group-item list-group-item-action list-group-item-light p-3" onclick="toggleDiv('courses')">Courses</button>
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
                <div id="students" class="container-fluid" style="display: none;">
                    <h1 class="mt-4">Students</h1>
					<?php
						include("db_connection.php");

						$sql = "SELECT Stu_name, Stu_major FROM student_tab";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<ul>";
							while ($row = $result->fetch_assoc()) {
								echo "<li><strong>Name:</strong> " . $row["Stu_name"] . " - <strong>Major:</strong> " . $row["Stu_major"] . "</li>";
							}
							echo "</ul>";
						} else {
							echo "No students found";
						}
					?>
                </div>
				<div id="faculty" class="container-fluid" style="display: none;">
                    <h1 class="mt-4">Faculty</h1>
					<?php

						$sql = "SELECT Fac_name, department FROM faculty_tab";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<ul>";
							while ($row = $result->fetch_assoc()) {
								echo "<li><strong>Name:</strong> " . $row["Fac_name"] . " - <strong>Department:</strong> " . $row["department"] . "</li>";
							}
							echo "</ul>";
						} else {
							echo "No Faculty found";
						}
					?>
                </div>
				<div id="departments" class="container-fluid" style="display: none;">
                    <h1 class="mt-4">Departments</h1>
					<?php

						$sql = "SELECT * FROM department_tab";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							echo "<ul>";
							while ($row = $result->fetch_assoc()) {
								echo "<li><strong>Name:</strong> " . $row["Dept_name"] . " - <strong>Department Chair:</strong> " . $row["Dept_chair"] . 
								" - <strong>Department Dean:</strong> " . $row["Dept_dean"] . " - <strong>Budget: $</strong> " . $row["budget"] . "</li>";
							}
							echo "</ul>";
						} else {
							echo "No Departments found";
						}
					?>
				</div>
				<div id="courses" class="container-fluid" style="display: none;">
                    <h1 class="mt-4">Courses</h1>
					<?php

						$sql = "SELECT * FROM courses_tab";
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
				<div id="add_student" class="container-fluid" style="display: none;">
					<h1>Add New Student</h1>
					<form action="add_student_process.php" method="post">
						<div class="mb-3">
							<label for="stu_id" class="form-label">Student ID</label>
							<input type="text" class="form-control" id="stu_id" name="stu_id" required>
						</div>
						<div class="mb-3">
							<label for="stu_name" class="form-label">Student Name</label>
							<input type="text" class="form-control" id="stu_name" name="stu_name" required>
						</div>
						<div class="mb-3">
							<label for="year_of_enrollment" class="form-label">Year of Enrollment</label>
							<input type="text" class="form-control" id="year_of_enrollment" name="year_of_enrollment" required>
						</div>
						<div class="mb-3">
							<label for="stu_major" class="form-label">Major</label>
							<input type="text" class="form-control" id="stu_major" name="stu_major" required>
						</div>
						<div class="mb-3">
							<label for="cgpa" class="form-label">CGPA</label>
							<input type="text" class="form-control" id="cgpa" name="cgpa" required>
						</div>
						<div class="mb-3">
							<label for="year_of_graduation" class="form-label">Year of Graduation</label>
							<input type="text" class="form-control" id="year_of_graduation" name="year_of_graduation" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<div id="add_faculty" class="container-fluid" style="display: none;">
					<h1>Add New Faculty</h1>
					<form action="add_faculty_process.php" method="post">
						<div class="mb-3">
							<label for="fac_id" class="form-label">Faculty ID</label>
							<input type="text" class="form-control" id="fac_id" name="fac_id" required>
						</div>
						<div class="mb-3">
							<label for="fac_name" class="form-label">Faculty Name</label>
							<input type="text" class="form-control" id="fac_name" name="fac_name" required>
						</div>
						<div class="mb-3">
							<label for="fac_dob" class="form-label">Date of Birth</label>
							<input type="text" class="form-control" id="fac_dob" name="fac_dob" required>
						</div>
						<div class="mb-3">
							<label for="qualification" class="form-label">Qualification</label>
							<input type="text" class="form-control" id="qualification" name="qualification" required>
						</div>
						<div class="mb-3">
							<label for="department" class="form-label">Department</label>
							<input type="text" class="form-control" id="department" name="department" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
<script>
    function toggleDiv(divId) {
        var div = document.getElementById(divId);
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }

</script>
    </body>
</html>
