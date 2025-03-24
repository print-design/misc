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
            
            .figure-line {
                background-color: blue;
                border-radius: .5rem;
            }
            
            #fp1 { top: 10rem; left: 0rem; }
            
            #fp2 { top: 10rem; left: 5rem; }
            
            #fp3 { top: 10rem; left: 10rem; }
            
            #fp4 { top: 15rem; left: 0rem; }
            
            #fp5 { top: 15rem; left: 5rem; }
            
            #fp6 { top: 15rem; left: 10rem; }
            
            #fp7 { top: 20rem; left: 0rem; }
            
            #fp8 { top: 20rem; left: 5rem; }
            
            #fp9 { top: 20rem; left: 10rem; }
        </style>
    </head>
    <body>
        <div class="container-fluid" style="position: relative">
            <h1>Фигура</h1>
            <div id="figure-area">
                <div class="figure-point" id="fp1"><div class="figure-drag" data-number="1" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp2"><div class="figure-drag" data-number="2" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp3"><div class="figure-drag" data-number="3" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp4"><div class="figure-drag" data-number="4" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp5"><div class="figure-drag" data-number="5" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp6"><div class="figure-drag" data-number="6" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp7"><div class="figure-drag" data-number="7" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp8"><div class="figure-drag" data-number="8" style="width: 100%; height: 100%;"></div></div>
                <div class="figure-point" id="fp9"><div class="figure-drag" data-number="9" style="width: 100%; height: 100%;"></div></div>
            </div>
            <form method="post" id="figure_login">
                <input type="text" name="figure" id="figure" />
            </form>
        </div>
    </body>
    <script>
        function AddPoint(sender) {
            let current = $('input#figure').val();
            $('input#figure').val(current + sender.attr('data-number'));
            
            $('#figure-area').append($("<div class='figure-line' style='position: relative; width: 8rem; height: .7rem;'>"));
        }
        
        function DrawLine() {
            //
        }
        
        $(document).ready(function(){          
            $('.figure-drag').on('mousedown', function() {
                AddPoint($(this));
            });
            
            $('.figure-drag').on('mouseenter', function(event) {
                if(event.which === 1) {
                    AddPoint($(this));
                }
            });
            
            $('.figure-drag').on('mouseup', function() {
                $('form#figure_login').submit();
            });
            
            $(document).on('mouseup', function() {
                if($('form#figure_login').length) {
                    $('form#figure_login').submit();
                }
            });
            
            current_point = 0;
            
            $('.figure-drag').on('touchmove', function(event) {
                target = document.elementFromPoint(event.originalEvent.changedTouches[0].clientX, event.originalEvent.changedTouches[0].clientY);
                if($(target).attr('data-number') !== current_point && $(target).attr('data-number') !== undefined) {
                    AddPoint($(target));
                    current_point = $(target).attr('data-number');
                }
            });
            
            $('.figure-drag').on('touchend', function() {
                $('form#figure_login').submit();
            });
        });
    </script>
</html>