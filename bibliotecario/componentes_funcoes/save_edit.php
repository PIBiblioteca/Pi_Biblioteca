<?php 

    include_once "../bibliotecario/componentes_funcoes/connection.php";
    if(isset($_POST['submit2']))
    {
        $id=$_POST['id'];
        $booksname=$_POST['books_name'];
        $img=$_POST['imagens/books_image'];  
        $autor_livro=$_POST['autor_livro'];  
        $editora_livro=$_POST['editora_livro'];  
        $edicao=$_POST['edicao'];  
        $bprice=$_POST['books_price'];  
        $quantidade_livro=$_POST['quantidade_livro'];  
        $quantidade_disponivel=$_POST['quantidade_disponivel'];  
        $bibliotecario=$_POST['bibliotecario_username']; 
        
        $sqlUpdate = "UPDATE adicionar_livros SET 
        id='$id',
        books_name='$booksname', 
        imagens/books_image='$img',  
        autor_livro='$autor_livro', 
        editora_livro='$editora_livro', 
        edicao='$edicao', 
        books_price='$bprice', 
        quantidade_livro='$quantidade_livro', 
        quantidade_disponivel='$quantidade_disponivel', 
        bibliotecario_username='$bibliotecario',
        WHERE id='$id'";    
        $result = $conexao->query($sqlUpdate);    
    }
    header('Location: editar_livro.php');
 
?>