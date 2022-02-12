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
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Return Books</h3>
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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <?php
                                    $res = mysqli_query($link, "SELECT * FROM issue_books");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "student enrollment"; echo "</th>";
                                    echo "<th>"; echo "student name"; echo "</th>";
                                    echo "<th>"; echo "student sem"; echo "</th>";
                                    echo "<th>"; echo "student contact"; echo "</th>";
                                    echo "<th>"; echo "student email"; echo "</th>";
                                    echo "<th>"; echo "books name"; echo "</th>";
                                    echo "<th>"; echo "books issue date"; echo "</th>";
                                    echo "<th>"; echo "books return date"; echo "</th>";
                                    echo "<th>"; echo "student status"; echo "</th>";
                                    echo "<th>"; echo "return book"; echo "</th>";
                                    echo "<th>"; echo "perda/avaria"; echo "</th>";
                                    echo "</tr>";
                                    while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                        echo "<td>"; echo $row["student_name"]; echo "</td>";
                                        echo "<td>"; echo $row["student_sem"]; echo "</td>";
                                        echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                        echo "<td>"; echo $row["student_email"]; echo "</td>";
                                        echo "<td>"; echo $row["books_name"]; echo "</td>";
                                        echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
                                        echo "<td>"; echo $row["books_return_date"]; echo "</td>";
                                        echo "<td>"; 

                                        $enrollment=$row["student_enrollment"];
                                        $return_date=$row["books_issue_date"];
                                        $contact = $row["student_contact"];
                                        $email = $row["student_email"];
                                        $books_name = $row["books_name"];

                                        $res1 = mysqli_query($link, "SELECT * FROM student_registration WHERE enrollment=$enrollment");
                                        while ($row1 = mysqli_fetch_array($res1)) {
                                            $status=$row1["status"];
                                        }
                                        echo $status;
                                        
                                         echo "</td>";
                                        echo "<td>"; 
                                        //VERIFICAR SE DEVOLUÇÃO ESTÁ EM ATRASO
                                        $date=date ('d/m/Y');
                                        


                                        if ($date > $return_date) {

                                            $result2 = mysqli_query($link, "SELECT * FROM suspensions WHERE student_enrollment = $enrollment");
                                            if(mysqli_num_rows($result2) > 0) {
                                                echo "ATRASADO"; 
                                            }
                                            else {
                                            //suspende usuário na tabela student_registration
                                            mysqli_query($link, "UPDATE student_registration SET status='SUSPENSO' WHERE enrollment='$enrollment'");
                                            
                                            //envia usuário para tabela suspensions
                                            mysqli_query($link, "INSERT INTO suspensions VALUES('', '$enrollment', '$contact', '$email', '$books_name', '', 'atraso na devolução', '')");
                                            }
                                        }
                                        ?> <a href="return.php?id=<?php echo $row["id"]; ?>">Return Books</a> <?php echo "</td>";
                                        echo "<td>"; ?> <a href="perda_avaria.php?id=<?php echo $row["id"]; ?>">perda/avaria</a> <?php echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                
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

       