<?php
session_start();
if(!isset($_SESSION["email"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "connection.php";
?>

<a href="/imagens/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Adicionar livros</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Adicionar novos livros ao sistema</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Descrição da regra" name="regra" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="submit1" class="btn btn-default submit" value="Confirmar" style="background-color: green; color: white"></td>
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
    if(isset($_POST["submit1"]))
    {
        mysqli_query($link, "INSERT INTO regras_biblioteca VALUES('', '$_POST[regra]')");
    ?>
        <script type="text/javascript">
            alert("Regra adicionada com sucesso!");
            window.location="adicionar_regra.php";
        </script>
    <?php
    
    }
?>


<?php
include "footer.php";
?>

       