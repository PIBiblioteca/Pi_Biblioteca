<?php
include "connection.php";

echo "</tr>";
$cont = 1;
echo "<tr>"; 
echo "<th>"; echo "$titulo_linha"; echo "</th>";
while ($cont <= 31) {
?>
    <td style="align: center; "><input style="width: 20px; text-align: center; border: none" type="int" name="dia<?php echo $cont; ?>" value="0" required=""></td>
<?php
    $cont = $cont + 1; 
}
echo "</tr>";
echo "</tr>";
