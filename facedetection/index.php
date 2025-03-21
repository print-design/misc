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
    </head>
    <body>
        <h1>Face detection</h1>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="source_id" name="source_id" class="form-control" required="required" autocomplete="off" />
                            <div class='input-group-append'>
                                <button type='button' class='btn find-btn'><i class='fas fa-camera'></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-none d-lg-block">
                        <div class="form-group">
                            <button type="submit" id="next-submit" name="next-submit" class="btn btn-dark form-control mt-4 next-submit">Далее</button>
                        </div>
                        <div class="form-group">
                            <a href="create.php" class="btn btn-outline-dark form-control create-submit">Добавить в базу</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            alert('ZXC');
        }
    </script>
</html>