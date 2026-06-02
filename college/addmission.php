<?php
include 'con.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    $query = "INSERT INTO cstudents (name, email, phone, course, semester, dob, status) 
              VALUES ('$name', '$email', '$phone', '$course', '$semester', '$dob', 'Pending')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Application Submitted Successfully! You will receive a confirmation email after approval.'); 
                window.location.href='addmission.php';
              </script>";
    } else {
        echo "<script>alert('Error submitting application!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>

    <style>
        /* General Styling */
        body {
           
           
          
            
        } 

        .container {
            display: flex;
            background: white;
            width: 750px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
            margin-left: 300px;
             
            margin:40px auto;
            height: 480px;
        }

        /* Left Section (Blue Box) */
        .left-section {
            background: #003366;
            color: white;
            width: 40%;
            padding: 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-section h2 {
            font-size: 22px;
            margin-bottom: 15px;
            color: white;
        }

        .left-section i {
            font-size: 30px;
            margin-bottom: 10px;
        }

        /* Right Section (Form) */
        .right-section {
            width: 60%;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: span 2;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        /* Submit Button */
        .submit-btn {
            background: #003366;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
            grid-column: span 2;
        }

        .submit-btn:hover {
            background: #003366
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
            }

            .left-section, .right-section {
                width: 100%;
                text-align: center;
            }

            form {
                grid-template-columns: 1fr;
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
            color: white;
            text-decoration: none;
        }



    </style>
</head>
<body>
<?php include_once('include2/add.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Addmission</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="chome.php">Home</a> &gt; Addmission
        </div>
    </div>
</section>
    <div class="container">
        <!-- Left Section (Blue) -->
        <div class="left-section">
            <i class="fas fa-graduation-cap"></i>
            <h2>Welcome to Sneh Kunj Girls college</h2>
            <p>Fill out the form to register and receive your unique student ID.</p>
        </div>

        <!-- Right Section (Form) -->
        <div class="right-section">
            <h2>Student Admission Form</h2>
            <form method="post">
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Date of Birth:</label>
                    <input type="date" name="dob" required>
                </div>

                <div class="form-group">
                    <label>Contact Number:</label>
                    <input type="text" name="phone" required>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group full-width">
                    <label>Address:</label>
                    <textarea name="address" required></textarea>
                </div>

                <div class="form-group">
                    <label>Course:</label>
                    <select name="course" required>
                        <option value="">Select Course</option>
                        <option value="BCA">BCA</option>
                        <option value="BCOM">BCOM</option>
                        <option value="BBA">BBA</option>
                        <option value="MSC IT">MSC IT</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Semester:</label>
                    <select name="semester" required>
                        <option value="">Select Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="submit-btn">Submit Admission</button>
            </form>
        </div>
    </div>
<?php  include 'include2/footer.php';?>
</body>
</html>
