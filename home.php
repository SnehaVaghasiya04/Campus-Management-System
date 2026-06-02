<?php 
  include 'con.php';
  session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
   
   /* Background Image and Campus Details */
.background-image {
  background: url('admin/images/5.jpg');
  background-size: cover;
  background-position: center;
  height: 400px;
  width: 100%;
  position: relative;
  margin-top: 70px;
}

/* Campus Details Section */
.campus-details {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: antiquewhite;
  text-align: center;
  padding: 20px;
  width: 700px;
  
}
.campus-details {
  animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.campus-details h1 {
  font-size: 3rem;
  margin-bottom: 15px;
}



.campus-details p {
  font-size: 1.2rem;
  margin-bottom: 30px;
}
/* Button Styles */
.btn {
  display: inline-flex;
  align-items: center;
  padding: 10px 20px;
  background-color:  #003452;
  color: white;
  font-size: 1.2rem;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s, transform 0.3s;
  margin: 5px;
}

.btn i {
  margin-right: 8px; /* Space between icon and text */
}

.btn:hover {
  background-color: #289CAC;
  transform: translateY(-5px);
}

.logout-btn:hover {
  background-color: #289CAC; /* Specific color for logout button */
}

.login-btn:hover {
  background-color: #289CAC; /* Specific color for login button */
}

.register-btn:hover {
  background-color:  #289CAC; /* Specific color for register button */
}

/* Icon Styles */
.btn i {
  font-size: 1.4rem;
}


/* Slider Section */
.slider {
  position: relative;
  overflow: hidden;
  max-width: 15-00px;
  margin: 0px auto;
 
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);


}

.slides {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.slide {
  flex: 0 0 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background:  #003366;
  padding: 20px;
 height: 450px;
}






/* Add border to image */
.slide img {
  width: 300px;
  height: 300px;
  border-radius: 10px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Image shadow */
  border: 5px solid transparent; /* Initial transparent border */
  transition: all 0.3s ease; /* Smooth transition for border */
}

/* Add animation on hover to change border color */
.slide img:hover {
  border-color:  #289CAC; /* Border color when hovered */
  transform: scale(1.05); /* Slight scale effect */
}


.slide-content {
width: 750px;
  
}

.slide-content h2 {
  font-size: 2rem;
  color: white;
  margin-bottom: 10px;
}

.slide-content p {
  font-size: 1rem;
  color: white;
  line-height: 1.6;
}


 /* Facility Section Styles */
  .f1 {
    background-color: white; /* Set background color for the whole section */
    padding: 20px 0;
  }

  .container1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
  }

  .facility {
    background-color: #003366; /* Set background color for each facility box */
    border-radius: 10px;
    width: 30%; /* Adjust the width of the facility boxes */
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    transition: transform 0.3s ease; /* Smooth transition for hover effect */
  }

  .facility img {
    max-width: 300px;
    height: 300px;
    border-radius: 50%;
  
    margin-bottom: 20px;
  }

  .facility h3 {
    font-size: 24px;
    color: white;
    margin-bottom: 10px;
  }

  .facility p {
    font-size: 16px;
    color: white;
    margin-bottom: 20px;
  }
/* notice */

body {
    font-family: Arial, sans-serif;
}

.cont1 h1 {
    text-align: center;
    color: white;
}

.cont1 div {
    margin: 20px auto;
   
   
    padding: 15px;
   
}

.cont1 h2 {
    color: white;
    text-align: center;
}

.cont1 p {
    color: white;
    text-align: center;
}
.cont1 {
height: 500px;
        background-image: url("/campus_management/admin/images/NOTIC.jpeg"); /* Replace with actual image path */
        background-size: cover; /* Ensures the image covers the entire div */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        background-position: center; /* Centers the image */
        padding: 20px; /* Adds padding inside the div */
        color: #fff; /* Text color for readability */
        font-family: 'Open Sans', sans-serif;
         /* Optional: Adds rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Adds shadow for a better look */
    }
  .cont1 marquee {
        height: 400px; /* Fills the container */
        display: block;
        overflow: hidden;
    }
     .cont1 hr {
    border: none;
    height: 3px;
    background-color: white; /* Color of the line */
    margin: 20px 0;
    opacity: 0.7; /* Slightly transparent */
    font-weight: bold;
    width: 80%;
    margin-left: 110px;

  }


  








  </style>
</head>
<body>

  <?php include_once('include/header1.php'); ?>
  <?php include 'banner.php'; ?>


  <!-- Background Image and Campus Details -->
  <div class="background-image">
    <div class="campus-details">
      <h1>Welcome to Our Campus</h1>
      <p>Explore the vibrant community and state-of-the-art facilities that we offer to all our students.</p>

      <!-- Display Logged-in User -->
      <?php if(isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
         <p><a href="logout.php" class="btn logout-btn"><i class="fa fa-sign-out-alt"></i> Logout</a></p> <!-- Add Logout functionality -->
     
      <?php else: ?>
       <p><a href="login.php" class="btn login-btn"><i class="fa fa-sign-in-alt"></i> Login</a> | 
         <a href="register.php" class="btn register-btn"><i class="fa fa-user-plus"></i> Register</a></p>
    
      <?php endif; ?>
    </div>
  </div>

<!-- meassage section -->

<section class="slider">
    <div class="slides">
        <?php
        $result = $conn->query("SELECT * FROM message ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            echo '<div class="slide">';
            echo '<img src="admin/images/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '">';
            echo '<div class="slide-content">';
            echo '<h2>' . htmlspecialchars($row['name']) . '</h2>';
            echo '<p>' . htmlspecialchars($row['message']) . '</p>';
            echo '<h2>' . htmlspecialchars($row['role']) . '</h2>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>
<!-- Facility Section -->
<div class="f1">
  <h1 style="text-align: center; padding-top:30px; color: #003366;">
    Our Facilities
    <br>
    <br>
  </h1>
  <div class="container1">
    <?php
    // Fetch facilities from the database
    $sql = "SELECT * FROM facility";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<div class="facility">';
        echo '<img src="admin/images/' . $row['image'] . '" alt="Facility Image">';
        echo '<h3>' . $row['title'] . '</h3>';
        echo '<p>' . $row['description'] . '</p>';
        echo '</div>';
    }
    ?>
  </div>
</div>


 
  <script>
let currentSlide = 0;

function autoSlide() {
    const slides = document.querySelector('.slides');
    const totalSlides = slides.children.length;
    currentSlide = (currentSlide + 1) % totalSlides;
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Change slide every 3 seconds
setInterval(autoSlide, 3000);
</script>
<div class="cont1">
    <h1>Public Notices</h1>
    <marquee behavior="scroll" direction="up" scrollamount="3" loop="infinite">
        <?php
        $sql = "SELECT title, description, timestamp FROM notice ORDER BY timestamp ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['description']) . " (" . htmlspecialchars($row['timestamp']) . ")</p>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<p>No notices found.</p>";
        }
        ?>
    </marquee>
</div>





</div>

   <?php include_once('include/footer.php'); ?>
</body>
</html>
