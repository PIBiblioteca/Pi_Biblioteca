<?php
session_start();
// código de segurança para impossibilitar o acesso à essa página sem fazer login
if(!isset($_SESSION["librarian"])) 
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
// fim do código de segurança para impossibilitar o acesso à essa página sem fazer login
include "connection.php";
include "header.php";
?>
<a href="/Testes/2022/librarian/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <?php
                            
                            
                            $id=$_GET['id'];
                            $res=mysqli_query($link,"SELECT * FROM add_books WHERE id='$id'");
                            while($row=mysqli_fetch_array($res))
                            {                                
                                $booksname=$row["books_name"];
                                $dst=$row["books_image"];
                                $bauthorname=$row["books_author_name"];
                                $pname=$row["books_publication_name"];
                                $bpurchasedt=$row["books_purchase_date"];
                                $bprice=$row["books_price"];
                                $bqty=$row["books_qty"];
                                $aqty=$row["available_qty"];
                                
                            }
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Books Name<input type="text" class="form-control" placeholder="Books Name" name="booksname" value="<?php echo $booksname; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>imagem atual <br><img src="<?php echo $dst; ?>" height="100" width="100">
                                    <br>
                                    <br>
                                    escolher imagem nova<input type="file" name="f1" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Books Author Name<input type="text" class="form-control" placeholder="Books Author Name" name="bauthorname" value="<?php echo $bauthorname; ?>"required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Publication Name<input type="text" class="form-control" placeholder="Publication Name" name="pname" value="<?php echo $pname; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Books Purchase Date<input type="text" class="form-control" placeholder="Books Purchase Date" name="bpurchasedt" value="<?php echo $bpurchasedt; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Books Price<input type="text" class="form-control" placeholder="Books Price" name="bprice" value="<?php echo $bprice; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Books Quantity<input type="text" class="form-control" placeholder="Books Quantity" name="bqty" value="<?php echo $bqty; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Available Quantity<input type="text" class="form-control" placeholder="Available Quantity" name="aqty" value="<?php echo $aqty; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="submit1" class="btn btn-default submit" value="insert books details" style="background-color: blue; color: white"></td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
    $id=$_GET['id'];
    
    

    if(isset($_POST["submit1"]))
    {        
        
        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./books_image/".$tm.$fnm;
        $dst1="./books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        if($fnm =='') //verifica se o campo de imagem está vazio
        {
            mysqli_query($link, "UPDATE add_books SET books_name='$_POST[booksname]', books_author_name ='$_POST[bauthorname]', books_publication_name ='$_POST[pname]', books_purchase_date ='$_POST[bpurchasedt]', books_price ='$_POST[bprice]', books_qty ='$_POST[bqty]', available_qty ='$_POST[aqty]' WHERE id='$id'");
        }
        else
        {
        mysqli_query($link, "UPDATE add_books SET books_name='$_POST[booksname]', books_image='$dst1', books_author_name ='$_POST[bauthorname]', books_publication_name ='$_POST[pname]', books_purchase_date ='$_POST[bpurchasedt]', books_price ='$_POST[bprice]', books_qty ='$_POST[bqty]', available_qty ='$_POST[aqty]' WHERE id='$id'");
        }
    ?>
    
        <script type="text/javascript">
            alert("books edit sucessfully");
            window.location="display_books.php";
        </script>
    
    <?php
    
    }
?>


<?php
include "footer.php";
?>

       