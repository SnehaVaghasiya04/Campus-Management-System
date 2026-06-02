<!DOCTYPE html>
<html>
  <head>
    <title>College</title>
    <style type="text/css">
      /********* Common CSS Starts **********/
      :root {
        --primary-color: #003452;
        --secondary-color: #289cac;
        --nav-bg-color: #f4f4f4;
        --nav-link-color: #003452;
        --nav-hover-bg-color: #289CAC;
        --nav-hover-text-color: #ffffff;
        --font-family: "Times New Roman", Times, serif;
        --font-color: #242424;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: var(--font-family);
      }

    .a1 {
        font-size: 16px;
        color: var(--font-color);
        padding-top: 100px; /* Prevent content from being hidden behind fixed header */
     } 

      /********* Header Section Fixed **********/
      .headersection {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: #003366;
      }

      .header {
        padding: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
      }

      .header marquee {
        font-size: 20px;
        color: white;
        font-weight: bold;
        width: 80%;
      }

      /********* Navigation Bar Fixed **********/
      .navbar {
        position: fixed;
        top:40px; /* Adjusted below header */
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--nav-bg-color);
        padding: 10px 20px;
        height: 60px;
        z-index: 1000;
      }

      .logo {
        display: flex;
        align-items: center;
      }

      .logo img {
        height: 100px;
        width: 100px;
        border-radius: 50%;
      }

      .logo a {
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        color: var(--nav-link-color);
        margin-left: 10px;
      }

      .nav-links {
        list-style-type: none;
        display: flex;
        gap: 20px;
      }

      .nav-links li {
        position: relative; /* Needed for dropdown positioning */
      }

      .nav-links a {
        text-decoration: none;
        color: var(--nav-link-color);
        font-size: 18px;
        font-weight: 500;
        padding: 10px;
        display: block;
      }

      .nav-links a:hover {
        background-color: #003366;
        color: var(--nav-hover-text-color);
        border-radius: 8px;
      }

      /* Dropdown Menu */
     /* Dropdown Menu */
.dropdown {
    position: absolute;
    top: 40px;
    left: 0;
    background: #ffffff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 0;  /* Removed rounded corners */
    display: none;
    flex-direction: column;
    min-width: 180px;
    border: 1px solid #ccc; /* Optional: Adds a slight border for definition */
}

.dropdown a {
   /* padding: 10px;*/
    color: var(--nav-link-color);
    font-size: 16px;
    display: block;
}

.dropdown a:hover {
    background-color:#003366;
    color: var(--nav-hover-text-color);
}


      /* Show dropdown on hover */
      .nav-links li:hover .dropdown {
        display: flex;
      }
    </style>
  </head>
  <body>
<div class="a1">
    <!------ Header HTML Starts  ------->
    <div class="headersection">
      <div class="header">
        <marquee>My campus: "The Path To Your Dreams Starts Here."</marquee>
      </div>
    </div>
    <!------ Header HTML Ends ------->

    <!------ Navigation Bar Starts ------->
    <nav class="navbar">
      <div class="logo">
        <img src="\campus_management\admin\images\Picsart_25-01-06_18-46-54-842.png" alt="School Logo">
        <a href="#">Sneh Kunj Girls College</a>
      </div>
      <ul class="nav-links">
        <li><a href="/campus_management/home.php">Home</a></li>

        <!-- Faculty Dropdown -->
        <li>
          <a href="faculty.php">Faculty </a>
          <ul class="dropdown">
            <li><a href="bca_faculty.php">BCA</a></li>
            <li><a href="bcom_faculty.php">BCOM</a></li>
            <li><a href="bba_faculty.php">BBA</a></li>
             <li><a href="mscit_faculty.php">MSC.IT</a></li>
             <li><a href="lab_assistance.php">lab Assistance</a></li>
             <li><a href="admin_staff.php">Admin staff</a></li>
             <li><a href="sport_staff.php">sport staff</a></li>
             
          </ul>
        </li>
        <li>
          <a href="#">Academic </a>
          <ul class="dropdown">
            <li><a href="addmission.php">Addmission</a></li>
            <li><a href="rules.php">Rules & Regulations</a></li>
            <li><a href="time_table.php">Time Table</a></li>
             <li><a href="exam.php">Exam Schedules</a></li>
             <li><a href="courses.php">Courses</a></li>
             <li><a href="scholarships.php">ScholarShips</a></li>
              
          </ul>
        </li>

       
      

        <li><a href="study_material.php">Study material</a></li>
         <li><a href="placement.php">Placement</a></li>
       
        <li><a href="gallery.php">Gallery</a></li>
         <li><a href="contactus.php">Contact us</a></li>
        <li><a href="fees.php">Fees</a></li>
       
      </ul>
    </nav>
    <!------ Navigation Bar Ends ------->
</div>
  </body>
</html>
