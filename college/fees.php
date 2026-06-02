<?php 
include 'con.php';

// Fetch semester-wise fees
$sql = "SELECT * FROM college_fees ORDER BY course, semester";
$result = $conn->query($sql);
$fees_data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fees_data[] = $row;
    }
}

// Fetch transportation fees
$sql_transport = "SELECT * FROM buses";
$result_transport = $conn->query($sql_transport);
$transport_data = [];

if ($result_transport->num_rows > 0) {
    while ($row = $result_transport->fetch_assoc()) {
        $transport_data[] = $row;
    }
}

// Fetch hostel room types and their fees
$sql_hostel = "SELECT * FROM hostel_fees"; 
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
    <title>College Fees Structure</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; text-align: center; }
        .fee-container { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px; }
        .fee-card { width: 300px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); transition: transform 0.2s;  }
        .fee-card:hover { transform: scale(1.05); }
        h2 {
    background: linear-gradient(45deg, #003366, #005599); /* Blue shades */
    color: white;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 15px;
    font-size: 22px;
}

        p { font-size: 16px; }
        select, input { padding: 5px; margin-top: 5px; }
       button {
    background: #003366; /* Button color as per your header */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
    transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 51, 102, 0.4); /* Matching shadow */
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
}

button:hover {
    background: #003366 /* Nice contrast on hover */
    transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(0, 51, 102, 0.6);
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
    <script>
        function redirectToBillPage(index) {
            let course = document.getElementById(`course_${index}`).innerText;
            let semester = document.getElementById(`semester_${index}`).innerText;
            let registrationFee = parseFloat(document.getElementById(`registration_${index}`).innerText);
            let tuitionFee = parseFloat(document.getElementById(`tuition_${index}`).innerText);
            let hostelFee = document.getElementById(`hostel_${index}`).checked ? parseFloat(document.getElementById(`hostel_fee_${index}`).value) : 0;
            let transportFee = parseFloat(document.getElementById(`transport_fee_${index}`).value);

            let total = registrationFee + tuitionFee + hostelFee + transportFee;

            let url = `total_bill.php?course=${course}&semester=${semester}&registration=${registrationFee}&tuition=${tuitionFee}&hostel=${hostelFee}&transport=${transportFee}&total=${total}`;
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
    </script>
</head>
<body>

<?php include ('include2/add.php') ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Fees Structure</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Fees
        </div>
    </div>
</section>
    
    <div class="fee-container">
        <?php foreach ($fees_data as $index => $fee) { ?>
            <div class="fee-card">
                <h2 id="course_<?php echo $index; ?>"><?php echo $fee["course"]; ?></h2>
                <p><strong>Semester:</strong> <span id="semester_<?php echo $index; ?>"><?php echo $fee["semester"]; ?></span></p>
                <p><strong>Registration Fee:</strong> ₹<span id="registration_<?php echo $index; ?>"><?php echo $fee["registration_fee"]; ?></span></p>
                <p><strong>Tuition Fee:</strong> ₹<span id="tuition_<?php echo $index; ?>"><?php echo $fee["tuition_fee"]; ?></span></p>
                
                <p><strong>Include Hostel:</strong> <input type="checkbox" id="hostel_<?php echo $index; ?>" onclick="showHostelRoom(<?php echo $index; ?>)"></p>

                <div id="hostel_select_<?php echo $index; ?>" style="display:none;">
                    <p><strong>Select Hostel Room:</strong>
                        <select id="hostel_fee_<?php echo $index; ?>">
                            <option value="0">None</option>
                            <?php foreach ($hostel_data as $room) { ?>
                                <option value="<?php echo $room["fees"]; ?>">
                                    <?php echo $room["room_type"]; ?> - ₹<?php echo $room["fees"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </p>
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

                <button onclick="redirectToBillPage(<?php echo $index; ?>)">Show Total</button>
            </div>
        <?php } ?>
    </div>
<?php  include 'include2/footer.php';?>
</body>
</html>
