@extends('panel.layouts.layout')

@section('header')
    @parent

    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>
    <script src="{{asset('panel/js/ckeditor.js?v=2.1')}}"></script>

    <script>
        var UploadURL = '{{route('uploadTest')}}';
        var storeUrl = '{{url('api/admin-panel/video')}}';
        var redirectUrl = '{{route('admin.videos')}}';
        var myPreventionFlag = false;
    </script>

    <style>
        
/*the css of upload box*/

 .uploadBody {
     position: fixed;
     top: 50%;
     left: 50%;
     width: 30em;
     height: 36em;
     margin-top: -18em;
     margin-left: -15em;
     background-color: white;
     border-radius: 7px;
     border-bottom: 15px solid #04c582;
 }
.uploadBorder {
    width: 100%;
    height: -webkit-fill-available;
    border-top: 40px solid #f9f9f9;
    border-bottom: 40px solid #f9f9f9;
    border-radius: 7px;
}
.uploadHeader {
    width: 60%;
    height: 70px;
    background-color: #ffc20e;
    margin: -40px auto 0;
    border-radius: 0 0 10px 10px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}
.uploadHeader_images {
    width: 50px;
    height: 40px;
    background-repeat: no-repeat;
    /*background-size: 100% 100%;*/
    background-size: contain;
}
.uploadHeader_img1 {
    background-image: url("{{ asset('assets/images/uploadPics/sound.png') }}");
}
.uploadHeader_img2 {
    background-image: url("{{ asset('assets/images/uploadPics/pic.png')}}");
}
.uploadHeader_img3 {
    background-image: url("{{ asset('assets/images/uploadPics/video.png')}}");
}
.uploadHeader_img4 {
    background-image: url("{{ asset('assets/images/uploadPics/file.png')}}");
}
.uploadBodyBox {
    text-align: center;
    padding: 50px 70px;
}
.uploadTitleText {
    line-height: 60px;
    background-image: linear-gradient(to bottom right, #ffc438, red) !important;
    border-radius: 25px 25px 0 0 !important;
    box-shadow: 0px 0px 20px 5px #ff8900;
    color: white;
    padding: 0px !important;
    min-height: 0px !important;
    font-size: 1.75em;
    font-weight: 500;
    text-align: center;
}
.uploadBox {
    border: 1px solid orange !important;
    box-shadow: 0px 0px 20px 5px #ff8900;
    border-radius: 0 0 25px 25px !important;
    padding: 0 !important;
}
.dropzone .dz-message {
    margin: 3em 0 !important;
}
.uploadّFileAllowed {
    margin: 30px 0;
}
.uploadfooter_image {
    width: 65px;
    height: 65px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: -50px auto 0px;
    background-color: #f9f9f9;
    border-radius: 50%;
    box-shadow: 0px 0px 10px 2px #fff;
}
.uploadfooter_img1 {
    background-image: url("{{ asset('assets/images/uploadPics/laptop.png')}}");
    width: 50px;
    height: 35px;
    background-repeat: no-repeat;
    background-size: contain;
}

.alertText {
    text-align: center;
    margin: 15px;
    font-size: 1.2em;
    font-weight: 600;
}
.acceptAlertText {
    color: darkgreen;
}
.refuseAlertText {
    color: darkred;
}

    </style>

    <script src="{{asset('dropzone/dropzone.js?v=1.2')}}"></script>
    <link rel="stylesheet" href="{{asset("dropzone/dropzone.css")}}">

@stop

@section('content')

    <div class="col-md-12">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment dashtwo-messages">

                <div id="mainContainer" class="page-content">
                    
                    <form id="form">
                        @include('panel.video.structure')

                        <div class="big-input">
                            <span id="submitBtn" style="text-align: center" type="submit" class="btn btn-warning">Next</span>
                        </div>
                    </form>
                    
                    <div id="errMsgBox"></div>

                    <div id="uploadBody" class="uploadBody hidden">
                        <div class="uploadBorder">

                            <div class="uploadHeader">
                                <div class="uploadHeader_images uploadHeader_img1"></div>
                                <div class="uploadHeader_images uploadHeader_img2"></div>
                                <div class="uploadHeader_images uploadHeader_img3"></div>
                                <div class="uploadHeader_images uploadHeader_img4"></div>
                            </div>
                            <div class="uploadBodyBox">
                                <div class="uploadTitleText">بارگذاری فایل محتوا</div>
                    
                                <form onsubmit="e => e.preventDefault()" action="{{route('video.addVideo')}}" class="dropzone uploadBox" id="my-awesome-dropzone">
                                </form>
                                <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div>
                            </div>
                            <div class="uploadfooter_image">
                                <div class="uploadfooter_img1"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        var token = localStorage.getItem("token");
        if (token == null) alert("no");

        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 300, // MB
            timeout: 180000,
            parallelUploads: 1,
            chunking: true,
            forceChunking: true,
            chunkSize: 5242880, // 5MB
            parallelChunkUploads: false,
            retryChunks: true,
            retryChunksLimit: 3,
            accept: function(file, done) {
                done();
            },
            init: function () {
                
                this.on("success", function (file) {
                    if(myPreventionFlag)
                        $("#dropZoneErr").removeClass('hidden');
                    else
                        window.location.href = redirectUrl;
                });
                
            }
        };

        function putInForm(formData, lang) {
            
            let tmp = $("#description_" + lang).html();

            if(tmp === '<p style="text-align:justify;">description(' + lang + ')</p>')
                return;

            formData.append("description_" + lang, tmp);
        }

        $(document).ready(function () {
            initCK();

            $("#submitBtn").on('click', function (e) {

                if(1 == 1) {

                    $("#form").addClass('hidden');
                    $("#uploadBody").removeClass('hidden');

                    return;

                }

                var form = $("#form");

                var formData = new FormData(form[0]);
                
                let video = formData.get('video_file');
                let img = formData.get('preview_file');

                // if(img['name'] === '') {
                //     alert('لطفا تصویر موردنظر را بارگذاری نمایید');
                //     return;
                // }

                if(video['name'] === '') {
                    alert('لطفا ویدیو موردنظر را بارگذاری نمایید');
                    return;
                }

                putInForm(formData, 'en');
                putInForm(formData, 'fa');
                putInForm(formData, 'ar');
                putInForm(formData, 'gr');
            
                formData.delete('video_file');

                $.ajax({
                    url: storeUrl,
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        if (data.status === "ok") {
                            $("#id").val(data.id);
                            $("#my-awesome-dropzone").submit();
                            // window.location.href = redirectUrl;
                            // return;
                        }

                        // alert(data.msg);
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        Authorization: "Bearer " + token,
                        Accept: "application/json",
                    },
                });
                
            });
        });
    

    </script>

@stop
