<?php 

    include_once "connection.php";
    if(isset($_POST['submit2']))
    {
        $id=$_POST['id'];
        $booksname=$_POST['books_name'];
        $img=$_POST['books_image'];  
        $bauthorname=$_POST['books_author_name'];  
        $pname=$_POST['books_publication_name'];  
        $bpurchasedt=$_POST['books_purchase_date'];  
        $bprice=$_POST['books_price'];  
        $bqty=$_POST['books_qty'];  
        $aqty=$_POST['available_qty'];  
        $librarian=$_POST['librarian_username']; 
        
        $sqlUpdate = "UPDATE add_books SET 
        id='$id',
        books_name='$booksname', 
        books_image='$img',  
        books_author_name='$bauthorname', 
        books_publication_name='$pname', 
        books_purchase_date='$bpurchasedt', 
        books_price='$bprice', 
        books_qty='$bqty', 
        available_qty='$aqty', 
        librarian_username='$librarian',
        WHERE id='$id'";    
        $result = $conexao->query($sqlUpdate);    
    }
    header('Location: edit_book.php');
 
?>