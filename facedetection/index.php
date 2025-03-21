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
        <script src="<?=APPLICATION ?>/js/jquery.facedetection.min.js"></script>
        <style>
            .face {
                position: absolute;
                border: 4px solid white;
            }
        </style>
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
            <div class="row">
                <div class="col-4"><img id="dima1" src="dima1.png" alt="dima1" class="img-fluid" /><div id="dima1_coords">QWE</div></div>
                <div class="col-4"><img id="dima2" src="dima2.jpg" alt="dima2" class="img-fluid" /><div id="dima2_coords">QWE</div></div>
                <div class="col-4"><img id="dima3" src="dima3.jpeg" alt="dima3" class="img-fluid" /><div id="dima3_coords">QWE</div></div>
                <div class="col-12"><img id="thomas" src="thomasanders.jpg" alt="thomas" /><div id="thomas_coords"></div>QWE</div>
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
            
            $('#dima1').faceDetection({
                complete: function(faces) {
                    for (var i = 0; i < faces.length; i++) {
                        $('<div>', {
                            'class': 'face',
                            'css': {
                                'position': 'absolute',
                                'left':     faces[i].x * faces[i].scaleX + 'px',
                                'top':      faces[i].y * faces[i].scaleY + 'px',
                                'width':    faces[i].width  * faces[i].scaleX + 'px',
                                'height':   faces[i].height * faces[i].scaleY + 'px'
                            }
                        })
                        .insertAfter(this);
                    }
                    
                    faceData1 = '';
                    jQuery.each(faces, function(name, face) {
                        jQuery.each(face, function(name, value) {
                            faceData1 += name + ': ' + value + '<br />';
                        });
                    });
                    $('#dima1_coords').html(faceData1);
                },
                error: function (code, message) {
                    alert('Error: ' + message);
                }
            });
            
            //var coords = $('#dima1').faceDetection();
            
            /*$('#dima2').faceDetection({
                complete: function(faces) {
                    for (var i = 0; i < faces.length; i++) {
                        $('<div>', {
                            'class': 'face',
                            'css': {
                                'position': 'absolute',
                                'left':     faces[i].x * faces[i].scaleX + 'px',
                                'top':      faces[i].y * faces[i].scaleY + 'px',
                                'width':    faces[i].width  * faces[i].scaleX + 'px',
                                'height':   faces[i].height * faces[i].scaleY + 'px'
                            }
                        })
                        .insertAfter(this);
                    }
                    
                    faceData2 = '';
                    jQuery.each(faces, function(name, face) {
                        jQuery.each(face, function(name, value) {
                            faceData2 += name + ': ' + value + '<br />';
                        });
                    });
                    $('#dima2_coords').html(faceData2);
                },
                error: function (code, message) {
                    alert('Error: ' + message);
                }
            });*/
        
            $('#dima3').faceDetection({
                complete: function(faces) {
                    for (var i = 0; i < faces.length; i++) {
                        $('<div>', {
                            'class': 'face',
                            'css': {
                                'position': 'absolute',
                                'left':     faces[i].x * faces[i].scaleX + 'px',
                                'top':      faces[i].y * faces[i].scaleY + 'px',
                                'width':    faces[i].width  * faces[i].scaleX + 'px',
                                'height':   faces[i].height * faces[i].scaleY + 'px'
                            }
                        })
                        .insertAfter(this);
                    }
                    
                    faceData3 = '';
                    jQuery.each(faces, function(name, face) {
                        jQuery.each(face, function(name, value) {
                            faceData3 += name + ': ' + value + '<br />';
                        });
                    });
                    $('#dima3_coords').html(faceData3);
                },
                error: function (code, message) {
                    alert('Error: ' + message);
                }
            });
            
            /*$('#thomas').faceDetection({
                complete: function(faces) {
                    for (var i = 0; i < faces.length; i++) {
                        $('<div>', {
                            'class': 'face',
                            'css': {
                                'position': 'absolute',
                                'left':     faces[i].x * faces[i].scaleX + 'px',
                                'top':      faces[i].y * faces[i].scaleY + 'px',
                                'width':    faces[i].width  * faces[i].scaleX + 'px',
                                'height':   faces[i].height * faces[i].scaleY + 'px'
                            }
                        })
                        .insertAfter(this);
                    }
                    
                    faceData4 = '';
                    jQuery.each(faces, function(name, face) {
                        jQuery.each(face, function(name, value) {
                            faceData4 += name + ': ' + value + '<br />';
                        });
                    });
                    $('#thomas_coords').html(faceData4);
                },
                error: function (code, message) {
                    alert('Error: ' + message);
                }
            });*/
        });
    </script>
</html>