<!DOCTYPE html>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/jquery-ui.css" rel="stylesheet"/>
        <style>
            body { padding: 20px; }
            
            input[type="text"] { margin: 100px 0 0 200px; }
            
            .ui-tooltip {
                background: #666;
                color: white;
                border: none;
                padding: 0;
                opacity: 1;
            }
            .ui-tooltip-content {
                position: relative;
                padding: 1em;
            }
            .ui-tooltip-content::after {
                content: '';
                position: absolute;
                border-style: solid;
                display: block;
                width: 0;
            }
            .right .ui-tooltip-content::after {
                top: 18px;
                left: -10px;
                border-color: transparent #666;
                border-width: 10px 10px 10px 0;
            }
            .left .ui-tooltip-content::after {
                top: 18px;
                right: -10px;
                border-color: transparent #666;
                border-width: 10px 0 10px 10px;
            }
            .top .ui-tooltip-content::after {
                bottom: -10px;
                left: 72px;
                border-color: #666 transparent;
                border-width: 10px 10px 0;    
            }
            .bottom .ui-tooltip-content::after {
                top: -10px;
                left: 72px;
                border-color: #666 transparent;
                border-width: 0 10px 10px;
            }
        </style>
    </head>
    <body>
        <a href="../">Назад</a>
        <h1>Tooltip</h1>
        <div id="options">
            <label for="top">Top</label><input type="radio" name="option" value="top" id="top" />    
            <label for="bottom">Bottom</label><input type="radio" name="option" value="bottom" id="bottom" />
            <label for="left">Left</label><input type="radio" value="left" name="option" id="left" />
            <label for="right">Right</label><input type="radio" value="right" name="option" id="right" checked />
        </div>
        <div>
            <input type="text" title="I am a tooltip!" />
        </div>
    </body>
    <script src='../js/jquery-3.5.1.min.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    <script src="../js/jquery-ui.js"></script>
    <script>
        $('input[type="radio"]').on('change', function() {
            var className = $(this).val();
            var position;
            switch (className) {
                case 'top':
                    position = { my: 'center bottom', at: 'center top-10' };
                    break;
                case 'bottom':
                    position = { my: 'center top', at: 'center bottom+10' };
                    break;
                case 'left':
                    position = { my: 'right center', at: 'left-10 center' };
                    break;
                case 'right':
                    position = { my: 'left center', at: 'right+10 center' };
                    break;
            }
            position.collision = 'none';
            
            $('input[type="text"]').tooltip('option', 'position', position);
            $('input[type="text"]').tooltip('option', 'tooltipClass', className);
        });
        
        $('#options').buttonset();
        $('input[type="text"]').tooltip();
        $('input[value="right"]').trigger('change');
    </script>
</html>