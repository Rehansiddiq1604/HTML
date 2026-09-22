<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f4f8;
            margin: 0;
            padding: 40px;
        }

        .box {
            width: 850px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th {
            background-color: #176b87;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #aaa;
        }

        tr:nth-child(even) {
            background-color: #f2f8fa;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Student Details</h2>

    <?php

    $xml = simplexml_load_file("student.xml");

    if ($xml === false) {
        die("Error: Cannot load XML file.");
    }

    echo "<table>";

    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Roll Number</th>";
    echo "<th>Department</th>";
    echo "<th>Year</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    foreach ($xml->student as $student) {

        echo "<tr>";

        echo "<td>" . htmlspecialchars($student->name) . "</td>";
        echo "<td>" . htmlspecialchars($student->rollno) . "</td>";
        echo "<td>" . htmlspecialchars($student->department) . "</td>";
        echo "<td>" . htmlspecialchars($student->year) . "</td>";
        echo "<td>" . htmlspecialchars($student->email) . "</td>";

        echo "</tr>";
    }

    echo "</table>";

    ?>

</div>

</body>
</html>