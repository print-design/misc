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
                background-color: green;
                border-radius: .5rem;
            }
            
            #figure-area {
                position: relative;
                height: 16rem;
                width: 16rem;
            }
            
            #fp1 { top: 0rem; left: 0rem; }
            
            #fp2 { top: 0rem; left: 5rem; }
            
            #fp3 { top: 0rem; left: 10rem; }
            
            #fp4 { top: 5rem; left: 0rem; }
            
            #fp5 { top: 5rem; left: 5rem; }
            
            #fp6 { top: 5rem; left: 10rem; }
            
            #fp7 { top: 10rem; left: 0rem; }
            
            #fp8 { top: 10rem; left: 5rem; }
            
            #fp9 { top: 10rem; left: 10rem; }
        </style>
    </head>
    <body>
        <div class="container-fluid">
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
        previous_point = 0;
        
        function AddPoint(sender) {
            let number = sender.attr('data-number');
            
            if(number != previous_point) {
            let figure_val = $('input#figure').val();
            $('input#figure').val(figure_val + sender.attr('data-number'));
            
            let figure_area_top = $('#figure-area').offset().top;
            let figure_area_left = $('#figure-area').offset().left;

            let current_width = $('#fp' + number).width();
            let current_height = $('#fp' + number).height();
            
            if(previous_point > 0) {
                previous_top = $('#fp' + previous_point).offset().top - figure_area_top + (current_width / 2) - (current_width / 4);
                current_top = $('#fp' + number).offset().top - figure_area_top + (current_width / 2) - (current_width / 4);
                previous_left = $('#fp' + previous_point).offset().left - figure_area_left + (current_height / 2) - (current_height / 4);
                current_left = $('#fp' + number).offset().left - figure_area_left + (current_height / 2) - (current_height / 4);
                
                line_top = previous_top < current_top ? previous_top : current_top;
                line_left = previous_left < current_left ? previous_left : current_left;
                line_width = Math.abs(previous_point - number) > 2 ? current_width / 4 : current_width;
                line_height = Math.abs(previous_point - number) > 2 ? current_height : current_height / 4;
                
                $('#figure-area').append($("<div class='figure-line' style='position: absolute; " + 
                        "top: " + line_top + "px;" + 
                        "left: " + line_left + "px;" + 
                        "width: " + line_width + "px;" + 
                        "height: " + line_height + "px;'>"));
            }
            
            previous_point = sender.attr('data-number');
        }
        }
        
        $(document).ready(function(){          
            $('.figure-drag').on('mousedown', function() {
                if(event.which === 1) {
                    AddPoint($(this));
                }
            });
            
            $('.figure-drag').on('mouseenter', function(event) {
                if(event.which === 1) {
                    AddPoint($(this));
                }
            });
            
            $('.figure-drag').on('mouseup', function() {
                if(event.which === 1) {
                    $('form#figure_login').submit();
                }
            });
            
            $(document).on('mouseup', function() {
                if(event.which === 1 && $('form#figure_login').length) {
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