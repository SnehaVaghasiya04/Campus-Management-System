<?php
include 'con.php'; // Database Connection

$result = mysqli_query($conn, "SELECT * FROM rooms ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Rooms</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link External CSS -->
    <style>
        /* Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #f8f9fa;
    color: #333;
}

/* Container */
.container1  {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
    text-align: center;
    margin-top: 30px;
}

/* Title */
.title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
}
.title span {
    color: #ff4081;
}

/* Dropdown Filter */
.filter select {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 2px solid #ff4081;
    cursor: pointer;
    outline: none;
    background: white;
    color: #333;
}
.filter {
    margin-bottom: 20px;
}

/* Room Container */
.room-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 10px;
}

/* Room Card */
.room-card {
    background: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    text-align: left;
}
.room-card:hover {
    transform: scale(1.03);
}

/* Room Image */
.room-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

/* Room Details */
.room-details p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

/* Book Button */
.book-btn {
    width: 100%;
    padding: 10px;
    background: #ff4081;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
.book-btn:hover {
    background: #e60065;
}
 /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg")  center center/cover;
            height: 300px;
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
            padding: 0 20px;
        padding-left:   550px;
        }

        .contain1 {
            font-size: 20px;
        }

        .contain1 a {
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>

<?php include('include/header1.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Available Rooms for  Girls</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Room
        </div>
    </div>
</section>


<div class="container1">
    

    

    <div class="room-container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="room-card">
                <img src="images1/<?php echo $row['image']; ?>" alt="Room Image" class="room-image">

                <div class="room-details">
                    <h3><?= $row['room_type'] ?></h3>
                   
                    <p><strong>Capacity:</strong> <?= $row['capacity'] ?> students</p>
                    <p><?= $row['description'] ?></p>
                </div>

              
            </div>
        <?php } ?>
    </div>
</div>
<?php  include 'include/footer.php';?>

</body>
</html>
