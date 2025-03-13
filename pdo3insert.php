<?php
// insert.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $product_naam, $prijs_per_stuk, $omschrijving);
    $stmt->execute();
}

// Formulier
?>
<form method="post" action="">
    Product Naam: <input type="text" name="product_naam" required><br>
    Prijs per Stuk: <input type="number" name="prijs_per_stuk" required><br>
    Omschrijving: <textarea name="omschrijving" required></textarea><br>
    <input type="submit" value="Voeg Product Toe">
</form>
