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

                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Books Name" name="booksname" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>books image<input type="file" name="f1" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Books Author Name" name="bauthorname" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Publication Name" name="pname" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Books Purchase Date" name="bpurchasedt" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Books Price" name="bprice" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Books Quantity" name="bqty" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Available Quantity" name="aqty" disabled=""></td>
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
        
        echo "$id";
        echo "$_POST[booksname]";

        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./books_image/".$tm.$fnm;
        $dst1="./books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        mysqli_query($link, "UPDATE add_books SET books_name='$_POST[booksname]', books_image='$dst1' WHERE id='$id'");
    ?>
    <!--
        <script type="text/javascript">
            alert("books insert sucessfully");
        </script>
    -->
    <?php
    
    }
?>


<?php
include "footer.php";
?>

       