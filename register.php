<?php
include 'con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validate confirm password
    if ($password !== $confirmpassword) {
        echo "<script>alert('Error: Passwords do not match!');</script>";
    } elseif (strlen($password) < 6) {
        // Validate password length
        echo "<script>alert('Error: Password must be at least 6 characters long!');</script>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $sql = "INSERT INTO users (name, email, role, password) VALUES ('$name', '$email', '$role', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to login page after successful registration
            echo "<script>alert('Registration successful! Please log in.');</script>";
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: times new roman;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }

        .container {
            display: flex;
            width: 80%;
            max-width: 1000px;
            height: 550px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .left {
            width: 50%;
            background: url('/campus_management/login.jpg') no-repeat center center/cover;
        }

        .right {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #003366;
            font-size: 50px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #003366;

        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .left {
                width: 100%;
                height: 250px;
            }

            .right {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <h2><i class="fas fa-user-plus"></i> Register</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter Your Email">
                </div>

                <div class="form-group">
                    <label for="role"><i class="fas fa-briefcase"></i> Role</label>
                    <select id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="School">School</option>
                        <option value="College">College</option>
                        <option value="Hostel">Hostel</option>
                        <option value="Campus">Campus</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter Your Password">
                </div>

                <div class="form-group">
                    <label for="confirmpassword"><i class="fas fa-lock"></i> Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Your Password">
                </div>

                <button type="submit"><i class="fas fa-user-plus"></i> Register</button>
            </form>
            <p><a href="\campus_management\login.php">Already registered? Login here</a></p>
        </div>
    </div>
</body>
</html>
