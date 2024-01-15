<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
</head>
<body>
    <h1>Customer Orders</h1>

    <?php
  

   $conn = mysqli_connect('localhost','root','','uasaditya') or die($conn);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mendapatkan data pelanggan dan pesanan
    $sql = "SELECT Customers.FirstName, Customers.LastName, Orders.OrderDate, Orders.TotalAmount 
            FROM Customers
            LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Menampilkan data dalam tabel
        echo "<table border='1'>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Order Date</th><th>Total Amount</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["FirstName"] . "</td>";
            echo "<td>" . $row["LastName"] . "</td>";
            echo "<td>" . $row["OrderDate"] . "</td>";
            echo "<td>" . $row["TotalAmount"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    // Tutup koneksi database
    $conn->close();
    ?>
</body>
</html>
