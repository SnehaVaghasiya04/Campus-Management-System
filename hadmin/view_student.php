<?php
include 'con.php';

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Count total records for pagination
$totalResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM hostel_student");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated student data
$result = mysqli_query($conn, "SELECT * FROM hostel_student LIMIT $start, $limit");
?>

<?php include('include/side.php'); ?>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    
       body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        } 
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left: 180px;
            width:  1000px;
            margin-bottom:  30px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-bar input {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background:  #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .faculty-img {
    width: 80px;  /* Adjust width as needed */
    height: 80px; /* Adjust height as needed */
    border-radius: 5px; /* Optional: Rounds corners */
    object-fit: cover; /* Ensures proper scaling */
}

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn {
            background: #28a745;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .edit-btn:hover {
            background: #218838;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            background: #007bff;
            color: white;
        }
        .pagination .disabled {
            background: #ddd;
            color: #666;
            pointer-events: none;
        }
        /* Existing styles... */

.action-btn {
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    margin: 0 5px;
    transition: all 0.3s ease-in-out;  /* Smooth transition on hover */
}

/* Edit Button */
.edit-btn {
    background: #28a745;
    color: white;
    border: 1px solid #28a745;
}

.edit-btn:hover {
    background: #218838;
    border-color: #218838;
    transform: scale(1.05); /* Slightly enlarge on hover */
}

/* Delete Button */
.delete-btn {
    background: #dc3545;
    color: white;
    border: 1px solid #dc3545;
}

.delete-btn:hover {
    background: #c82333;
    border-color: #c82333;
    transform: scale(1.05); /* Slightly enlarge on hover */
}

/* View Button */
.view-btn {
    background: #007bff;
    color: white;
    border: 1px solid #007bff;
}

.view-btn:hover {
    background: #0056b3;
    border-color: #0056b3;
    transform: scale(1.05); /* Slightly enlarge on hover */
}

/* Optional: Styling for the buttons inside the table */
td a {
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
}

td a.view-btn {
    background: #007bff;
    color: white;
}

td a.edit-btn {
    background: #28a745;
    color: white;
}

td a.delete-btn {
    background: #dc3545;
    color: white;
}

td a:hover {
    opacity: 0.8;
}



</style>
 <div class="container mt-4">
        <div class="container1">
<h2>Confirmed Students</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>School/College</th>
        <th>Class</th>
        <th>Room Type</th>
        <th>Contact</th>
        <th>Admission ID</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['school_college'] ?></td>
        <td><?= $row['class'] ?></td>
        <td><?= $row['room_type'] ?></td>
        <td><?= $row['contact'] ?></td>
        <td><?= $row['admission_id'] ?></td>
        <td>
            <a href="student_details.php?id=<?= $row['id'] ?>" class="view-btn">View</a>
            <a href="edit_student.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a>
            <a href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?');"  class="delete-btn ">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<!-- Pagination -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
    <?php else: ?>
        <span class="disabled">Previous</span>
    <?php endif; ?>

    <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Next</a>
    <?php else: ?>
        <span class="disabled">Next</span>
    <?php endif; ?>
</div>
</div>
</div>

</body>
</html>
