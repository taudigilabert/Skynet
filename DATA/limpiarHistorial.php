<link rel="stylesheet" href="styles.css">

<?php

$archivoHistorial = 'historial.txt';

// Verificar si el archivo existe
if (file_exists($archivoHistorial)) {
    // Vaciar el archivo
    file_put_contents($archivoHistorial, '');
    echo "<script>window.location.href='data.php';</script>";
} else {
    echo "<script>alert('Error al borrar.'); window.location.href='data.php';</script>";
}
?>
