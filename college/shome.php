<?php
  include 'con.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Slideshow with Animated Captions</title>
  <style>
    
  
    .mySlides {
      display: none;
    }
    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      width: 1200px;
      position: relative;
      margin-top: 100px;
    }

    /* Caption text */
    .text {
      color: #f4f4f4;
      font-size: 30px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
      opacity: 0; /* Start invisible */
      animation: fadeCaption 2.5s ease-in-out forwards; /* Animation on display */
    }

    /* Keyframes for caption fade-in */
    @keyframes fadeCaption {
      from {
        opacity: 0;
        transform: translateY(20px); /* Slight upward motion */
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active {
      background-color: #717171;
    }

    /* Fading animation for slides */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: 0.4;
      }
      to {
        opacity: 1;
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {
        font-size: 11px;
      }
    }


   .container2 {
      display: flex;
      justify-content: space-between;
      padding: 20px 50px;
      gap: 20px;
      flex-wrap: wrap;
    }

    .welcome-section2 {
      flex: 2;
      padding: 20px;
      background-color: #ffffff;
     
     }

    .notice-board2 {
      flex: 1;
      padding: 20px;
      background-color: #fbe98e;
      border: 1px solid #f4d03f;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .welcome-section2 h1, .notice-board2 h2 {
      color: #3366cc;
      border-bottom: 2px dotted #3366cc;
      padding-bottom: 5px;
      margin-bottom: 15px;
    }

    .welcome-section2 p {
      line-height: 1.8;
      color: #444;
    }

    .notice-board2 ul {
      list-style: none;
      padding: 0;
      text-align: center;
    }

    .notice-board2 li {
      margin: 10px 0;
      color: #333;
      font-weight: bold;
      text-align: center;
    }

    .notice-board2 li span {
      font-weight: normal;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container2 {
        flex-direction: column;
        padding: 20px;
      }

      .welcome-section2 {
        flex: unset;
        margin-bottom: 20px;
      }

      .notice-board2 {
        flex: unset;
      }
    }

    @media (max-width: 480px) {
      .welcome-section2 h1, .notice-board2 h2 {
        font-size: 1.2rem;
      }

      .welcome-section2 p {
        font-size: 0.9rem;
      }

      .notice-board2 li {
        font-size: 0.9rem;
      }
    }

  </style>
</head>

<body>
  <?php include_once('include2\add.php'); ?>

  <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 6</div>
      <img src="\campus_management\school\image\schoolbuilding.jpg" style="width:1280px; height: 400px;">
      <div class="text">School Building</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 6</div>
      <img src="\campus_management\school\image\physics lab.jpg" style="width:1280px; height: 400px;">
      <div class="text">Physics Lab</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 6</div>
      <img src="\campus_management\school\image\chemistry-lab-facility.jpg" style="width:1280px; height:400px">
      <div class="text">Chemistry Lab</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">4 / 6</div>
      <img src="\campus_management\school\image\IMG_1288.JPG" style="width:1280px; height:400px">
      <div class="text">Classroom View</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">5 / 6</div>
      <img src="\campus_management\school\image\auditorium hall.jpg" style="width:1300px; height:400px">
      <div class="text">Auditorium Hall</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">6 / 6</div>
      <img src="\campus_management\school\image\IMG_7302.JPG" style="width:1280px; height:400px">
      <div class="text">Library Facility</div>
    </div>

  </div>
  <br>

  <!-- second part -->

   <div class="container2">
    <!-- Welcome Section -->
    <div class="welcome-section2">
      <h1>Welcome to sneh kunj Girls School</h1>
      <p>
        Sneh kunj Girls International School in Surat is one of the leading businesses in the International Schools. 
        Also known for Schools, International Schools, and much more. Find Address, Contact Number, Reviews & Ratings, Photos, Maps of sneh kunj Girls International School, Surat.
      </p>
      <p>
        It is crucial to enroll children in a good education institute for their overall development. Children's education is crucial for providing knowledge, forming their general personalities, and developing their minds. International Schools in Kosad, Surat are preferred by many parents considering their curriculum, extracurricular activities, and other world-class facilities. The schools host national and foreign school contests, international exchange programs, immersion programs, conferences, webinars, and other events to improve learning and foster each child's development. The schools also offer a top-notch learning atmosphere, a globally recognized curriculum, and a focus on the total development of each student.
      </p>
    </div>

    <!-- Notice Board -->

    
    <?php
$sql = "SELECT * FROM schoolnotic ORDER BY date_posted DESC";
$result = $conn->query($sql);
?>

    <div class="notice-board2">
        <h2>Notice Board</h2>
         <marquee behavior="scroll" direction="up" scrollamount="3" loop="infinite">
        <ul>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <span><?php echo htmlspecialchars($row['date_posted']); ?></span>
                        <span><?php echo htmlspecialchars($row['content']); ?></span>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>No notices available.</li>
            <?php endif; ?>
        </ul>
         </marquee>
    </div>
 


  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
  </script>
  
</body>
</html>
