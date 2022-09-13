<html>
    <head>
        <title>Teste bootcamp</title>

        <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous">
</script>

        <style type="text/css">
            .linha {
                font-weight: bold;
                color: palevioletred;
                padding-left: 30px;
                line-height: 50px;
            }
        </style>
    </head>

    <body>
        <?php 
        for($contador = 0; $contador <=10; $contador++) {
            print("<span class=\"linha\"> Linha número: ". $contador . "</span><br />");
        }
        ?>
    </body>

    <script type="text/javascript">
        $(document).ready(function(){
            alert("Alerta");
        })

    </script>
</html>