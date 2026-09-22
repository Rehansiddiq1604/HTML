<?php

$errors = array();

$studentname = trim($_POST["studentname"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$college = trim($_POST["college"] ?? "");
$rollnumber = trim($_POST["rollnumber"] ?? "");
$dob = trim($_POST["dob"] ?? "");
$gender = trim($_POST["gender"] ?? "");
$department = trim($_POST["department"] ?? "");
$course = trim($_POST["course"] ?? "");
$examdate = trim($_POST["examdate"] ?? "");
$examcity = trim($_POST["examcity"] ?? "");
$address = trim($_POST["address"] ?? "");
$pincode = trim($_POST["pincode"] ?? "");
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";

if ($studentname == "") {
    $errors[] = "Student name is required.";
} elseif (!preg_match("/^[A-Za-z ]+$/", $studentname)) {
    $errors[] = "Student name should contain only letters.";
}

if ($email == "") {
    $errors[] = "Email is required.";
} elseif (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
    $errors[] = "Enter a valid email address.";
}

if ($phone == "") {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Phone number must contain 10 digits.";
}

if ($college == "") {
    $errors[] = "College name is required.";
}

if ($rollnumber == "") {
    $errors[] = "Roll number is required.";
}

if ($dob == "") {
    $errors[] = "Date of birth is required.";
}

if ($gender == "") {
    $errors[] = "Please select gender.";
}

if ($department == "") {
    $errors[] = "Please select a department.";
}

if ($course == "") {
    $errors[] = "Please select an NPTEL course.";
}

if ($examdate == "") {
    $errors[] = "Exam date is required.";
}

if ($examcity == "") {
    $errors[] = "Exam city is required.";
} elseif (!preg_match("/^[A-Za-z ]+$/", $examcity)) {
    $errors[] = "Exam city should contain only letters.";
}

if ($address == "") {
    $errors[] = "Address is required.";
}

if ($pincode == "") {
    $errors[] = "Pincode is required.";
} elseif (!preg_match("/^[0-9]{6}$/", $pincode)) {
    $errors[] = "Pincode must contain 6 digits.";
}

if ($password == "") {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 8) {
    $errors[] = "Password must contain at least 8 characters.";
}

if ($confirm_password == "") {
    $errors[] = "Confirm password is required.";
} elseif ($password != $confirm_password) {
    $errors[] = "Passwords do not match.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>NPTEL Registration Result</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #dff3f7;
            margin: 0;
            padding: 30px;
        }

        .result-box {
            width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #999;
        }

        h2 {
            text-align: center;
            color: #176b87;
        }

        .error {
            background-color: #ffe6e6;
            border: 1px solid #ff9999;
            padding: 15px;
            color: #cc0000;
            border-radius: 5px;
        }

        .success {
            background-color: #e6f7e6;
            border: 1px solid #8fd18f;
            padding: 15px;
            color: #176b17;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #176b87;
            color: white;
        }

        .back {
            display: block;
            width: 150px;
            margin: 20px auto 0;
            padding: 10px;
            text-align: center;
            background-color: #176b87;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="result-box">

<?php

if (count($errors) > 0) {

    echo "<h2>Registration Failed</h2>";

    echo "<div class='error'>";

    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }

    echo "</div>";

    echo "<a class='back' href='index.html'>Go Back</a>";

} else {

    echo "<h2>Registration Successful</h2>";

    echo "<div class='success'>";
    echo "Your NPTEL exam registration has been submitted successfully.";
    echo "</div>";

    echo "<table>";

    echo "<tr><th>Details</th><th>Information</th></tr>";
    echo "<tr><td>Student Name</td><td>" . htmlspecialchars($studentname) . "</td></tr>";
    echo "<tr><td>Email</td><td>" . htmlspecialchars($email) . "</td></tr>";
    echo "<tr><td>Phone</td><td>" . htmlspecialchars($phone) . "</td></tr>";
    echo "<tr><td>College</td><td>" . htmlspecialchars($college) . "</td></tr>";
    echo "<tr><td>Roll Number</td><td>" . htmlspecialchars($rollnumber) . "</td></tr>";
    echo "<tr><td>Date of Birth</td><td>" . htmlspecialchars($dob) . "</td></tr>";
    echo "<tr><td>Gender</td><td>" . htmlspecialchars($gender) . "</td></tr>";
    echo "<tr><td>Department</td><td>" . htmlspecialchars($department) . "</td></tr>";
    echo "<tr><td>NPTEL Course</td><td>" . htmlspecialchars($course) . "</td></tr>";
    echo "<tr><td>Exam Date</td><td>" . htmlspecialchars($examdate) . "</td></tr>";
    echo "<tr><td>Exam City</td><td>" . htmlspecialchars($examcity) . "</td></tr>";
    echo "<tr><td>Address</td><td>" . htmlspecialchars($address) . "</td></tr>";
    echo "<tr><td>Pincode</td><td>" . htmlspecialchars($pincode) . "</td></tr>";

    echo "</table>";

    echo "<a class='back' href='index.html'>Register Again</a>";
}

?>

</div>

</body>
</html>