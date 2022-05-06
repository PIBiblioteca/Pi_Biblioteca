<?php
session_start();
if(!isset($_SESSION["bibliotecario"]))
{
    ?>
    <script type="text/javascript">
        window.location="../usuario/login.php";

    </script>
    <?php
}
include "../bibliotecario/componentes_funcoes/header.php";
include "../bibliotecario/componentes_funcoes/connection.php";
include "../bibliotecario/componentes_funcoes/contadores.php";
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
                <div class="row" style="min-height:750px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Contagem de uso do espaço físico da biblioteca</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                            <select name="color" id="color" style=" height: 32px; float: LEFT; padding-left: 20px; padding-right: 20px; color: white; background-color: #73879C; border: none; border-radius: 5px; box-shadow: inset 0 1px 0 rgb(0 0 0 / 8%); margin: 0; margin: 5px; margin-top: 11px;">
                                <option value="nada">SELECIONAR TURNO</option>
                                <option value="noite">Noite</option>
                                <option value="manha">Manhã</option>
                                <option value="tarde">Tarde</option>
                                
                            </select>
                            
                            
                            <select name="color" id="color" style="height: 32px; float: LEFT; padding-left: 20px; padding-right: 20px; color: white; background-color: #73879C; border: none; border-radius: 5px; box-shadow: inset 0 1px 0 rgb(0 0 0 / 8%); margin: 0; margin: 5px; margin-top: 11px;">
                                <!-- <option value=""><?php echo date('m'); ?> </option> -->
                                <option value=""><?php echo "SELECIONAR MÊS" ?> </option>
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
                                echo "<br>";
                                echo "<b> Quantidade de visitantes por dia / mês </b>";
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";                  
                                //$res=mysqli_query($link, "SELECT * FROM relatorio_sig_biblioteca");
                                //while($row = mysqli_fetch_array($res)) {
                                include "../bibliotecario/componentes_funcoes/titulo_sig_biblioteca.php";
                                $titulo_linha = "Alunos";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Professores";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Servidores";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Comunidade externa";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                echo "</table>";
                                echo "</div>";
                                echo "<br>";

                                echo "<b> Quantidade de empréstimos por dia / mês </b>";
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";                  
                                include "../bibliotecario/componentes_funcoes/titulo_sig_biblioteca.php";
                                $titulo_linha = "Livros";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Revista";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "CDs";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "DVDs";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Material Especial";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Outros";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                echo "</table>";
                                echo "</div>";
                                echo "<br>";
                                
                                echo "<b> Quantidade de serviços prestados por dia / mês </b>";
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";                  
                                include "../bibliotecario/componentes_funcoes/titulo_sig_biblioteca.php";
                                $titulo_linha = "Empréstimo";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Orientações a usuário";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Consulta Internet";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Consulta catálogo online";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Usuários Cadastrados";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                $titulo_linha = "Outros";
                                include "../bibliotecario/componentes_funcoes/linha_sig_biblioteca.php";
                                echo "</table>";
                                echo "</div>";
                                echo "<br>";
                                ?>
                                <button style="padding: 5px 10px; color: white; background-color: green; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin: 5px" onclick="submitForm()">
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
include "../bibliotecario/componentes_funcoes/footer.php";
?>

