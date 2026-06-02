<?php
include 'con.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message_text = $_POST['message'];

    $sql = "INSERT INTO contact_form (first_name, last_name, phone, email, message) 
            VALUES ('$first_name', '$last_name', '$phone', '$email', '$message_text')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Message sent successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>

  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/contact.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: cursive;
    
      color: white;
    }

    /* Header Section */
    .about-header1 {
      position: relative;
      text-align: center;
    }

    .about-image1 {
      background: url("/campus_management/admin/images/17.jpg") center center/cover;
      height: 350px;
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
      padding-left: 550px;
    }

    .contain1 {
      font-size: 20px;
    }

    .contain1 a {
      color: white;
      text-decoration: none;
    }

    .breadcrumb {
      font-size: 1.2em;
    }

    .breadcrumb a {
      color: pink;
      text-decoration: none;
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    /* Contact Section */
    .contact-section {
      display: flex;
      justify-content: space-between;
      padding: 20px 40px;
      background-color: transparent;
    }

    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .info-box {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px;
      background-color: #003366;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      animation: slideIn 1s ease-out forwards;
      color: white;
      width: 500px;
    }

    .info-box h3 {
      margin: 0;
    }

    .icon {
      font-size: 2em;
      color: #00bcd4;
    }

    /* Form Section */
    .contact-form {
      width: 50%;
      animation: fadeIn 1.5s ease-out forwards;
      padding: 50px;
      padding-top: 20px;
    }

    .contact-form form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form-group {
      display: flex;
      gap: 15px;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #003366;
      color: white;
    }

    .form-group textarea {
      resize: vertical;
      height: 150px;
    }

    ::placeholder {
      color: white;
      opacity: 1;
      font-size: 20px;
    }

    .form-group textarea::placeholder {
      color: white;
      font-size: 20px;
    }

    .btn {
      padding: 12px 30px;
      background-color:#003366;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1.1em;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #003366;
    }

    /* Animations */
    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideIn {
      0% {
        opacity: 0;
        transform: translateX(-50px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }
    .success-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #28a745; /* Green background */
    color: white;
    padding: 15px 50px 15px 20px;
    border-radius: 5px;
    font-size: 18px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    z-index: 1000;
}

.close-btn {
    position: absolute;
    top: 8px;
    right: 12px;
    color: white;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
}
  </style>
</head>
<body>

<?php include_once('include/header1.php'); ?>
<?php if (!empty($message)): ?>
  <div class="success-message" id="successMessage">
    <span class="close-btn" onclick="document.getElementById('successMessage').style.display='none';">×</span>
    <?php echo $message; ?>
  </div>
<?php endif; ?>

<!-- Header Section -->
<section class="about-header1">
  <div class="about-image1">
    <h1>Contact Us</h1>
  </div>
  <div class="banner1">
    <div class="contain1">
      <a href="home.php">Home</a> &gt; Contact Us
    </div>
  </div>
</section>

<?php
$sql = "SELECT * FROM contact_us";
$result = $conn->query($sql);
$contactData = $result->fetch_assoc();
?>

<section class="contact-section">
  <div class="contact-info">
    <div class="info-box">
      <i class="icon">📞</i>
      <h3>Call Us</h3>
      <p><?php echo htmlspecialchars($contactData['phone']); ?></p>
    </div>
    <div class="info-box">
      <i class="icon">✉️</i>
      <h3>Email Us</h3>
      <p><?php echo htmlspecialchars($contactData['email']); ?></p>
    </div>
    <div class="info-box">
      <i class="icon">📍</i>
      <h3>Address</h3>
      <p><?php echo htmlspecialchars($contactData['address']); ?></p>
    </div>
    <div class="info-box">
      <i class="icon">⏰</i>
      <h3>Time</h3>
      <p><?php echo htmlspecialchars($contactData['working_hours']); ?></p>
    </div>
  </div>

  <div class="contact-form">
    
    <form action="#" method="POST">
      <div class="form-group">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <input type="tel" name="phone" placeholder="Phone" required>
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <textarea name="message" placeholder="Message" required></textarea>
      </div>
      <button type="submit" class="btn">Send Message</button>
    </form>
  </div>
</section>

<?php include_once('include/footer.php'); ?>

</body>
</html>
