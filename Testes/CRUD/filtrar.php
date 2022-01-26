<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <label>Pesquisar</label>
    <input type="text" name="search">
    <input type="submit" name="submit">
    </form>
</body>
</html>

<?php 

$con = new PDO("mysql:host=localhost;dbname=bibliofateca",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM recados WHERE recado = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
        <br>

        <table>
        <tr>
            <th>Id</th>
            <th>Recado</th>
        </tr>
        <tr>
            <td><?php echo $row->id_recado; ?></td>
            <td><?php echo $row->recado; ?></td>
        </tr>
        </table>
<?php
    }    
    else{
        echo "Não encontrado";

    }
}
?>