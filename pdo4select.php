<?php
// database connectie toevoegen
require 'db_connect.php'; 

// query om alle producten te halen
$query = "SELECT id, naam, prijs FROM producten";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Product Overzicht</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .edit-btn {
            background-color: blue;
        }
        .delete-btn {
            background-color: red;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Product Overzicht</h1>
    <table>
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Actie</th>
        </tr>

        <?php
        // gegevens uit de database tonen
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['naam']) . "</td>
                        <td>€" . number_format($row['prijs'], 2) . "</td>
                        <td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn edit-btn'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn delete-btn'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Geen producten gevonden.</td></tr>";
        }

        $conn->close(); // sluit de databaseconnectie
        ?>

    </table>
</body>

</html>
