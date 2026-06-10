<?php
require_once 'config.php';
$sql = "SELECT * FROM students ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
 <title>Student List</title>
 <link rel="stylesheet" href="styles.css">
</head>
<body>

<p>
 <a href="add.php" style="
 display: inline-block;
 padding: 10px 20px;
 background: #4CAF50;
 color: white;
 text-decoration: none;
 border-radius: 4px;
 ">+ Add Student</a>
</p>

 <div class="container">
 <h1>Student List</h1>

 <table>
 <tr>
 <th>ID</th>
 <th>Name</th>
 <th>Course</th>
 <th>Year</th>
 <th>Date Added</th>

 </tr>
 <?php while ($row = $result->fetch_assoc()): ?>
 <tr>
 <td><?= $row['Id'] ?></td>
 <td><?= htmlspecialchars($row['Name']) ?></td>
 <td><?= htmlspecialchars($row['Course']) ?></td>
 <td><?= $row['Year'] ?></td>
 <td><?= $row['Created_At'] ?></td>
 </tr>
 <?php endwhile; ?>
 </table>

 <p class="count">Total: <?= $result->num_rows ?> student(s)</p>
 </div>
</body>
</html>
