
<?php
include 'con.php';

if (!isset($standard)) {
    die("Section not specified.");
}

$result = $conn->query("SELECT * FROM courses WHERE section = '$standard' ORDER BY section");
$current_section = null; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php include_once('include1\header2.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>
            <?php echo "<h1>Available Courses for: $standard</h1>"; ?>
</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; courses
        </div>
    </div>
</section>

</body>
</html>
<?php
// Display courses
echo "<div class='courses-container'>";

while ($row = $result->fetch_assoc()) {
    if ($current_section !== $row['section']) {
        if ($current_section !== null) {
            echo "</tbody></table>";
        }
      
        echo "<table class='courses-table'>";
        echo "<thead><tr><th>Subject</th><th>Teacher</th><th>Duration</th></tr></thead><tbody>";
        $current_section = $row['section'];
    }
    echo "<tr><td>" . $row['subject_name'] . "</td><td>" . $row['teacher_name'] . "</td><td>" . $row['duration'] . "</td></tr>";
}

if ($current_section !== null) {
    echo "</tbody></table>";
}
echo "</div>";
?>
<?php  include 'include1/footer.php';?>

<!-- CSS Styling for the Courses Page -->
<style type="text/css">
    /* General Body Styling */
  /* General Body Styling */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f6f9;
    color: #333;
}

/* Page Title */
h2 {
    text-align: center;
    font-size: 36px;
    color: #003452;
    margin-top: 40px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    position: relative;
}

h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background-color: #007BFF;
    margin: 10px auto 0;
    border-radius: 5px;
}

/* Courses Container */
.courses-container {
    max-width: 1100px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* Section Heading */
.section-heading {
    background: linear-gradient(135deg, #007BFF, #0056b3);
    color: #fff;
    padding: 14px 20px;
    font-size: 26px;
    border-radius: 8px;
    margin: 30px 0 10px;
    text-align: left;
}

/* Courses Table */
/* Unique Modern Table Design */
.courses-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 20px;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

/* Table Header */
.courses-table th {
    background: linear-gradient(135deg, #004080, #0066cc);
    color: #fff;
    padding: 18px;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 4px solid #003366;
    position: sticky;
    top: 0;
}

/* Table Rows */
.courses-table td {
    padding: 16px;
    font-size: 18px;
    color: #333;
    background-color: #ffffff;
    border-bottom: 1px solid #e6e6e6;
    transition: background-color 0.3s, transform 0.2s;
}

/* Row Hover Effect */
.courses-table tr:hover td {
    background-color: #f0f8ff;
    transform: scale(1.01);
}

/* Alternate Row Background */
.courses-table tr:nth-child(even) td {
    background-color: #f9fcff;
}

/* Rounded Corners for First and Last Rows */
.courses-table tr:first-child th:first-child {
    border-top-left-radius: 12px;
}

.courses-table tr:first-child th:last-child {
    border-top-right-radius: 12px;
}

.courses-table tr:last-child td:first-child {
    border-bottom-left-radius: 12px;
}

.courses-table tr:last-child td:last-child {
    border-bottom-right-radius: 12px;
}

/* Responsive Table Adjustments */
@media (max-width: 768px) {
    .courses-table th, .courses-table td {
        padding: 12px;
        font-size: 16px;
    }
}

}

/* Header Section */
.about-header1 {
    position: relative;
    text-align: center;
}

.about-image1 {
    background: url("/campus_management/admin/images/17.jpg") center/cover no-repeat;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-image1 h1 {
    font-size: 48px;
    font-weight: 700;
    color: #003366;
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7);
}

.banner1 {
    background-color: #003366;
    padding: 15px 0;
    text-align: center;
}

.contain1 {
    font-size: 20px;
    color: #fff;
}

.contain1 a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.contain1 a:hover {
    text-decoration: underline;
}



        
</style>
