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
            <button class="btn btn-info" id="btnhtml">HTML</button>
            <button class="btn btn-info" id="btntext">Text</button>
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
            
            $('#btnhtml').click(function(){
                var editorbody = $('iframe').contents().find('body');
                var content = editorbody.html();
                content = content + ' Сделано в СССР';
                editorbody.html(content);
                var ta = $('textarea#input');
                ta.text(editorbody.html());
            });
            
            $('#btntext').click(function(){
                var ta = $('textarea#input');
                var content = ta.text();
                content = content + '<p class="ponomar">Русский языкъ</p>';
                ta.text(content);
                var editorbody = $('iframe').contents().find('body');
                editorbody.html(ta.text());
            });
        </script>
    </body>
</html>