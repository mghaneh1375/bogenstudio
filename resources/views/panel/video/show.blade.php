@extends('panel.layouts.layout')

@section('header')
    @parent
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>
    <script src="{{ asset('panel/js/ckeditor.js?v=2.1') }}"></script>


    <script>
        var UploadURL = '{{ route('uploadTest') }}';
        var myPreventionFlag = false;
        var editUrl = '{{ route('video.update', ['video' => $videoId]) }}';
        var redirectUrl = '{{ route('admin.videos') }}';
        var videoIdForEdit = '{{ $videoId }}';
        var storeUrl = undefined;
    </script>


    <script src="{{ asset('dropzone/dropzone.js?v=1.2') }}"></script>
    <link rel="stylesheet" href="{{ asset('dropzone/dropzone.css') }}">

@stop


@section('content')

    <div class="col-md-12">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment dashtwo-messages">

                <div id="mainContainer" class="page-content">
                    <form id="editForm">
                        @include('panel.video.structure')

                        <video style="width: 600px" controls id="curr_file" class="hidden"></video>

                        <div class="big-input">

                            <p id="submitBtn" style="text-align: center" type="submit" class="btn btn-warning">Edit</p>

                        </div>
                        <p id="apiErr" style="color: red; font-size: 16px; font-weight: bold"></p>
                    </form>

                    
                    <button data-toggle='tooltip' title="بازگشت" id="backBtn" class="btn btn-danger hidden">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                    </button>

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

                                <form onsubmit="e => e.preventDefault()" action="{{ route('video.addVideo') }}"
                                    class="dropzone uploadBox" id="my-awesome-dropzone">
                                </form>
                                <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;"
                                    class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                <div class="uploadّFileAllowed">حداکثر فایل مجاز: 200 مگابایت</div>
                                
                                <a href="{{ route('admin.videos') }}">نیازی به ادیت ویدیو نیست</a>
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

    <script src="{{ asset('panel/js/fetchTableData.js?v=2.1') }}"></script>


    <script>
        function callBackFunc() {
            changeVideoType($("#video_type").val());
            initCK();
        }
        
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
            init: function() {

                this.on("success", function(file) {
                    if (myPreventionFlag)
                        $("#dropZoneErr").removeClass('hidden');
                    else
                        window.location.href = redirectUrl;
                });

            }
        };

        $(document).ready(function() {

            fetchFormData('{{ route('video.showAdmin', ['video' => $videoId]) }}', callBackFunc);

            $("#backBtn").on('click', function() {
                $("#editForm").removeClass('hidden');
                $("#backBtn").addClass('hidden');
                $("#uploadBody").addClass('hidden');
            });

            $("#submitBtn").on('click', function(e) {

                var form = $("#editForm");
                var formData = new FormData(form[0]);

                var type = $("#video_type").val();
                
                putInForm(formData, 'en');
                putInForm(formData, 'fa');
                putInForm(formData, 'ar');
                putInForm(formData, 'gr');

                formData.delete('video_type');
                
                if(type === 'link') {
                    formData.append("link", formData.get('video_link'));
                    formData.delete('video_link');
                }

                $.ajax({
                    url: editUrl,
                    type: "POST",
                    data: formData,
                    success: function(data) {

                        if (data.status === "ok") {
                            if (type == 'file') {
                                $("#editForm").addClass('hidden');
                                $("#uploadBody").removeClass('hidden');
                                $("#mainContainer").css('min-height', '60vh');
                                $("#backBtn").removeClass('hidden');
                                $("#errMsgBox").empty();
                                return;
                            }
                            else
                                window.location.href = redirectUrl;
                        }
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
