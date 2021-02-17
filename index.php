<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'include/head.php';
        ?>
        <link href="<?=APPLICATION ?>/cleditor/jquery.cleditor.css" rel="stylesheet" rel="stylesheet" />
        <style>
            textarea#input {
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php
        include 'include/header.php';
        ?>
        <div class="container-fluid">
            <h1 class="ponomar">Принт-дизайн</h1>
            <textarea id="input" name="input"><h1 class='oglavie'>Заголовок</h1><p class='ponomar'>Русский текст.</p></textarea>
            <br/><br/><br/>
            <button class="btn btn-info" id="accesscleditor">Нажми</button>
        </div>
        <?php
        include 'include/footer.php';
        ?>
        <script src='<?=APPLICATION ?>/cleditor/jquery.cleditor.js'></script>
        <script>
            $(document).ready(function () {
                $("#input").cleditor({
                    docCSSFile: 'css/main.css'
                })[0].focus();
            });
            
            $('#accesscleditor').click(function(){
                var frame = $('iframe');
                /*if(frame.is(':hidden')) {
                    alert('FRAME HIDDEN');
                }
                else {
                    alert('FRAME VISIBLE');
                }*/
                
                var area = $('textarea#input');
                /*if(area.is(':hidden')) {
                    alert('AREA HIDDEN');
                }
                else {
                    alert('AREA VISIBLE');
                }*/
                
                if(frame.is(':visible')) {
                    var editorbody = $('iframe').contents().find('body');
                    var content = editorbody.html();
                    content = content + ' Сделано в СССР';
                    editorbody.html(content);
                    editorbody.click();
                    editorbody.keypress();
                }
                
                if(area.is(':visible')) {
                    var ta = $('textarea#input');
                    content = ta.text();
                    content = content + ' Сделано в СССР';
                    ta.text(content);
                    ta.click();
                    ta.keypress();
                }
            });
        </script>
    </body>
</html>