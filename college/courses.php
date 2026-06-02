<?php
include("con.php");

// Fetch distinct course names
$courseQuery = mysqli_query($conn, "SELECT DISTINCT name FROM Ccourses ORDER BY name ASC");

// Fetch the first course (default table to display)
$firstCourse = mysqli_fetch_assoc($courseQuery);
$defaultCourse = $firstCourse['name'];

// Reset and re-fetch course names for buttons
mysqli_data_seek($courseQuery, 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>College Courses</title>
    <style>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }

    /* Table Styles */
    table {
        width: 80%;
        margin: 40px auto;
        border-collapse: collapse;
        display: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #003366;
        color: white;
        font-size: 18px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e8f4fa;
    }

    /* Heading Style */
    h1 {
        color: white;
        padding: 10px;
        display: inline-block;
    }

    /* Buttons */
    .toggle-btn {
        padding: 10px 25px;
        background: #003366;
        color: white;
        border: none;
        cursor: pointer;
        margin: 10px 5px;
        font-size: 16px;
        border-radius: 5px;
        transition: background 0.3s, transform 0.2s;
      margin-left: 170px;
      margin-top: 30px;
    }

    .toggle-btn:hover {
        background: #00509e;
        transform: translateY(-2px);
    }

    .active {
        background: #ff5733;
    }

    /* Header Section */
    .about-header1 {
        position: relative;
        text-align: center;
        color: black;
    }

    .about-image1 {
        background: url("/campus_management/admin/images/17.jpg") center center/cover;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-image1 h1 {
        font-size: 36px;
        font-weight: bold;
        color: #003366;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    /* Banner */
    .banner1 {
        background-color: #003366;
        color: white;
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0 20px;
        padding-left: 550px;
    }

    .contain1 {
        font-size: 20px;
    }

    .contain1 a {
        color: white;
        text-decoration: none;
    }
</style>


    </style>
    <script>
        function showTable(course) {
            let tables = document.querySelectorAll("table");
            let headings = document.querySelectorAll("h1");

            tables.forEach(tbl => tbl.style.display = "none");
            headings.forEach(hd => hd.style.display = "none");

            document.getElementById(course).style.display = "table";
            document.getElementById(course + "-heading").style.display = "block";

            document.querySelectorAll(".toggle-btn").forEach(btn => btn.classList.remove("active"));
            document.getElementById("btn-" + course).classList.add("active");
        }
    </script>
</head>
<body>
<?php include('include2/add.php') ?>
<section class="about-header1">
    <div class="about-image1">
       <?php mysqli_data_seek($courseQuery, 0); ?>
    <?php while ($course = mysqli_fetch_assoc($courseQuery)) : 
        $courseName = $course['name'];
    ?>
        <h1 id="<?php echo $courseName; ?>-heading" style="display: <?php echo ($courseName == $defaultCourse) ? 'block' : 'none'; ?>;">
            <?php echo $courseName; ?>
        </h1>
    <?php endwhile; ?> 
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Courses
        </div>
    </div>
</section>
    <!-- Display Course Name as H1 -->
    
<div>
        <?php mysqli_data_seek($courseQuery, 0); ?>
        <?php while ($course = mysqli_fetch_assoc($courseQuery)) : 
            $courseName = $course['name'];
        ?>
            <button class="toggle-btn <?php echo ($courseName == $defaultCourse) ? 'active' : ''; ?>" 
                id="btn-<?php echo $courseName; ?>" 
                onclick="showTable('<?php echo $courseName; ?>')">
                <?php echo $courseName; ?>
            </button>
        <?php endwhile; ?>
    </div>
    <!-- Display Tables -->
    <?php mysqli_data_seek($courseQuery, 0); ?>
    <?php while ($course = mysqli_fetch_assoc($courseQuery)) : 
        $courseName = $course['name'];
        $courseDataQuery = mysqli_query($conn, "SELECT * FROM Ccourses WHERE name='$courseName' ORDER BY semester ASC");
    ?>
        <table id="<?php echo $courseName; ?>" style="display: <?php echo ($courseName == $defaultCourse) ? 'table' : 'none'; ?>;">
            <tr>
                
                <th>Semester</th>
                <th>Description</th>
                <th>Duration</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($courseDataQuery)) : ?>
                <tr>
                   
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endwhile; ?>

    <!-- Buttons to Switch Tables -->
    

</body>
</html>
