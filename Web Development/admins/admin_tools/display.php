<?php

$mysqli = new mysqli("localhost", "root", "root", "library");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$tableData = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tables'])) {
    $selectedTables = $_POST['tables']; 

    foreach ($selectedTables as $table) {
        $sql = "SELECT * FROM $table";
        $result = $mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            $tableData[$table] = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $tableData[$table] = [];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Library Tables</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 80%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Library Database Tables</h1>
    <div class="center-object">
    <form method="POST" action="">
        <p>Select tables to display:</p>
        <label>
            <input type="checkbox" name="tables[]" value="authors"> Authors
        </label><br>
        <label>
            <input type="checkbox" name="tables[]" value="series"> Series
        </label><br>
        <label>
            <input type="checkbox" name="tables[]" value="books"> Books
        </label><br><br>
        <button type="submit">Display Selected Tables</button>
    </form>

    <hr>

    <?php if (!empty($tableData)): ?>
        <?php foreach ($tableData as $tableName => $rows): ?>
            <h2>Table: <?= htmlspecialchars($tableName) ?></h2>
            <?php if (!empty($rows)): ?>
                <table>
                    <thead>
                        <tr>
                            <?php foreach (array_keys($rows[0]) as $column): ?>
                                <th><?= htmlspecialchars($column) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <?php foreach ($row as $value): ?>
                                    <td><?= htmlspecialchars($value) ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No data available in the <?= htmlspecialchars($tableName) ?> table.</p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php elseif ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <p>No tables selected or no data available.</p>
    <?php endif; ?>
</body>
<a href = "/admins/admin_dashboard.php">Dashboard</a>
    </div>
<style>
    body {
        background-image: url("/images/papter2.2.jpg");
        background-repeat: repeat;
        background-size: auto;
        background-position: top left;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        height: 100vh; 
        margin: 0;
        padding-top: 50px;
        color: blue;
    }
    
    .center-object {
        text-align: center;
        background-image: url("/images/black.jpg");
        background-size: cover;
        background-position: center;
        color: white;
        min-height: 100vh;
        padding: 0 400px;
        overflow:auto;
        
    }
    table {
    width: 80%;
    margin-bottom: 20px;
    border-collapse: collapse;
    border: 1px solid white; 
}
th, td {
    border: 1px solid white; 
    padding: 8px;
    text-align: left;
}
</style>
</html>
