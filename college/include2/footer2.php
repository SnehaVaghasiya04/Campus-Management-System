<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horizontal Footer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f4ee;
    }

    footer {
      background: navy;
      padding: 20px;
      display: flex;
      justify-content: space-between; /* Evenly space sections */
      flex-wrap: wrap; /* Wrap on smaller screens */
      align-items: flex-start; /* Align items at the top */
      gap: 20px;
      width: 100%; /* Full width */
      box-sizing: border-box; /* Includes padding in the width */
      position: relative; /* Ensures it sticks to its proper position */
    }

    .footer-section {
      flex: 1; /* Equal width for each section */
      min-width: 250px; /* Minimum width for small screens */
      color: white;
    }

    .footer-section h2 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      text-transform: uppercase;
      text-align: left;
      position: relative;
    }

    .footer-section h2::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 0;
      height: 5px;
      width: 100px;
      background-color: pink;
    }

    .footer-section p, .footer-section ul {
      font-size: 14px;
      line-height: 1.6;
      color: white;
    }

    .quick-links ul {
      list-style: none;
      padding: 0;
    }

    .quick-links ul li {
      margin-bottom: 8px;
    }

    .quick-links ul li::before {
      content: "»";
      margin-right: 10px;
      color: #68b684;
    }

    .quick-links ul li a {
      color: white;
      text-decoration: none;
      transition: color 0.3s;
    }

    .quick-links ul li a:hover {
      color: #68b684;
    }

    .contact-icons p {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .contact-icons p i {
      margin-right: 10px;
      color: #68b684;
    }

    .facebook-embed iframe {
      width: 100%;
      height: 150px;
      border: none;
    }
  </style>
</head>
<body>
  <footer>
    <!-- Who We Are Section -->
    <div class="footer-section">
      <h2>WHO WE ARE</h2>
      <p>
        JB & KARP Vidya Sankul is located in a panoramic atmosphere in the Diamond city, Surat. 
        The school is managed by Shree Bhavnagar Jilla Leuva Patel Education & Medical Trust.
        The trust was founded by the leading industrialist of the Saurashtra region. 
        The school is located about 3 km away from the west of Surat-Kamrej road.
      </p>
    </div>

    <!-- Quick Links Section -->
    <div class="footer-section quick-links">
      <h2>QUICK LINKS</h2>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Management Desk</a></li>
        <li><a href="#">Code of Conduct</a></li>
        <li><a href="#">School Timing</a></li>
        <li><a href="#">Higher Secondary</a></li>
        <li><a href="#">School Celebration</a></li>
      </ul>
    </div>

    <!-- Find Our Office Section -->
    <div class="footer-section contact-icons">
      <h2>FIND OUR OFFICE</h2>
      <p><i class="fas fa-map-marker-alt"></i> JB & KARP Vidya Sankul, SURAT, B/h. Thakor Dwar Farm.</p>
      <p><i class="fas fa-phone-alt"></i> +91 9228025711, +91 9228025712</p>
      <p><i class="fas fa-envelope"></i> <a href="mailto:jb_karpschool@yahoo.co.in">jb_karpschool@yahoo.co.in</a></p>
      <p><i class="fas fa-globe"></i> <a href="http://jbkarpschool.ac.in" target="_blank">jbkarpschool.ac.in</a></p>
    </div>

    <!-- Like on Facebook Section -->
    <div class="footer-section facebook-embed">
      <h2>LIKE ON FACEBOOK</h2>
      <iframe 
        src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/jbkarpvidyasankul&tabs=timeline&width=300&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
        frameborder="0"></iframe>
    </div>
  </footer>
</body>
</html>
