<?php
include('include/side.php');
include 'con.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Admissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left: 180px;
            width: 1000px;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-bar input {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background: #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .confirm-btn {
            background: #28a745;
            color: white;
        }
        .confirm-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Pending Admissions</h1></legend>
                
                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search by Name...">
                </div>

                <?php
                $result = mysqli_query($conn, "SELECT * FROM hostel_student WHERE status='Pending'");
                
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1' cellpadding='10' cellspacing='0' class='table table-bordered'>
                    <tr>
                        <th>Name</th>
                        <th>School/College</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['school_college']}</td>
                        <td>{$row['contact']}</td>
                        <td><a href='confirm_admission.php?id={$row['id']}' class='action-btn confirm-btn'>Confirm</a></td>
                        </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No pending admissions found.</p>";
                }
                ?>
            </fieldset>
        </div>
    </div>
</body>
</html>
