<?php
include_once '../include/topscripts.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../include/head.php';
        include '_head.php';
        ?>
        <style>
            .figure-point {
                border: solid .2rem blue;
                height: 5.2rem;
                width: 5.2rem;
                position: absolute;
                text-align: center;
            }
            
            #fp1 { top: 10rem; left: 10rem; }
            
            #fp2 { top: 10rem; left: 15rem; }
            
            #fp3 { top: 10rem; left: 20rem; }
            
            #fp4 { top: 15rem; left: 10rem; }
            
            #fp5 { top: 15rem; left: 15rem; }
            
            #fp6 { top: 15rem; left: 20rem; }
            
            #fp7 { top: 20rem; left: 10rem; }
            
            #fp8 { top: 20rem; left: 15rem; }
            
            #fp9 { top: 20rem; left: 20rem; }
        </style>
    </head>
    <body>
        <h1>Фигура</h1>
        <div>
            <div class="figure-point" id="fp1"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 1);"></div></div>
            <div class="figure-point" id="fp2"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 2);"></div></div>
            <div class="figure-point" id="fp3"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 3);"></div></div>
            <div class="figure-point" id="fp4"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 4);"></div></div>
            <div class="figure-point" id="fp5"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 5);"></div></div>
            <div class="figure-point" id="fp6"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 6);"></div></div>
            <div class="figure-point" id="fp7"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 7);"></div></div>
            <div class="figure-point" id="fp8"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 8);"></div></div>
            <div class="figure-point" id="fp9"><div class="figure-drag" style="width: 100%; height: 100%;" onmouseenter="EnterPoint(event, 9);"></div></div>
        </div>
        <form method="post" id="figure_login">
            <input type="text" name="figure" id="figure" />
        </form>
        <div id="fig2" />
    </body>
    <script>
        function EnterPoint(e, number) {
            if(e.which === 1) {
                let current = $('input#figure').val();
                $('input#figure').val(current + number);
            }
        }
    </script>
</html>