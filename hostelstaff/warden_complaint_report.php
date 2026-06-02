<?php
include 'con.php';

$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Count total records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM complaint_form";
$totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];

$totalPages = ceil($totalRecords / $limit); // Calculate total pages

// Fetch records for the current page
$result = mysqli_query($conn, "SELECT * FROM complaint_form LIMIT $start, $limit");

// Handle form submission for answering complaints
if (isset($_POST['submit_answer'])) {
    $complaint_id = $_POST['complaint_id'];
    $answer = $_POST['answer'];

    $update_query = "UPDATE complaint_form SET answer = '$answer' WHERE id = '$complaint_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Answer submitted successfully!'); window.location.href='?page=$page';</script>";
    } else {
        echo "<script>alert('Error submitting answer.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complaints Report</title>
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
            width: 1000px;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        fieldset {
    border: none;
}

        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background: #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
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

<?php include_once ('include/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Warden - Complaints & Responses</h1></legend>

            <table>
                <tr>
                    <th>Admission ID</th>
                    <th>Issue Type</th>
                    <th>Description</th>
                    <th>Complaint Date</th>
                    <th>Answer</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['admission_id']; ?></td>
                        <td><?php echo $row['issue_type']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['complaint_date']; ?></td>
                        <td>
                            <?php if ($row['answer']) {
                                echo nl2br($row['answer']);
                            } else { ?>
                                <form method="POST">
                                    <input type="hidden" name="complaint_id" value="<?php echo $row['id']; ?>">
                                    <textarea name="answer" placeholder="Enter your answer"></textarea>
                                    <button type="submit" name="submit_answer" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                            <?php } ?>
                        </td>
                        <td><?php echo $row['answer'] ? 'Answered' : 'Pending'; ?></td>
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
        </fieldset>
    </div>
</div>
</body>
</html>
