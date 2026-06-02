<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Top Bar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
         *{
            margin: 0;
            padding: 0;
          
            font-family: times new roman;
        }
        .d1 {
            display: flex;
           
            background: #f4f4f4;
        }

        /* Top Bar */
        .topbar1 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: #003452;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .topbar1 .profile1 {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
        }
        .topbar1 .profile1:hover {
            background: #002a3a;
        }
        .topbar1 .profile1 img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .profile-dropdown1 {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background: #004d66;
            color: white;
            width: 180px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            list-style: none;
            padding: 10px 0;
        }
        .profile-dropdown1 li {
            padding: 10px;
            text-align: left;
            cursor: pointer;
        }
        .profile-dropdown1 li a {
            text-decoration: none;
            color: white;
            display: block;
        }
        .profile-dropdown1 li:hover {
            background: #003d54;
        }
        .profile1.active1 .profile-dropdown1 {
            display: block;
        }

        /* Sidebar */
        .sidebar1 {
            width: 250px;
            background: #003452;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 60px;
            transition: all 0.3s;
            overflow-y: auto;
            max-height: calc(100vh - 60px);
        }

        /* Custom Scrollbar Styling */
        .sidebar1::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar1::-webkit-scrollbar-thumb {
            background: #004d66;
            border-radius: 4px;
        }

        .sidebar1::-webkit-scrollbar-thumb:hover {
            background: #002a3a;
        }

        .nav-links1 {
            list-style: none;
        }
        .nav-links1 li {
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-links1 li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.3s;
            width: 100%;
        }
        .nav-links1 li a:hover {
            background: #002a3a;
            border-radius: 5px;
        }
        .dropdown1 {
            display: none;
            padding-left: 20px;
            background: #004d66;
        }
        .dropdown1 a {
            font-size: 16px;
        }
        .dropdown1.active1 {
            display: block;
        }

       

        @media screen and (max-width: 768px) {
            .sidebar1 {
                width: 60px;
            }
            .sidebar1 .nav-links1 li a span {
                display: none;
            }
            .content1 {
                margin-left: 60px;
            }
        }

        .logo1 img {
            width: 50px;
            height: 50px;
        }

        .arrow {
            transition: transform 0.3s ease;
        }
        .rotate {
            transform: rotate(-90deg);
        }
        .logo1 h1 {
            font-size: 20px;
            color: white;
            margin: 0;

        }
    </style>
</head>
<body>
    <div class="a1">
    <div class="topbar1">
       <div class="logo1" style="display: flex; align-items: center; gap: 10px;">
            <img src="\campus_management\admin\images\Picsart_25-01-06_18-46-54-842.png" alt="Logo"> 
            <h1> College Staff Panel</h1>
        </div>
        <div class="profile1" onclick="toggleProfileDropdown()">
           <i class="fas fa-user"></i>
            <span>Admin</span>
            <ul class="profile-dropdown1">
                <li><a href="\campus_management\collegestaff\view_profile.php">View Profile</a></li>
                <li><a href="\campus_management\collegestaff\edit_profile.php">Edit Profile</a></li>
                
                <li><a href="\campus_management\collegestaff\logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar1">
        <ul class="nav-links1">

            <!-- 1-->
            <li><a href="\campus_management\collegestaff\dashboard.php"><i class="fas fa-chart-bar"></i> <span>Dashboard</span></a></li>

            <!-- 2 -->
            <li onclick="toggleDropdown(this)">
                <a href="#"><i class="fas fa-envelope"></i> <span>Students</span></a>
                <i class="fas fa-chevron-left arrow"></i>
            </li>
            <ul class="dropdown1">
                <li><a href="\campus_management\collegestaff\view_all student.php">view all student</a></li>
        <li><a href="\campus_management\collegestaff\total_student.php">view  Total student </a></li>
         <li><a href="\campus_management\collegestaff\semester_student.php">Semster student </a></li>
            </ul>

           <!-- 3 -->
            <li onclick="toggleDropdown(this)">
                <a href="#">  <i class="fas fa-chalkboard-teacher"></i> <span>Attdance</span></a>
                <i class="fas fa-chevron-left arrow"></i>
            </li>
            <ul class="dropdown1">
               <li><a href="\campus_management\collegestaff\bca_student.php"> Bca Attadence</a></li>
        <li><a href="\campus_management\collegestaff\bcom_student.php"> BCOM Attadance</a></li>
        <li><a href="\campus_management\collegestaff\bba_student.php"> BBA Attadance</a></li>
        <li><a href="\campus_management\collegestaff\mscit_student.php"> MSCIT Attadance</a></li>
            </ul>


            <!-- 4 -->

             <li onclick="toggleDropdown(this)">
                <a href="#">  <i class="fas fa-file-alt"></i> <span>Exam</span></a>
                <i class="fas fa-chevron-left arrow"></i>
            </li>
            <ul class="dropdown1">
                <li><a href="\campus_management\collegestaff\staff_exam_schedule.php">view exam schedule</a></li>
       
            </ul>

            <!-- 5 -->

             <li onclick="toggleDropdown(this)">
                <a href="#"> <i class="fas fa-hand-holding-usd"></i> <span>Study Material</span></a>
                <i class="fas fa-chevron-left arrow"></i>
            </li>
            <ul class="dropdown1">
          <li><a href="\campus_management\collegestaff\upload_study.php">upload study material</a></li>
      
        <li><a href="\campus_management\collegestaff\manage_study_materials.php">manage study material</a></li>

            </ul>

            <!-- 6 -->

             <li onclick="toggleDropdown(this)">
                <a href="#">   <i class="fas fa-user-plus"></i> <span>Time Table</span></a>
                <i class="fas fa-chevron-left arrow"></i>
            </li>
            <ul class="dropdown1">
                  <li><a href="\campus_management\collegestaff\view_timetable.php">view timetable</a></li>
       
            </ul>

           


         

           







        </ul>
    </div>
   </div>
    <script>
        function toggleProfileDropdown() {
            document.querySelector('.profile1').classList.toggle('active1');
        }

        function toggleDropdown(element) {
            let dropdown = element.nextElementSibling;
            if (dropdown && dropdown.classList.contains('dropdown1')) {
                dropdown.classList.toggle('active1');
                let arrow = element.querySelector('.arrow');
                if (arrow) {
                    arrow.classList.toggle('rotate');
                }
            }
        }
    </script>
</body>
</html>
