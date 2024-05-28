<?php
require 'config.php';

session_start();

// Check if the user is already logged in
if (isset($_SESSION['user1_id'])) {
    header('Location: index.php');  // Adjust the path as needed
    exit();
}

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the database query
    $stmt = $conn->prepare('SELECT * FROM users1 WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful
        $_SESSION['user1_id'] = $user['id'];
        $_SESSION['user1_username'] = $user['username'];
        $_SESSION['last_activity'] = time();  // Update last activity for session timeout

        // Redirect to homepage
        header('Location: index.php');  // Adjust the path as needed
        exit();
    } else {
        $error = 'Invalid username or password!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
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
        <h2>User Login</h2>
        <?php if (isset($_GET['message'])): ?>
            <p style="color: green;"><?= $_GET['message'] ?></p>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="login_1.php">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <!-- Submit button -->
            <button type="submit">Login</button>
        </form>

        <!-- Link to registration page -->
        <p>Don't have an account? <a href="register1.php">Register</a></p>
    </div>
</body>
</html>