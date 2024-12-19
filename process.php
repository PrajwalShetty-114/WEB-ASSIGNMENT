<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $message = htmlspecialchars($_POST['message']);

    // Validate the input
    if (empty($name) || empty($email) || empty($phone) || empty($dob) || empty($gender)) {
        echo "<p style='color: red;'>All fields except the message are required.</p>";
        exit;
    }

    // Create an associative array for the data
    $data = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'dob' => $dob,
        'gender' => $gender,
        'message' => $message,
    ];

    // Save the data to a JSON file
    $file = 'data.json';
    $currentData = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $currentData[] = $data;
    file_put_contents($file, json_encode($currentData, JSON_PRETTY_PRINT));

    // Redirect to view.php to display the data
    header("Location: view.php");
    exit;
} else {
    echo "<p style='color: red;'>Invalid request method!</p>";
}
?>
