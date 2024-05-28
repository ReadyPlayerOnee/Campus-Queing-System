<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username already exists
    $stmt = $conn->prepare('SELECT * FROM users1 WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        $error = 'Username already taken!';
    } else {
        // Username does not exist, proceed with account creation
        $stmt = $conn->prepare('INSERT INTO users1 (username, password) VALUES (?, ?)');
        $stmt->bind_param('ss', $username, $password);
        if ($stmt->execute()) {
            header('Location: login_1.php?message=Account%20created%20successfully');
            exit();
        } else {
            $error = 'Failed to create an account!';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 250px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="flex justify-center mb-4">
      <img src="manbg.png" alt="Queue System" class="rounded-full">
    </div>
        <h2>Register</h2>
        <?php if (isset($_GET['message'])): ?>
            <p style="color: green;"><?= $_GET['message'] ?></p>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <!-- Registration Form -->
        <form method="POST" action="register1.php">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <!-- Submit button -->
            <button type="submit">Submit</button>
        </form>

        <!-- Link to login page -->
        <p>Already have an account? <a href="login_1.php">Login</a></p>
    </div>
</body>
</html>