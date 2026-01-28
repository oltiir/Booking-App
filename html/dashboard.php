<?php
session_start();

// Security Check: Kick out anyone who isn't an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include_once '../includes/Database.php';

$db = new Database();
$conn = $db->getConnection();

$query = "SELECT id, name, surname, email, role, created_at FROM user";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/general.css"> <style>
        .dashboard-container { padding: 50px; font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .admin-badge { background: #ff4757; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Admin Control Panel</h1>
        <p>Welcome back, <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
        
        <nav>
            <a href="home.php">View Site</a> | 
            <a href="manage_deals.php">Manage Deals</a> | 
            <a href="logout.php" style="color:red;">Logout</a>
        </nav>

        <hr>

        <h2>Registered Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?php echo $u['id']; ?></td>
                    <td><?php echo htmlspecialchars($u['name'] . ' ' . $u['surname']); ?></td>
                    <td><?php echo htmlspecialchars($u['email']); ?></td>
                    <td>
                        <?php if ($u['role'] === 'admin'): ?>
                            <span class="admin-badge">Admin</span>
                        <?php else: ?>
                            User
                        <?php endif; ?>
                    </td>
                    <td><?php echo $u['created_at']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>