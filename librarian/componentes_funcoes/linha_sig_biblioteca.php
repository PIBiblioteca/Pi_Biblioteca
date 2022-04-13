<?php
include "../librarian/componentes_funcoes/connection.php";

echo "</tr>";
$cont = 1;
echo "<tr>"; 
echo "<th>"; echo "$titulo_linha"; echo "</th>";
while ($cont <= 31) {
?>
    <td><input type="int" name="dia<?php echo $cont; ?>" class="form-control" value="0" required=""></td>
<?php
    $cont = $cont + 1; 
}
echo "</tr>";
echo "</tr>";
