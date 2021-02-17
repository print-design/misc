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
                var editorbody = $('iframe').contents().find('body');
                var content = editorbody.html();
                content = content + ' Сделано в СССР';
                editorbody.html(content);
                editorbody.change();
                
                var ta = $('textarea#input');
                ta.text('Наушники');
                ta.change();
            });
        </script>
    </body>
</html>