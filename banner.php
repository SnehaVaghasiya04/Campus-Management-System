<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sneh kunj girls campus </title>
  <style>
    /* Modal Background */
    .modal {
      display: block;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Modal Content */
    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 30px;
      border-radius: 10px;
      width: 90%;
      max-width: 1000px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.8s ease;
      position: relative;
    }

    /* Close Symbol (×) */
    .close-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      background: none;
      border: none;
      color: #ff4d4d;
      font-size: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .close-btn:hover {
      color: #d93636;
    }

    /* Logo and Name Container */
    .logo-name {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    /* Logo */
    .logo-name img {
      width: 90px;
    }

    /* College Name */
    .logo-name h1 {
      font-size: 22px;
      color: #333;
      margin: 0;
    }

    /* Description */
    .modal-content p {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }

    /* Image Group */
    .image-group {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 20px;
    }

    /* Campus Images */
    .image-group img {
      width: 400px;
      height: 150px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #007BFF;
    }

    /* Button Container */
    .button-group1 {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 10px;
    }

    /* Buttons */
    .btn1 {
      flex: 1;
      padding: 12px 0;
      background-color: #007BFF;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .btn1:hover {
      background-color: #0056b3;
    }

    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo-name  h1{
      font-size: 50px;
      color: #003366;

    }

    
    
  </style>
</head>
<body>

  <!-- Modal Structure -->
  <div id="customModal" class="modal">

    <!-- Simple Close Symbol (×) -->
    <button class="close-btn" id="closeModal">×</button>

    <div class="modal-content">

      <!-- Logo and College Name -->
      <div class="logo-name">
        <img src="\campus_management\admin\images\Picsart_25-01-06_18-46-54-842.png" alt="SDJ International College Logo">
        <h1>Sneh Kunj Girls Campus</h1>
      </div>

      <p style="color: red;">Please select your campus to proceed</p>

      <!-- Campus Images -->
      <div class="image-group">
        <img src="\campus_management\admin\images\pngtree-school-building-afternoon-school-campus-photography-map-with-map-image_825166.jpg" alt="Vesu Campus">
        <img src="\campus_management\admin\images\college.jpg" alt="Palsana Campus">
        <img src="\campus_management\admin\images\hostel.jpg" alt="Palsana Campus">
      </div>

      <!-- Navigation Buttons -->
      <div class="button-group1">
        <a href="school/shome.php" class="btn1">School</a>
        <a href="college/chome.php" class="btn1">College</a>
        <a href="hostel/hhome.php" class="btn1">Hostel</a>
      </div>

      <!-- Close Button at Bottom -->
     <button class="close-btn" id="closeModalTop">×</button>
...
<button class="close-btn" id="closeModalBottom">×</button>

    </div>
  </div>

  <!-- JS for Closing Modal -->
  <script>
   
  // Function to close the modal
  function closeModal() {
    document.getElementById('customModal').style.display = 'none';
  }

  // Attach event to both buttons
  document.getElementById('closeModalTop').onclick = closeModal;
  document.getElementById('closeModalBottom').onclick = closeModal;


  </script>

</body>
</html>
