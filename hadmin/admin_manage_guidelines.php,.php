<?php
include('con.php');
$limit = 1;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Delete guideline
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM visitor_guidelines WHERE id = $id");
    header("Location: admin_manage_guidelines.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Visitor Guidelines</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
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
    </style>
</head>
<body>
    
     <?php  include ('include/side.php');?>
   
    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Visitor Guidelines</h1></legend>

                


                    <table>
        <tr>
            <th>Icon</th>
            <th>Guideline</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM visitor_guidelines");
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td><i class='".$row['icon']."'></i></td>
                    <td>".$row['guideline']."</td>
                    <td>
                        <a href='admin_edit_guideline.php?id=".$row['id']."'><button class='edit-btn'>Edit</button></a>
                        <a href='admin_manage_guidelines.php?delete=".$row['id']."' onclick=\"return confirm('Are you sure?');\"><button class='delete-btn'>Delete</button></a>
                    </td>
                </tr>";
        }
        ?>
    </table>
    <!-- Pagination -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1 . $searchParam; ?>">Previous</a>
                    <?php else: ?>
                        <span class="disabled">Previous</span>
                    <?php endif; ?>

                    <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1 . $searchParam; ?>">Next</a>
                    <?php else: ?>
                        <span class="disabled">Next</span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </div>
    </div>


</body>
</html>
