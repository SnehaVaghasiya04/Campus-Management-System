
<?php 

include 'con.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userCaptcha = $_POST['captcha'];
    $correctCaptcha = $_POST['captchaAnswer'];

    if ($userCaptcha != $correctCaptcha) {
        echo "Incorrect CAPTCHA. Please try again.";
        echo "<script>alert('Incorrect CAPTCHA. Please try again');</script>";
    } else {
        // Prepared statement for secure database query
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['name'];
                $_SESSION['role'] = $user['role']; // Store role in session
                $_SESSION['success_message'] = "Login successfully!"; // Add success message
                
                // Determine the redirect page based on role
                switch ($user['role']) {
                    case 'school':
                        $redirectPage = 'school_dashboard.php';
                        break;
                    case 'college':
                        $redirectPage = 'college_dashboard.php';
                        break;
                    case 'hostel':
                        $redirectPage = 'hostel_dashboard.php';
                        break;
                    case 'campus':
                        $redirectPage = 'home.php';
                        break;
                    default:
                        $redirectPage = 'home.php';
                        break;
                }
header("Location: $redirectPage"); // Missing redirection
              
                exit();
            } else {
                $error_message = "Invalid credentials!";
            }
        } else {
            $error_message = "No user found!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Basic Styling */
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body and Background */
        body {
         
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
           background-color: #f3f4f6;
        }

        /* Container */
        .container {
              display: flex;
            width: 80%;
            max-width: 1000px;
            height: 450px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
            .left {
            width: 50%;
            background: url('/campus_management/login1.jpg') no-repeat center center/cover;
        }

        .right {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Heading */
       h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #003366;
            font-size: 50px;
        }

        /* Form Group */
        /* Form Group */
.form-group {
    margin-bottom: 20px;
    text-align: left;
    display: flex;
    align-items: center;
}

label {
    display: inline-block;
    color: #003366;
    margin-right: 10px;
    font-size: 24px;
    width: 30%; /* Adjust width as needed */
}

input {
    width: 180%; /* Adjust width to ensure it fills the space next to the label */
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    transition: all 0.3s ease;
}

input:focus {
    border-color: #6e8efb;
    box-shadow: 0 0 5px rgba(110, 142, 251, 0.5);
    outline: none;
}

        /* CAPTCHA */
      
.captcha {
    margin: 20px 0;
    text-align: left;
}

.captcha-input-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

#captcha {
    width: calc(1400% - 10px); /* Make the input field take up most of the space */
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    margin-right: 10px;
}

#refreshCaptcha {
    background: none;
    color: #6e8efb;
    border: none;
    font-size: 20px;
    cursor: pointer;
    transition: color 0.3s ease;
    padding: 1px;
}


#captchaQuestion
{
    font-size: 25px;
    padding-left: 130px;
    padding-bottom: 10px;
}

#refreshCaptcha:hover {
    color: #a777e3;
}

        /* Button */
        button {
            background:#003452;
            border: none;
            color: #fff;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #003452;
        }

        /* Error and Success Messages */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Forgot Password Link */
        p a {
            display: inline-block;
            color: #6e8efb;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: #a777e3;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }
        }


        /* Responsive Design */
@media (max-width: 500px) {
    .container {
        padding: 15px; /* Reduced padding for smaller screens */
        width: 90%; /* Ensuring the container takes up most of the screen */
    }

    h2 {
        font-size: 1.5rem; /* Adjusted heading font size */
    }

    .form-group input,
    button {
        font-size: 1rem; /* Ensuring the input and button font size is consistent */
    }

    #refreshCaptcha {
        font-size: 1rem; /* Adjusted button font size */
    }

    .captcha input {
        padding: 8px; /* Slightly reduced padding for input fields */
    }

    .error, .success {
        font-size: 0.875rem; /* Slightly smaller error/success message */
    }
}

    </style>
</head>
<body>
 <div class="container">
     <div class="left"></div>
      <div class="right">
   
        <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
        <form action="" method="POST">
            <div class="form-group">

    <label for="email"><i class="fas fa-envelope"></i> </label>
    <input type="email" id="email" name="email" required placeholder="Enter your email">
</div>
<div class="form-group">
    <label for="password"><i class="fas fa-lock"></i> </label>
    <input type="password" id="password" name="password" required placeholder="Enter your password">
</div>

            
<!--div class="captcha">
                <label id="captchaQuestion"></label><br>
                <input type="text" name="captcha" id="captcha" required placeholder="Enter CAPTCHA">
                <input type="hidden" name="captchaAnswer" id="captchaAnswer">
                <button type="button" id="refreshCaptcha">  <i class="fas fa-sync-alt"></i></button>
            </div-->
<div class="captcha">
    <label id="captchaQuestion"></label><br>
    <div class="captcha-input-container">
        <input type="text" name="captcha" id="captcha" required placeholder="Enter CAPTCHA">
        <button type="button" id="refreshCaptcha"><i class="fas fa-sync-alt"></i></button>
    </div>
    <input type="hidden" name="captchaAnswer" id="captchaAnswer">
</div>


        <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>

        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="success"><?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <p><a href="\campus_management\mainforgot.php">Forgot Password?</a></p>
    </div></div>
    <script>
        $(document).ready(function() {
            // Function to generate CAPTCHA
            function generateCaptcha() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let captchaText = '';
                for (let i = 0; i < 6; i++) {
                    captchaText += chars.charAt(Math.floor(Math.random() * chars.length));
                }

                $('#captchaQuestion').text(` ${captchaText}`);
                $('#captchaAnswer').val(captchaText); // Store the answer in a hidden field
            }

            // Generate CAPTCHA when the page loads
            generateCaptcha();

            // Refresh CAPTCHA on button click
            $('#refreshCaptcha').click(function() {
                generateCaptcha();
            });

            // Handle form submission
            $('#loginForm').submit(function(e) {
                const userCaptcha = $('#captcha').val();
                const correctCaptcha = $('#captchaAnswer').val();

                if (userCaptcha !== correctCaptcha) {
                    e.preventDefault();
                    alert('Incorrect CAPTCHA. Please try again.');
                    generateCaptcha(); // Regenerate CAPTCHA if incorrect
                    $('#captcha').val(''); // Clear user input
                }
            });
        });
    </script>
</body>
</html>
