<?php
// Read the JSON file
$file = 'data.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registered Users</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin: 20px;
    }

    .card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card h2 {
      margin: 0;
      font-size: 1.5rem;
      color: #333;
    }

    .card p {
      margin: 5px 0;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Registered Users</h1>
    <div class="card-container">
      <?php if (!empty($data)): ?>
        <?php foreach ($data as $user): ?>
          <div class="card">
            <h2><?php echo htmlspecialchars($user['name']); ?></h2>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dob']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
            <p><strong>Message:</strong> <?php echo htmlspecialchars($user['message']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No registered users yet.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
