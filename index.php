<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'include/head.php';
        ?>
        <link href="<?=APPLICATION ?>/cleditor/cleditor.css" rel="stylesheet" rel="stylesheet" />
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
            <h1>Принт-дизайн</h1>
            <textarea id="input" name="input">Go ahead, take it for a test drive. Highlight some text and click some buttons.</textarea>
        </div>
        <?php
        include 'include/footer.php';
        ?>
        <script src='<?=APPLICATION ?>/cleditor/jquery.cleditor.js'></script>
        <script>
            $(document).ready(function () {
                $("#input").cleditor()[0].focus();
            });
        </script>
    </body>
</html>
