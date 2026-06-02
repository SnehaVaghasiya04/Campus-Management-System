<?php
include 'con.php';

// Fetch all fee structures from the database
$sql = "SELECT * FROM fees_structure";
$result = $conn->query($sql);
$fees_data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fees_data[] = [
            "standard" => $row["standard"],
            "registration_fee" => $row["registration_fee"],
            "composite_fee" => $row["composite_fee"],
            "frequency" => $row["frequency"]
        ];
    }
}

$sql_transport = "SELECT * FROM buses";
$result_transport = $conn->query($sql_transport);
$transport_data = [];

if ($result_transport->num_rows > 0) {
    while ($row = $result_transport->fetch_assoc()) {
        $transport_data[] = $row;
    }
}

// Fetch hostel room types and their fees for standards 5 to 12
$sql_hostel = "SELECT * FROM hostel_fees WHERE standard_course BETWEEN 5 AND 12";
$result_hostel = $conn->query($sql_hostel);
$hostel_data = [];

if ($result_hostel->num_rows > 0) {
    while ($row = $result_hostel->fetch_assoc()) {
        $hostel_data[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Structure</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
        }

        h2 {
            text-align: center;
            color: #007bff;
            font-size: 28px;
        }

        .fee-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 30px;
            border-radius: 5px;
        }

        /* 3D Card Effect */
        .fee-card {
            width: 320px;
            height: 350px;
            perspective: 1000px;
        }

        .fee-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }

        .fee-card:hover .fee-card-inner {
            transform: rotateY(180deg);
        }

        .fee-card-front, .fee-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #ffffff;
            border-radius: 15px;
            text-align: center;
            padding: 20px;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 5px solid transparent;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* 3D Border Gradient Effect */
        .fee-card-front {
            border-image: linear-gradient(120deg, #ff007f, #ffba00, #007bff, #00ff6e);
            border-image-slice: 1;
        }

        .fee-card-back {
            border-image: linear-gradient(120deg, #00ff6e, #007bff, #ffba00, #ff007f);
            border-image-slice: 1;
            transform: rotateY(180deg);
        }

        .fee-card h3 {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin: 10px 0;
            background: linear-gradient(45deg, #ff007f, #ffba00);
            color: white;
            padding: 15px;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .fee-card p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
        }

        /* Checkbox & Button */
        input[type="checkbox"] {
            transform: scale(1.2);
            margin-left: 5px;
        }

        .fee-card button {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .fee-card button:hover {
            background: linear-gradient(45deg, #0056b3, #008cff);
            transform: translateY(-3px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .fee-container {
                flex-direction: column;
                align-items: center;
            }
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
        /* Rounded shape and border color update */
.fee-card-front, .fee-card-back {
    border-radius: 50px; /* Rounder corners */
    border: 5px solid #003366; /* Solid border with primary shade */
    box-shadow: 0 10px 20px rgba(0, 51, 102, 0.3); /* Soft shadow with shade */
   
}

.fee-card h3 {
    background: linear-gradient(45deg, #003366, #005599);
    color: #fff;
    padding: 20px;
    border-radius: 50%;
    width: 180px;
    height: 180px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 51, 102, 0.4);
}

/* Button updates with shade */
.fee-card button {
    background: linear-gradient(45deg, #003366, #005599);
}

.fee-card button:hover {
    background: linear-gradient(45deg, #002244, #004477);
}


    </style>
    <script>
        function redirectToBillPage(index) {
            let standard = document.getElementById(`standard_${index}`).innerText;
            let registrationFee = parseFloat(document.getElementById(`registration_${index}`).innerText);
            let compositeFee = parseFloat(document.getElementById(`composite_${index}`).innerText);
            let hostelFee = document.getElementById(`hostel_fee_display_${index}`).value;
            let transportFee = parseFloat(document.getElementById(`transport_fee_${index}`).value);
            let frequency = document.getElementById(`frequency_${index}`).innerText;

            let total = registrationFee + compositeFee + parseFloat(hostelFee) + transportFee;

            // Redirect to total_bill.php with data as URL parameters
            let url = `total_bill.php?standard=${standard}&registration=${registrationFee}&composite=${compositeFee}&hostel=${hostelFee}&transport=${transportFee}&frequency=${frequency}&total=${total}`;
            window.location.href = url;
        }

        function showHostelRoom(index) {
            let hostelCheckbox = document.getElementById(`hostel_${index}`);
            let hostelSelect = document.getElementById(`hostel_select_${index}`);

            if (hostelCheckbox.checked) {
                hostelSelect.style.display = 'block';
            } else {
                hostelSelect.style.display = 'none';
            }
        }

        function updateHostelFee(index) {
            let hostelSelect = document.getElementById(`hostel_type_${index}`);
            let hostelFeeDisplay = document.getElementById(`hostel_fee_display_${index}`);

            // Get the selected option's room fee (stored in data-room-fee)
            let selectedOption = hostelSelect.options[hostelSelect.selectedIndex];
            let hostelFee = selectedOption.getAttribute("data-room-fee");

            // Update the read-only field with the selected hostel fee
            hostelFeeDisplay.value = hostelFee;
        }
    </script>
</head>
<body>

<?php include_once('include1/header2.php'); ?>

<!-- Header Section -->
<section class="about-header1">
    <div class="about-image1">
        <h1>Fees Structure</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="Shome.php">Home</a> &gt; Fees Structure
        </div>
    </div>
</section>

<!-- main section -->
<div class="fee-container">
    <?php foreach ($fees_data as $index => $fee) { ?>
        <div class="fee-card">
            <div class="fee-card-inner">
                <!-- Front Side -->
                <div class="fee-card-front">
                    <h3 id="standard_<?php echo $index; ?>">Standard:<?php echo $fee["standard"]; ?></h3>
                </div>

                <!-- Back Side -->
                <div class="fee-card-back">
                    <p><strong>Registration Fee:</strong> ₹<span id="registration_<?php echo $index; ?>"><?php echo $fee["registration_fee"]; ?></span></p>
                    <p><strong>Composite Fee:</strong> ₹<span id="composite_<?php echo $index; ?>"><?php echo $fee["composite_fee"]; ?></span></p>
                   
                    <p><strong>Include Hostel:</strong> <input type="checkbox" id="hostel_<?php echo $index; ?>" onclick="showHostelRoom(<?php echo $index; ?>)"></p>
                    <div id="hostel_select_<?php echo $index; ?>" style="display:none;">
                        <p><strong>Select Hostel Room Type:</strong>
                            <select id="hostel_type_<?php echo $index; ?>" onchange="updateHostelFee(<?php echo $index; ?>)">
                                <option value="0">None</option>
                                <?php foreach ($hostel_data as $room) { ?>
                                    <option value="<?php echo $room["room_type"]; ?>" data-room-fee="<?php echo $room["fees"]; ?>">
                                        <?php echo $room["room_type"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </p>
                        <p><strong>Hostel Fee:</strong> ₹<input type="text" id="hostel_fee_display_<?php echo $index; ?>" value="0" readonly></p>
                    </div>
                    <p><strong>Select Transport Route:</strong>
                    <select id="transport_fee_<?php echo $index; ?>">
                        <option value="0">None</option>
                        <?php foreach ($transport_data as $bus) { ?>
                            <option value="<?php echo $bus["fees"]; ?>">
                                <?php echo $bus["route"]; ?> - ₹<?php echo $bus["fees"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </p>
                    <p><strong>Frequency:</strong> <span id="frequency_<?php echo $index; ?>"><?php echo $fee["frequency"]; ?></span></p>
                    <button onclick="redirectToBillPage(<?php echo $index; ?>)">Proceed to Bill</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php  include 'include1/footer.php';?>
</body>
</html>
