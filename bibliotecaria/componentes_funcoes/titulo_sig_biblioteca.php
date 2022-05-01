<?php
include "connection.php";
$cont = 1;
echo "<tr>";
echo "<th>"; echo ""; echo "</th>";
while ($cont <= 31) {
    echo "<th style='text-align: center'>"; echo "$cont"; echo "</th>";
    $cont = $cont + 1;
}
