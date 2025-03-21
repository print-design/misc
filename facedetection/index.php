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
        <div class="container-fluid">
            <div id="faceReaderWrapper" class="modal fade show">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Лицо
                            <button type="button" class="close" data-dismiss="modal" id="close_video"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <div id="waiting2" style="position: absolute; top: 20px; left: 20px;">
                                <img src="<?=APPLICATION ?>/images/waiting2.gif" />
                            </div>
                            <video id="video" class="w-100"></video>
                        </div>
                    </div>
                </div>
            </div>
            <h1>Распознавание лиц</h1>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        const video = document.querySelector("#video");
        
        // Используем переднюю камеру
        let useFrontCamera = true;
        
        // Видеопоток
        let videoStream;
        
        // Параметры видео
        const constraints = {
            video: {},
        };
        
        // Остановка видеопотока
        function StopVideoStream() {
            if (videoStream) {
                videoStream.getTracks().forEach((track) => {
                    track.stop();
                });
            }
        }
  
        // Открываем форму чтения лица по нажатию кнопки с камерой
        function AddFindCameraListener() {
            $('button.find-btn').click(function() {
                $('#faceReaderWrapper').modal('show');
            });
        }
        
        // Чтение лица
        async function Scan() {
            StopVideoStream();
            constraints.video.facingMode = useFrontCamera ? "user" : "environment";
            videoWidth = video.width;
            
            try {
                videoStream = await navigator.mediaDevices.getUserMedia(constraints);
                video.srcObject = videoStream;
                video.play();
                $('#waiting2').addClass('d-none');
                
            } catch (err) {
                const div = document.createElement('div');
                div.innerText = 'Cannot get cammera: ' + err;
                document.body.appendChild(div);
                console.error(err);
            }
        }
        
        document.addEventListener('scan', Scan, false);
        
        // Закрытие окна чтения лица
        function Stop() {
            StopVideoStream();
            video.srcObject = null;
            $('#waiting2').removeClass('d-none');
        }
        
        document.addEventListener('stop', Stop, false);
        
        $(document).ready(function() {
            // Открываем форму чтения лица по нажатию кнопки с камерой
            AddFindCameraListener();
            
            // При показе формы посылаем сигнал "Сканируй"
            $('#faceReaderWrapper').on('shown.bs.modal', function () {
                document.dispatchEvent(new Event('scan'));
            });
            
            // При скрытии формы посылаем сигнал "Стоп"
            $('#faceReaderWrapper').on('hidden.bs.modal', function() {
                document.dispatchEvent(new Event('stop'));
            });
        });
    </script>
</html>