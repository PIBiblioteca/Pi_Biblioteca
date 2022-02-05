<?php
session_start();
// código de segurança para impossibilitar o acesso à essa página sem fazer login
if(!isset($_SESSION["username"])) 
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
                                <h2>Editar informações da conta</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <?php
                            
                            $username=$_SESSION['username'];
                            $res=mysqli_query($link,"SELECT * FROM student_registration WHERE username='$username'");
                            while($row=mysqli_fetch_array($res))
                            {                                
                                $firstname=$row["firstname"];
                                $lastname=$row["lastname"];
                                $username=$row["username"];
                                $image=$row["profile_image"];
                                $password=$row["password"];
                                $email=$row["email"];
                                $contact=$row["contact"];                              
                            }
                            
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                
                                    <tr>
                                        <td>First Name<input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name<input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>"required=""></td>
                                    </tr>
                                    <tr>
                                        <td>User Name<input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $username; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>imagem atual <br><img src="<?php echo $image; ?>" height="100" width="100">
                                    <br>
                                    <br>
                                    escolher imagem nova<input type="file" name="f1" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Password<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password; ?>" required=""><button class="btn btn-default">mudar senha</button></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail<input type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo $email; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Contact<input type="text" class="form-control" placeholder="Contact" name="contact" value="<?php echo $contact; ?>" required=""></td>
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
   

    if(isset($_POST["submit1"]))
    {        
        
        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./profile_image/".$tm.$fnm;
        $dst1="./profile_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        if($fnm =='') //verifica se o campo de imagem está vazio
        {
            mysqli_query($link, "UPDATE student_registration SET firstname='$_POST[firstname]', lastname ='$_POST[lastname]', username ='$_POST[usernam]', password ='$_POST[password]', email ='$_POST[email]', contact ='$_POST[contact]' WHERE username='$username'");
        }
        else
        {
        mysqli_query($link, "UPDATE student_registration SET firstname='$_POST[firstname]', lastname ='$_POST[lastname]', username ='$_POST[username]', profile_image='$dst', password ='$_POST[password]', email ='$_POST[email]', contact ='$_POST[contact]' WHERE username='$username'");
        }
    ?>
    
        <script type="text/javascript">
            alert("books edit sucessfully");
            window.location="editar_perfil.php";
        </script>
    
    <?php
    
    }
?>


<?php
include "footer.php";
?>
