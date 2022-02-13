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
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Meus empréstimos</h3>
                    </div>

                    <!-- menu pesquisa -->
                    <form name="form1" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">

                                        <input type="text" name="t1" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-btn">
                                                <button type="submit" name="submit1" id="search books" class="btn btn-default">OK</button>
                                            </span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- / menu pesquisa -->
                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My Issued Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    <th>
                                        Student Enrollment No
                                    </th>
                                    <th>
                                        Books Name
                                    </th>
                                    <th>
                                        Books Issue Date 
                                    </th>
                                    <th>
                                        Books Return Date 
                                    </th>
                                    <th>
                                        Status Solicitação 
                                    </th>
                                    <?php
                                    //VERIFICA SE USUÁRIO ESTÁ NA LISTA SOLICITAÇÕES OU EMPRÉSTIMOS
                                    $enrollment=$_SESSION["enrollment"];
                                    $result3 = mysqli_query($link, "SELECT * FROM retiradas WHERE student_enrollment = $enrollment");
                                    if(mysqli_num_rows($result3) > 0) {
                                        while($row=mysqli_fetch_array($result3))
                                        {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $row["student_enrollment"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["books_name"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["status_solicitacao"];
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                } else {

                                    $res=mysqli_query($link, "SELECT * FROM issue_books WHERE student_username='$_SESSION[username]'");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row["student_enrollment"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_issue_date"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_return_date"];
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                    ?>
                                    
                                </table>
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

        