<?php
include 'con.php';

// Fetch images from database
$query = "SELECT * FROM gallery";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>school Gallery</title>

    <style>
        body { background: white; text-align: center; }
        .gallery { min-height: 100vh; padding-bottom: 100px; }
        .controls { display: flex; justify-content: center; flex-wrap: wrap; padding: 20px 0; list-style: none; }
        .buttons { height: 40px; width: 160px; background: #003366; color: white; border: 2px solid whitesmoke; font-size: 16px; line-height: 40px; cursor: pointer; margin: 10px; box-shadow: 0 3px 5px rgba(0,0,0,.3); text-align: center; }
        .buttons.active { background: #003366; color: white; }
        .image-container { display: flex; flex-wrap: wrap; justify-content: center; }
        .image {
    height: 250px;
    width: 300px;
    overflow: hidden;
    border: 8px solid #003366; /* Updated border color */
    box-shadow: 0 3px 5px rgba(0,0,0,.3);
    margin: 20px;
    position: relative;
}

        .image img { height: 100%; width: 100%; object-fit: cover; transition: transform 0.3s; }
        .image:hover img { transform: scale(1.2); }
        .description { position: absolute; bottom: 0; left: 0; width: 100%; background: rgba(0, 0, 0, 0.7); color: white; padding: 10px; text-align: center; opacity: 0; transition: opacity 0.3s; }
        .image:hover .description { opacity: 1; }
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.buttons').click(function(){
                $(this).addClass('active').siblings().removeClass('active');
                var filter = $(this).attr('data-filter');
                if(filter == 'all'){
                    $('.image').show(400);
                } else {
                    $('.image').not('.'+filter).hide(200);
                    $('.image').filter('.'+filter).show(400);
                }
            });
        });
    </script>
</head>
<body>


 <?php include_once('include1\header2.php'); ?>


  <section class="about-header1">
    <div class="about-image1">
        <h1>Gallery</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Gallery
        </div>
    </div>
</section>
<section>

    <div class="gallery">
        <!-- Category Buttons -->
        <ul class="controls">
            <li class="buttons active" data-filter="all">All</li>
            <li class="buttons" data-filter="Seminar">Seminar</li>
            <li class="buttons" data-filter="Navratri">Navratri</li>
           
           
            <li class="buttons" data-filter="Yoga">Yoga</li>
          
            <li class="buttons" data-filter="Tour">Tour</li>
          
            <li class="buttons" data-filter="Janmasthami ">Janmasthami </li>
        </ul>

        <div class="image-container">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="image <?php echo $row['category']; ?>">
                   
                        <img src="<?php echo $row['image']; ?>" alt="Gallery Image">
                    <div class="description"><?php echo $row['description']; ?></div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>
<?php  include 'include1/footer.php';?>

</body>
</html>
