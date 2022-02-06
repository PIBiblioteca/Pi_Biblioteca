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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              
                            <form name="form1" action="" method="post">
                                <table class="table">
                                    <tr>
                                        <td><input type="text" name="t1" placeholder="enter books name" required class="form-control"></td>
                                        <td><input type="submit" name="submit1" value="search books" class="form-control btn btn-default"></td>
                                    </tr>

                                </table>
                            </form>
                            <?php
                            if(isset($_POST["submit1"])) // código da pesquisa: pegar variável de entrada do usuário e exibir 
                            {
                                $i=0;
                                $res=mysqli_query($link, "SELECT * FROM add_books WHERE books_name like('%$_POST[t1]%')"); //função pesquisa: WHERE books_name like('%$_POST[t1]%')
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
                                    echo "<td>"; ?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">  <?php 
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."</b>";
                                    echo "<br>";
                                    echo "<b>". "available: ".$row["available_qty"]."</b>";
                                    
                                    $qtdzero=$row["available_qty"];
                                    if($qtdzero==0){
                                        echo "<br>";
                                        echo "LIVRO INDISPONÍVEL";
                                    }              
                                    else {
                                        echo "<br>";
                                    echo "<b>"; ?> <a href="issue_books.php?id=<?php echo $row["id"]; ?>">SOLICITAR EMPRÉSTIMO</a> <?php echo "</b>";
                                    }      
                                    
                                    echo "</td>";
                                    ?>
                                    
                                    <?php
                                    if($i==5)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }
                                    
                                }
                                echo "</tr>";
                                echo "</table>";

                            }
                            else // código de exibir livros
                            {
                                $i=0;
                                $res=mysqli_query($link, "SELECT * FROM add_books"); //função de exibir somente livros disponíveis: SELECT * FROM add_books WHERE available_qty>0
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row = mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
                                    echo "<td>"; ?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">  <?php 
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."</b>";
                                    echo "<br>";
                                    echo "<b>". "available: ".$row["available_qty"]."</b>";
                                    
                                    $qtdzero=$row["available_qty"];
                                    if($qtdzero==0){
                                        echo "<br>";
                                        echo "LIVRO INDISPONÍVEL";
                                    }              
                                    else {
                                        echo "<br>";
                                    echo "<b>"; ?> <a href="issue_books.php?id=<?php echo $row["id"]; ?>">SOLICITAR EMPRÉSTIMO</a> <?php echo "</b>";
                                    }      
                                    echo "</td>";
                                    
                                    if($i==5)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }

                                }
                                echo "</tr>";
                                echo "</table>";
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

       