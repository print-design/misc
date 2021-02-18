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
            <textarea id="input" name="input"><h1>Заголовок</h1><p style="font-size: 28px;">Русский текстъ.</p></textarea>
            <br/><br/><br/>
            <button class="btn btn-info" id="btnhtml">HTML</button>
            <button class="btn btn-info" id="btntext">Text</button>
            <button class="btn btn-info" id="setp">Set P</button>
            <button class="btn btn-info" id="getsel">Get Sel</button>
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
            
            $('#setp').click(function(){
                var editorbody = $('iframe').contents().find('body');
                var ta = $('textarea#input');
                
                if(editorbody.is(':visible')) {
                    $('iframe').contents().find("p").addClass('ponomar');
                    ta.text(editorbody.html());
                }
            });
            
            var textelement = null;
            
            $(document).ready(function(){
                var editorbody = $('iframe').contents().find('body');
                
                editorbody.click(function(e){
                    textelement = e.target;
                });
                
                editorbody.keyup(function(e){
                    textelement = e.target;
                });
            });
            
            $('#getsel').click(function(){
                if(textelement != null) {
                    if(textelement.nodeName == 'BODY'){
                        textelement = textelement.appendChild(document.createElement('p'));
                    }
                    
                    $(textelement).prop('class', 'ponomar');
                    textelement.textContent += " новый";
                    $('textarea#input').text($('iframe').contents().find('body').html());
                }
            });
            
            
            /*            
            function getWord(){
                 // Method to get text in non-iframe
        // var word = window.getSelection?window.getSelection():document.selection.createRange().text;
 
                 // Method to get selected text in iframe
        var word =document.getElementById("test_iframe").contentWindow.getSelection();
        alert( word )
    }
    
    // document.body.addEventListener("click", getWord, false);
    let x,y;
    //document.getElementById("test_iframe").contentWindow.onmousedown=function (event) {
    document.document.getElementsByTagName('iframe').contentWindow.onmousedown=function (event) {
        x = event.pageX;
        y = event.pagey;
    }
    //document.getElementById("test_iframe").contentWindow.onmouseup=function (event) {
    document.getElementsByTagName('iframe').contentWindow.onmouseup=function (event) {
        let new_x = event.pageX;
        let new_y = event.pagey;
        if(x==new_x&&y==new_y){
                         // Perform click event operation
        }else {
                         // Selected operation
            getWord()
        }
    }*/
        </script>
    </body>
</html>