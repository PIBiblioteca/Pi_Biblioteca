<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "..\bibliotecaria\componentes_funcoes\header.php";
include "..\bibliotecaria\componentes_funcoes\connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Recados</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Enviar recado para usuário</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <select class="form-control" name="dusername">
                                                <?php
                                                $res=mysqli_query($link, "SELECT * FROM cadastro_usuarios");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    ?><option value="<?php echo $row["fullname"]?>">
                                                    <?php echo $row["fullname"]." RA (". $row["enrollment"].")"; ?>
                                                    </option><?php
                                                }
                                                $data_msg=date("Y-m-d");
                                                ?>
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="title" placeholder="Título"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        Mensagem <br>
                                        <textarea name="msg" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </td>   
                                    </tr>
                                    <tr>
                                        <td>
                                            <input button style="background: green; color: white" class="btn btn-default submit" type="submit" name="submit1" value="Enviar">
                                        </td>
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
        mysqli_query($link, "INSERT INTO recados VALUES('','$_SESSION[email]','$_POST[dusername]','$data_msg','$_POST[title]','$_POST[msg]','n')") or die(mysqli_error($link));
        
        ?>
        <script type="text/javascript">
            alert("Mensagem enviada");
        </script>
        <?php
    }

?>
<?php
include "../bibliotecaria/componentes_funcoes/footer.php";
?>

       