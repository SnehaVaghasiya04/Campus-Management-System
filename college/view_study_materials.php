<?php
include("con.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];

    // Fetch study materials
    $query = "SELECT * FROM cstudy_materials WHERE course='$course' ORDER BY upload_date DESC";
    $result = mysqli_query($conn, $query);
} else {
    // Redirect back if accessed directly
    header("Location: study_materials_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Study Materials</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script> <!-- PDF.js -->
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4;  text-align: center; }
        .container { width: 80%; margin: auto; margin:40px auto ;}
        h2 { color: #003452; }

        /* Card Style */
        .card-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card { background: white; width: 300px; padding: 15px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: left; }
        .card h3 { margin-bottom: 10px; color: #003452; }
        .card p { margin: 5px 0; font-size: 14px; }
        
        /* PDF Preview */
        .pdf-preview { width: 100%; height: 200px; border-radius: 5px; background: #ddd; }

        /* Buttons */
        .btn-container { margin-top: 10px; text-align: center; }
        .btn { display: inline-block; padding: 8px 15px; border: none; border-radius: 5px; color: white; text-decoration: none; margin: 5px; font-size: 14px; cursor: pointer; }
        .view-btn { background: #008CBA; }
        .download-btn { background: #4CAF50; }
        .view-btn:hover { background: #005f73; }
        .download-btn:hover { background: #357a38; }
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
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include('include2/add.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Study Materials for <?php echo htmlspecialchars($course); ?></h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; study material
        </div>
    </div>
</section>
<div class="container">
    

    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="card-container">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($row['subject']); ?></h3>
                  <br>
                    
                    <!-- PDF Preview Canvas -->
                    <canvas class="pdf-preview" id="pdf-preview-<?php echo $row['id']; ?>"></canvas>
                    <br>
                     <p><strong>Material:</strong> <?php echo htmlspecialchars($row['material_name']); ?></p>
                    <p><strong>Uploaded By:</strong> <?php echo htmlspecialchars($row['uploaded_by']); ?></p>

                    <div class="btn-container">
                        <a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank" class="btn view-btn">View PDF</a>
                        <a href="<?php echo htmlspecialchars($row['file_path']); ?>" download class="btn download-btn">Download PDF</a>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const url = "<?php echo htmlspecialchars($row['file_path']); ?>";
                        const canvasId = "pdf-preview-<?php echo $row['id']; ?>";

                        const canvas = document.getElementById(canvasId);
                        if (canvas) {
                            const context = canvas.getContext("2d");

                            pdfjsLib.getDocument(url).promise.then(pdf => {
                                return pdf.getPage(1); // Load First Page
                            }).then(page => {
                                const viewport = page.getViewport({ scale: 1 });
                                canvas.width = viewport.width;
                                canvas.height = viewport.height;

                                const renderContext = { canvasContext: context, viewport: viewport };
                                return page.render(renderContext);
                            }).catch(error => {
                                console.error("Error loading PDF:", error);
                            });
                        }
                    });
                </script>

            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p style="color: red;">No study materials available for this course.</p>
    <?php endif; ?>
</div>
<?php  include 'include2/footer.php';?>
</body>
</html>
