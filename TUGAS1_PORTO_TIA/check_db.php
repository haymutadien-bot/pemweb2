<?php
require_once 'koneksi.php';

// Check if tables exist
$tables = ['tb_kelas', 'tb_input'];
foreach ($tables as $table) {
    $result = mysqli_query($koneksi, "SHOW TABLES LIKE '$table'");
    if (mysqli_num_rows($result) == 0) {
        echo "Table $table does not exist<br>";
    } else {
        echo "Table $table exists<br>";
        // Show structure
        $result = mysqli_query($koneksi, "DESCRIBE $table");
        echo "<h3>$table structure:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Field'] . ' - ' . $row['Type'] . '<br>';
        }
        echo '<br>';
    }
}
?>