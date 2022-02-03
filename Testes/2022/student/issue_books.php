<?php
session_start();
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "header.php";
include "connection.php"
?>

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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <form name="form1" action="" method="post">

                            <?php
                                $date=date("d-M-Y");
                                $res5=mysqli_query($link, "SELECT * FROM student_registration");
                                while($row5=mysqli_fetch_array($res5))
                                {
                                    $firstname=$row5["firstname"];
                                    $lastname=$row5["lastname"];
                                    $username=$row5["username"];
                                    $email=$row5["email"];
                                    $contact=$row5["contact"];
                                    $sem=$row5["sem"];
                                    $enrollment=$row5["enrollment"];
                                    $_SESSION["enrollment"]=$enrollment;
                                    $_SESSION["susername"]=$username;
                                }

                                $id=$_GET["id"];
                                $res6=mysqli_query($link, "SELECT books_name FROM add_books WHERE id=$id");
                                while ($row6 = mysqli_fetch_array($res6))
                                {           
                                    $booksname=$row6["books_name"];  
                                }
                                                                
                                ?>
                                <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="enrollmentno" name="enrollment" value="<?php echo $enrollment; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>
                                        <input type="text" class="form-control" placeholder="studentname" name="studentname" value="<?php echo $firstname.' '.$lastname; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>
                                        <input type="text" class="form-control" placeholder="studentsem" name="studentsem" value="<?php echo $sem; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>
                                        <input type="text" class="form-control" placeholder="studentcontact" name="studentcontact" value="<?php echo $contact; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>
                                        <input type="text" class="form-control" placeholder="studentemail" name="studentemail" value="<?php echo $email; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="booksname" name="booksname" value="<?php echo $booksname; ?>" disabled>
                                           
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                     <td>
                                        <input type="text" class="form-control" placeholder="booksissuedate" name="booksissuedate" value="<?php echo date("d-M-Y"); ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>
                                        <input type="text" class="form-control" placeholder="studentusername" name="studentusername" value="<?php echo $username; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Cancelar" 
                                        name="submit3" class="form-control btn btn-default" style="background-color: brown; color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="issue books" 
                                        name="submit2" class="form-control btn btn-default" style="background-color: blue; color: white">
                                    </td>
                                </tr>
                                </table>
                                
                                <?php
                            
                            ?>
                            </form>
                            <?php
                            
                            if(isset($_POST["submit3"]))
                            {
                                ?>
                            <script type="text/javascript">
                                window.location="search_books.php";
                            </script>
                            
                            <?php
                            }
                            if(isset($_POST["submit2"]))
                            {
                                $id=$_GET["id"];
                                $qty=0;
                                $res=mysqli_query($link, "SELECT * FROM add_books WHERE id=$id");
                                while($row=mysqli_fetch_array($res))
                                {
                                    $qty=$row["available_qty"];
                                }

                                if($qty==0)
                                {
                                    ?>
                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                        <strong>this book is not available in stock</strong> 
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    mysqli_query($link, "INSERT INTO issue_books VALUES('','$_SESSION[enrollment]','$firstname $lastname','$sem','$contact','$email','$booksname','$date','','$_SESSION[susername]')");
                                    mysqli_query($link, "UPDATE add_books SET available_qty=available_qty-1 WHERE id=$id"); //função diminuir quantidade disponível
                                    ?>
                                    <script type="text/javascript">
                                        alert("books issued sucessfully");
                                        window.location.href=window.location.href;
                                    </script>
                                    
                                    <?php
                                }

                                
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>

       