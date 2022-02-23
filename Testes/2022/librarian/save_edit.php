<?php 

    include_once "connection.php";
    if(isset($_POST['submit2']))
    {
        $id=$_POST['id'];
        $booksname=$_POST['books_name'];
        $img=$_POST['books_image'];  
        $bauthorname=$_POST['books_author_name'];  
        $pname=$_POST['books_publication_name'];  
        $edicao=$_POST['edicao'];  
        $bprice=$_POST['books_price'];  
        $bqty=$_POST['books_qty'];  
        $aqty=$_POST['available_qty'];  
        $librarian=$_POST['librarian_username']; 
        
        $sqlUpdate = "UPDATE adicionar_livros SET 
        id='$id',
        books_name='$booksname', 
        books_image='$img',  
        books_author_name='$bauthorname', 
        books_publication_name='$pname', 
        edicao='$edicao', 
        books_price='$bprice', 
        books_qty='$bqty', 
        available_qty='$aqty', 
        librarian_username='$librarian',
        WHERE id='$id'";    
        $result = $conexao->query($sqlUpdate);    
    }
    header('Location: editar_livro.php');
 
?>