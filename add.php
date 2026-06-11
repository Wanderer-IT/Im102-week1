<?php
require_once 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $course = $conn->real_escape_string($_POST['course'] ?? '');
    $year = (int)($_POST['year'] ?? 0);
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber'] ?? '');

    if (empty($name) || empty($course) || empty($year) || empty($email) || empty($phoneNumber)) {

        $message = '<p style="color:red;">All fields are required.</p>';

    } else {

        $sql = "INSERT INTO students (Name, Course, Year, Email, PhoneNumber)
                VALUES ('$name', '$course', $year, '$email', '$phoneNumber')";

        if ($conn->query($sql)) {
            header('Location: index.php');
            exit;
        } else {
            $message = '<p style="color:red;">Error: ' . $conn->error . '</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="add.css">
</head>
<body>

<div class="container">

    <h1>Add New Student</h1>

    <?= $message ?>

    <form method="POST">

        <label>Full Name</label>
        <input
            type="text"
            name="name"
            required
            placeholder="e.g. Juan Dela Cruz">

        <label>Course</label>
        <select name="course" required>
            <option value="">-- Select Course --</option>
            <option value="BSIT">BSIT</option>
            <option value="BSCS">BSCS</option>
        </select>

        <label>Year Level</label>
        <input
            type="number"
            name="year"
            min="1"
            max="5"
            required
            placeholder="1-5">

        <label>Email</label>
        <input
            type="email"
            name="email"
            required
            placeholder="student@example.com">

        <label>Phone Number</label>
        <input
            type="text"
            name="phoneNumber"
            required
            placeholder="09123456789">

        <button type="submit">Add Student</button>
        <a href="index.php" class="cancel">Cancel</a>

    </form>

</div>

</body>
</html>
```
