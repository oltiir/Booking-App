<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include_once '../includes/Database.php';
include_once '../classes/Deal.php';
include_once '../classes/Flight.php';

$db = new Database();
$conn = $db->getConnection();
$dealObj = new Deal($conn);
$flightObj = new Flight($conn);

$message = "";

if (isset($_GET['delete_deal'])) {
    if ($dealObj->delete($_GET['delete_deal'])) {
        $message = "Deal u fshi me sukses!";
    }
}

if (isset($_GET['delete_flight'])) {
    if ($flightObj->delete($_GET['delete_flight'])) {
        $message = "Fluturimi u fshi me sukses!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_deal'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $admin_id = $_SESSION['user_id']; 

    if ($dealObj->create($title, $desc, $price, $img, $admin_id)) {
        $message = "Deal u shtua me sukses!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_flight'])) {
    $name = $_POST['name'];
    $airline = $_POST['airline'];
    $ticket_type = $_POST['ticket_type'];
    $image = $_POST['image'];
    $created_at = date('Y-m-d H:i:s');

    if ($flightObj->create($name, $airline, $image, $ticket_type, $created_at)) {
        $message = "Fluturimi u shtua me sukses!";
    }
}

$users = $conn->query("SELECT id, name, email, role FROM user")->fetchAll(PDO::FETCH_ASSOC);
$contactMsgs = $conn->query("SELECT * FROM contact_messages ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
$deals = $dealObj->readAll()->fetchAll(PDO::FETCH_ASSOC);
$stmt = $flightObj->getAllActive();
$flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($flights) && $stmt->rowCount() === 0) {
    echo "<div style='background:red;color:white;padding:10px;'>No flights found or query issue.</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | Raw Mode</title>
    <style>
        body {
            font-family: monospace;
            background: #f0f0f0;
            padding: 20px;
            color: #333; 
        }
        .container { 
            max-width: 1000px; 
            margin: auto; 
            background: white; 
            padding: 20px; 
            border: 2px solid #000; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 30px; 
        }
        th, td { 
            border: 1px solid #000; 
            padding: 8px; 
            text-align: left; 
            font-size: 13px; 
        }
        th { 
            background: #eee; 
        }
        .form-group { 
            margin-bottom: 10px; 
        }
        input, textarea {
            width: 100%; 
            padding: 5px; 
            box-sizing: border-box; 
            border: 1px solid #000; 
        }
        button { 
            background: #000; 
            color: #fff; 
            padding: 10px; 
            border: none; 
            cursor: pointer; 
            width: 100%; 
        }
        .nav { 
            margin-bottom: 20px; 
            border-bottom: 1px solid #000; 
            padding-bottom: 10px; 
        }
        .msg { 
            background: #dfd; 
            padding: 10px; 
            border: 1px solid green; 
            margin-bottom: 10px; 
        }
        h2 { 
            border-left: 5px solid #000; 
            padding-left: 10px; 
            text-transform: uppercase; 
            font-size: 18px; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="nav">
        <strong>ADMIN DASHBOARD</strong> | 
        <a href="home.php">WEB PAGE</a> | 
        <a href="logout.php" style="color:red;">LOGOUT</a>
    </div>

    <?php if($message) echo "<div class='msg'>$message</div>"; ?>

    <h2>1. Shto Deal të ri</h2>
    <form method="POST" style="margin-bottom: 40px;">
        <div class="form-group"><input type="text" name="title" placeholder="Titulli" required></div>
        <div class="form-group"><textarea name="desc" placeholder="Pershkrimi" required></textarea></div>
        <div class="form-group"><input type="number" name="price" placeholder="Cmimi (€)" required></div>
        <div class="form-group"><input type="text" name="img" placeholder="Emri i fotos (psh: paris.jpg)" required></div>
        <button type="submit" name="add_deal">RUAJ DEAL-IN</button>
    </form>

    <h2>2. Shto Fluturim të ri</h2>
    <form method="POST" style="margin-bottom: 40px;">
        <div class="form-group"><input type="text" name="name" placeholder="Emri" required></div>
        <div class="form-group"><input type="text" name="airline" placeholder="Linja ajrore" required></div>
        <div class="form-group"><input type="text" name="image" placeholder="Emri i fotos" required></div>
        <div class="form-group"><input type="text" name="ticket_type" placeholder="Lloji i biletës" required></div>
        <button type="submit" name="add_flight">RUAJ FLUTURIMIN</button>
    </form>

    <h2>3. Menaxho Deals (CRUD)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulli</th>
                <th>Cmimi</th>
                <th>Shtuar nga</th>
                <th>Veprimi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deals as $d): ?>
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['title']; ?></td>
                <td><?php echo $d['price']; ?></td>
                <td><?php echo $d['admin_name']; ?></td>
                <td>
                    <a href="dashboard.php?delete_deal=<?php echo $d['id']; ?>" 
                       onclick="return confirm('A jeni i sigurt?')" 
                       style="color:red; font-weight:bold;">[DELETE]</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>4. Menaxho Fluturimet (CRUD)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulli</th>
                <th>Linja e fluturimeve</th>
                <th>Lloji i biletës</th>
                <th>Veprimi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flights as $f): ?>
            <tr>
                <td><?php echo $f['id']; ?></td>
                <td><?php echo $f['name']; ?></td>
                <td><?php echo $f['airline']; ?></td>
                <td><?php echo $f['ticket_type']; ?></td>
                <td>
                    <a href="dashboard.php?delete_flight=<?php echo $f['id']; ?>" 
                    onclick="return confirm('A jeni i sigurt?')" 
                    style="color:red; font-weight:bold;">[DELETE]</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>5. Mesazhet nga Kontakti</h2>
    <table>
        <thead>
            <tr>
                <th>Emri</th>
                <th>Email</th>
                <th>Mesazhi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactMsgs as $m): ?>
            <tr>
                <td><?php echo htmlspecialchars($m['name']); ?></td>
                <td><?php echo htmlspecialchars($m['email']); ?></td>
                <td><?php echo htmlspecialchars($m['message']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>6. Perdoruesit</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Emer</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td><?php echo $u['id']; ?></td>
                <td><?php echo htmlspecialchars($u['name']); ?></td>
                <td><?php echo htmlspecialchars($u['email']); ?></td>
                <td><?php echo $u['role']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>