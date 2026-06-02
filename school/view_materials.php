<?php
// Database connection
include 'con.php';

// Check if form values are set
if (!isset($_GET['student_id'], $_GET['standard'])) {
    die("Invalid Access. Please go back and enter details.");
}

// Get input values
$student_id = $_GET['student_id'];
$standard = $_GET['standard'];
$stream = $_GET['stream'] ?? 'None';

// Validate input (Avoid SQL injection)
$standard = $conn->real_escape_string($standard);
$stream = $conn->real_escape_string($stream);

// Fetch materials based on standard and stream
$sql = "SELECT * FROM student_materials WHERE standard = ? AND stream = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $standard, $stream);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Study Materials</title>
    <!-- Font Awesome CDN for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            
            text-align: center;
            animation: fadeIn 2s ease-out;
        }

        h1 {
            color: #2c3e50;
            margin-top: 90px;
            margin-bottom: 30px;
            animation: slideInFromTop 1s ease-out;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeIn 1.5s ease-out;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 15px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 150px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: opacity 0.3s;
        }

        .card img:hover {
            opacity: 0.8;
        }

        .pdf-viewer {
            width: 100%;
            height: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: opacity 0.3s;
        }

        .pdf-viewer:hover {
            opacity: 0.8;
        }

        .material-title {
            font-weight: bold;
            font-size: 18px;
            color: #34495e;
            margin-bottom: 10px;
            animation: fadeInText 1s ease-out;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

         p {
            margin-bottom: 40px;
        }

        /* Icon Buttons */
        .download-btn, .view-pdf-btn {
            background-color: #003366;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, transform 0.2s;
            font-size: 16px;
        }

        .download-btn:hover, .view-pdf-btn:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .button-container a {
            margin-top: 10px;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideInFromTop {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInText {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg")  center center/cover;
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
        padding-left:   550px;
        }

        .contain1 {
            font-size: 20px;
        }

        .contain1 a {
            color:white;
            text-decoration: none;
        }

    </style>
</head>
<body>
  <?php include_once('include1/header2.php'); ?>
  <section class="about-header1">
    <div class="about-image1">
        <h1>Study Materials for Standard: <?= htmlspecialchars($standard) ?>, Stream: <?= htmlspecialchars($stream) ?></h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Study Materials
            
        </div>
    </div>
</section>
  

  <div class="container">
  <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
          <div class="card">
              <div class="material-title"><?= htmlspecialchars($row['material_name']) ?></div>

              <!-- Display Image if it's an Image File, Otherwise Embed PDF -->
              <?php
              $file_extension = pathinfo($row['material_link'], PATHINFO_EXTENSION);
              $allowed_image_types = ['jpg', 'jpeg', 'png', 'gif'];
              if (in_array(strtolower($file_extension), $allowed_image_types)): ?>
                  <img src="<?= $row['material_link'] ?>" alt="Material Image">
              <?php elseif ($file_extension == 'pdf'): ?>
                  <iframe class="pdf-viewer" src="<?= $row['material_link'] ?>"></iframe>
              <?php else: ?>
                  <span>Preview Not Available</span>
              <?php endif; ?>

              <!-- Button Container for Side-by-Side Buttons -->
              <div class="button-container">
                  <!-- View PDF Button with Icon -->
                  <?php if ($file_extension == 'pdf'): ?>
                      <a href="<?= $row['material_link'] ?>" target="_blank" class="view-pdf-btn">
                          <i class="fas fa-file-pdf"></i> View PDF
                      </a>
                  <?php endif; ?>

                  <!-- Download Button with Icon -->
                  <a href="<?= $row['material_link'] ?>" target="_blank" download class="download-btn">
                      <i class="fas fa-download"></i> Download
                  </a>
              </div>
          </div>
      <?php endwhile; ?>
  <?php else: ?>
      <p>No materials found for Standard: <b><?= htmlspecialchars($standard) ?></b>, Stream: <b><?= htmlspecialchars($stream) ?></b>.</p>
  <?php endif; ?>
  </div>

  <!-- Back Button -->
  <p><a href="study_matrial.php" class="download-btn">Go Back</a></p>
<?php  include 'include1/footer.php';?>
</body>
</html>

<?php
$conn->close();
?>
