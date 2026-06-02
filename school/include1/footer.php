<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Design</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: cursive;
    }

    .footer {
      background-color: #003366;
      color: white;
      padding: 30px 50px;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .footer-section {
      margin-bottom: 20px;
    }

    .footer-section h3 {
      font-size: 22px;
      margin-bottom: 10px;
    }

    .footer-section p, .footer-section a {
      font-size: 14px;
      color: white;
      line-height: 1.6;
      text-decoration: none;
    }

    .footer-section a:hover {
      text-decoration: underline;
    }

    .footer-contact p {
      display: flex;
      align-items: center;
    }

    .footer-contact p i {
      margin-right: 10px;
    }

    .social-icons {
      display: flex;
      gap: 15px;
      margin-top: 10px;
    }

    .social-icons a {
      font-size: 16px;
      color: white;
      text-decoration: none;
    }

    .social-icons a:hover {
      color: #f4f4f4;
    }

    .footer-bottom {
      border-top: 1px solid #289cac;
      margin-top: 20px;
      padding-top: 20px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .footer-bottom div a {
      font-size: 14px;
      color: white;
      margin-right: 15px;
      text-decoration: none;
    }

    .footer-bottom div a:hover {
      text-decoration: underline;
    }

    .footer-badge img {
      height: 50px;
      margin-right: 15px;
    }
  </style>
</head>
<body>

  <footer class="footer">
    
    <div class="footer-container">
      <div class="footer-section">
        <h3>sneh kunj girls campus</h3>
        <p>At.Morthana, Valthan-puna canal road,
Kamrej,</p>
        <p>Surat, Pin.394325
Gujarat.</p>
      </div>

      <div class="footer-section footer-contact">
        <p><i class="fas fa-phone-alt"></i> +91 7069013231</p>
        <p><i class="fas fa-phone-alt"></i> +91 7863864800</p>
       
        <p><i class="fas fa-envelope"></i> <a href="mailto:info@uni-marburg.de">snehkunj@gmail.com</a></p>
      </div>

      <div class="footer-section">
       

        <!-- Social Media Icons -->
        <div class="social-icons">
          <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div>

         <a href="/campus_management/home.php">Home</a></li>
                <a href="shome.php">School</a>
                <a href="../college/chome.php">College</a>
                <a href="../hostel/hhome.php">Hostel</a>
                <a href="/campus_management/tarnsport.php">Transportation</a>
               <a href="/campus_management/aboutus.php">About us</a>
                <a href="/campus_management/contact.php">Contact us</a>
      </div>
      <div>
        <div class="footer-badge">
          <img src="\campus_management\admin\images\Picsart_25-01-06_18-46-54-842.png" alt="Badge 1">
          
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
