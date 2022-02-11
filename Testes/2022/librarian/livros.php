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
                        <h3>Livros cadastrados</h3>
                    </div>

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
                </div>
                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Informações de todos os livros</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               
                                <?php 

                                if(isset($_POST["submit1"])) {
                                    $res=mysqli_query($link, "SELECT * FROM add_books WHERE books_name LIKE('%$_POST[t1]%')");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "books image"; echo "</th>";
                                    echo "<th>"; echo "books name"; echo "</th>";
                                    echo "<th>"; echo "author name"; echo "</th>";
                                    echo "<th>"; echo "publication name"; echo "</th>";
                                    echo "<th>"; echo "purchase date"; echo "</th>";
                                    echo "<th>"; echo "books price"; echo "</th>";
                                    echo "<th>"; echo "books quantity"; echo "</th>";
                                    echo "<th>"; echo "available quantity"; echo "</th>";
                                    echo "<th>"; echo "Delete Books"; echo "</th>";
                                    echo "<th>"; echo "Edit Book"; echo "</th>";
                                    echo "</tr>";
                                    while($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                                        echo "<td>"; echo $row["books_name"]; echo "</td>";
                                        echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                        echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                        echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
                                        echo "<td>"; echo $row["books_price"]; echo "</td>";
                                        echo "<td>"; echo $row["books_qty"]; echo "</td>";
                                        echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                        echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php echo "</td>";
                                        echo "<td>"; ?> <a href="edit_book.php?id=<?php echo $row["id"]; ?>">Edit Book</a> <?php echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                else
                                { 

                                $res=mysqli_query($link, "SELECT * FROM add_books");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "books image"; echo "</th>";
                                echo "<th>"; echo "books name"; echo "</th>";
                                echo "<th>"; echo "author name"; echo "</th>";
                                echo "<th>"; echo "publication name"; echo "</th>";
                                echo "<th>"; echo "purchase date"; echo "</th>";
                                echo "<th>"; echo "books price"; echo "</th>";
                                echo "<th>"; echo "books quantity"; echo "</th>";
                                echo "<th>"; echo "available quantity"; echo "</th>";
                                echo "<th>"; echo "Delete Books"; echo "</th>";
                                echo "<th>"; echo "Edit Book"; echo "</th>";
                                echo "</tr>";
                                while($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
                                    echo "<td>"; echo $row["books_price"]; echo "</td>";
                                    echo "<td>"; echo $row["books_qty"]; echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                    echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php echo "</td>";
                                    echo "<td>"; ?> <a href="edit_book.php?id=<?php echo $row["id"]; ?>">Edit Book</a> <?php echo "</td>";
                                    echo "</tr>";
                                }
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

       