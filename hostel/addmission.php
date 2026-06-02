<?php
include 'con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $school_college = $_POST['school_college'];
    $class = $_POST['class'];
    $room_type = $_POST['room_type'];
    $contact = $_POST['contact'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_contact = $_POST['guardian_contact'];

    $sql = "INSERT INTO hostel_student (name, email, school_college, class, room_type, contact, guardian_name, guardian_contact)
            VALUES ('$name', '$email', '$school_college', '$class', '$room_type', '$contact', '$guardian_name', '$guardian_contact')";

     if (mysqli_query($conn, $sql)) {         
        $message = "<div class='success'>Application submitted successfully!</div>";     
    } else {         
        $message = "<div class='error'>Error: " . mysqli_error($conn) . "</div>";     
    }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Admission Form</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f4f8;
        margin: 0;
    }

    form {
        background-color: #ffffff;
        padding: 30px 40px;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 1200px;
        margin: 40px auto;
        animation: fadeInUp 1s ease;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 26px;
        color: #003366;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .fieldset-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    fieldset {
        border: 2px solid #003366;
        border-radius: 15px;
        padding: 20px;
        flex: 1;
        min-width: 280px;
    }

    legend {
        font-size: 18px;
        font-weight: 600;
        color: #003366;
        padding: 0 10px;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    label {
        font-size: 14px;
        font-weight: 500;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d0d7de;
        border-radius: 10px;
        font-size: 14px;
        color: #333;
        background-color: #f9fafb;
    }

    input[type="submit"] {
        background: linear-gradient(135deg, #0077b6, #003366);
        color: white;
        padding: 12px;
        border: none;
        border-radius: 50px;
        width: 100%;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        margin-top: 30px;
    }

   .success, .error {
    padding: 15px;
    margin: 20px auto;
    border-radius: 10px;
    text-align: center;
    width: 100%;
    max-width: 500px;
    font-size: 16px;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 2px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 2px solid #f5c6cb;
}


    /* Header Section */
    .about-header1 {
        text-align: center;
    }

    .about-image1 {
        background: url("/campus_management/admin/images/17.jpg") center center/cover;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-image1 h1 {
        font-size: 42px;
        color: #003366;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
    }

    .banner1 {
        background-color: #003366;
        color: white;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contain1 a {
        color: white;
        text-decoration: none;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>
<body>

<?php include ('include/header1.php');?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Admission</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Admission
        </div>
    </div>
</section>

<form method="POST">
    <h2>Hostel Admission Form</h2>

    <div class="fieldset-container">
        <fieldset>
            <legend>Student Details</legend>
            <div class="grid">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>School/College:</label>
                    <input type="text" name="school_college" required>
                </div>
                <div>
                    <label>Class:</label>
                    <input type="text" name="class">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Hostel Details</legend>
            <label>Room Type:</label>
            <select name="room_type">
                <option>AC Room</option>
                <option>Non-AC Room</option>
                <option>Double Room</option>
                <option>Dormitory Room</option>
                <option>Single Room</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Contact Details</legend>
            <div class="grid">
                <div>
                    <label>Contact:</label>
                    <input type="text" name="contact">
                </div>
                <div>
                    <label>Guardian Name:</label>
                    <input type="text" name="guardian_name">
                </div>
                <div>
                    <label>Guardian Contact:</label>
                    <input type="text" name="guardian_contact">
                </div>
            </div>
        </fieldset>
    </div>

    <input type="submit" value="Apply">
</form>

<?php include 'include/footer.php';?>
</body>
</html>
