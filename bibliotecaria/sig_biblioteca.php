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
include "../bibliotecaria/componentes_funcoes/header.php";
include "../bibliotecaria/componentes_funcoes/connection.php";
include "../bibliotecaria/componentes_funcoes/contadores.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Relatório SIG Biblioteca</h3>
                    </div>

                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Contagem de uso do espaço físico da biblioteca</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <label for="color">Turno:</label>
                            <select name="color" id="color">
                                <option value="noite">NOITE</option>
                                <option value="manha">MANHÃ</option>
                                <option value="tarde">TARDE</option>
                                
                            </select>
                            
                            <label for="color"> Mês:</label>
                            <select name="color" id="color">
                                <option value=""><?php echo date('m'); ?> </option>
                                <?php 
                                $mes = 1;
                                while ($mes<=12){
                                ?>
                                <option value=""><?php echo $mes; ?></option>
                                <?php $mes = $mes + 1; ?>
                                <?php
                                }
                                ?>
                            </select>
                            
                            <br><br>
                                <?php
                                
                                echo "<b> Quantidade de visitantes por dia / mês </b>";
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";                  
                                //$res=mysqli_query($link, "SELECT * FROM relatorio_sig_biblioteca");
                                //while($row = mysqli_fetch_array($res)) {
                                include "../bibliotecaria/componentes_funcoes/titulo_sig_biblioteca.php";
                                $titulo_linha = "Alunos";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Professores";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Servidores";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Comunidade externa";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                echo "</table>";
                                echo "</div>";
                                echo "<br>";

                                echo "<b> Quantidade de empréstimos por dia / mês </b>";
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";                  
                                include "../bibliotecaria/componentes_funcoes/titulo_sig_biblioteca.php";
                                $titulo_linha = "Livros";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Revista";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "CDs";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "DVDs";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Material Especial";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Outros";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                echo "</table>";
                                echo "</div>";
                                echo "<br>";
                                
                                echo "<b> Quantidade de serviços prestados por dia / mês </b>";
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";                  
                                include "../bibliotecaria/componentes_funcoes/titulo_sig_biblioteca.php";
                                $titulo_linha = "Empréstimo";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Orientações a usuário";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Consulta Internet";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Consulta catálogo online";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Usuários Cadastrados";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Outros";
                                include "../bibliotecaria/componentes_funcoes/linha_sig_biblioteca.php";
                                echo "</table>";
                                echo "</div>";
                                echo "<br>";
                                ?>
                                <button style="background-color: green; color: white" class="btn btn-default submit" onclick="submitForm()">
                                Confirmar
                                </button>

                                <?php
                                //CÓDIGO
                                //$res=mysqli_query($link, "SELECT * FROM relatorio_sig_biblioteca");
                                //while($row = mysqli_fetch_array($res)) {
                                // if (submit) {
                                //     if($result=0) {
                                //     insert into relatorio_sig_biblioteca
                                // }
                                // //MSGS
                                // Preenchimento do período noturno concluído! Deseja editar os períodos manhã e tarde? Botoões: Não, manhã, tarde
                                // //BD
                                // TURNO, MÊS, DIAS
                                // M,04, 1,2,3,4,5...
                                // T,04, 1,2,3,4,5...
                                // N,04, 1,2,3,4,5...
                                // }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "../bibliotecaria/componentes_funcoes/footer.php";
?>

