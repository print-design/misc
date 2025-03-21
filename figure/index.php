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
                border: solid 2px blue;
                height: 5rem;
                width: 5rem;
                position: absolute;
                text-align: center;
                padding-top: .8rem;
            }
            
            .fp1 { top: 10rem; left: 10rem; }
            
            .fp2 { top: 10rem; left: 15rem; }
            
            .fp3 { top: 10rem; left: 20rem; }
            
            .fp4 { top: 15rem; left: 10rem; }
            
            .fp5 { top: 15rem; left: 15rem; }
            
            .fp6 { top: 15rem; left: 20rem; }
            
            .fp7 { top: 20rem; left: 10rem; }
            
            .fp8 { top: 20rem; left: 15rem; }
            
            .fp9 { top: 20rem; left: 20rem; }
        </style>
    </head>
    <body>
        <h1>Фигура</h1>
        <div>
            <div class="figure-point fp1">1</div>
            <div class="figure-point fp2">2</div>
            <div class="figure-point fp3">3</div>
            <div class="figure-point fp4">4</div>
            <div class="figure-point fp5">5</div>
            <div class="figure-point fp6">6</div>
            <div class="figure-point fp7">7</div>
            <div class="figure-point fp8">8</div>
            <div class="figure-point fp9">9</div>
        </div>
    </body>
</html>