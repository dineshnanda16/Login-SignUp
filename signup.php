<?php
include 'includes/db_connect.php';
session_start(); // Start the session for session management

// Function to hash passwords (for signup)
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Signup Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hashPassword($_POST['password']); // Hash the password
    $role = $_POST['role'];

    // Query to insert new user into the database
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Registration successful.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv2TQhH6R0kT3R1EJ2ShAghPb0rb46j6j0cmftwAq2uCkGV0F8B2qgsTn1n" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #FF7E5F, #FEB47B); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        .btn-custom {
            background-color: #FF7E5F;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 50px;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #FEB47B;
        }
        .form-label {
            font-weight: bold;
            font-size: 1rem;
            color: #333;
        }
        .form-control {
            border-radius: 30px;
            margin-bottom: 1.5rem;
            padding: 12px 20px;
            font-size: 1rem;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #FF7E5F;
            box-shadow: 0 0 8px rgba(255, 126, 95, 0.5);
        }
        .form-select {
            border-radius: 50px;
            padding: 12px 20px;
            font-size: 1rem;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-select:focus {
            border-color: #FF7E5F;
            box-shadow: 0 0 8px rgba(255, 126, 95, 0.5);
        }
        .text-center {
            margin-top: 20px;
        }
        .alert {
            font-size: 1rem;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Signup</h2>
        <form method="POST">
            <div class="mb-3 row">
                <label for="username" class="col-sm-3 col-form-label form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-3 col-form-label form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-3 col-form-label form-label">Role</label>
                <div class="col-sm-9">
                    <select class="form-select" id="role" name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-custom" name="signup">Signup</button>
        </form>

        <!-- Link to Login -->
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <!-- Bootstrap JS & Popper.js Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybY5mvvQH6s81g93cU1z5txVJ7pRDiFjdH6cfe8bK1t8ocZpR2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0gGkcuJ7vFvW4Zt5S3VZ8Qda2tP3czf5JY61mjgFe2g97r2d" crossorigin="anonymous"></script>

</body>
</html>
