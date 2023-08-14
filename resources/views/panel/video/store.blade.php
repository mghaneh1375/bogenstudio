@extends('panel.layouts.layout')

@section('header')
    @parent

    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>
    <script src="{{ asset('panel/js/ckeditor.js?v=2.1') }}"></script>

    <script>
        var UploadURL = '{{ route('uploadTest') }}';
        var storeUrl = '{{ url('api/admin-panel/video') }}';
        var redirectUrl = '{{ route('admin.videos') }}';
        var myPreventionFlag = false;
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

                    <form id="form">
                        @include('panel.video.structure')

                        <div class="big-input">

                            <p id="submitBtn" style="text-align: center" type="submit" class="btn btn-warning">Next</p>

                        </div>
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

        $(document).ready(function() {

            initCK();

            $("#backBtn").on('click', function() {
                $("#form").removeClass('hidden');
                $("#backBtn").addClass('hidden');
                $("#uploadBody").addClass('hidden');
            });

            $("#submitBtn").on('click', function(e) {

                var form = $("#form");
                var formData = new FormData(form[0]);
                let img = formData.get('preview_file');

                if (img['name'] === '') {
                    alert('لطفا تصویر موردنظر را بارگذاری نمایید');
                    return;
                }

                var type = $("#video_type").val();

                putInForm(formData, 'en');
                putInForm(formData, 'fa');
                putInForm(formData, 'ar');
                putInForm(formData, 'gr');

                formData.delete('video_type');

                if (type == 'file') {
                        
                    $.ajax({
                        url: '{{ route('video.isValid') }}',
                        type: "POST",
                        data: formData,
                        success: function(data) {

                            if (data.status === "ok") {
                                            
                                $("#form").addClass('hidden');
                                $("#mainContainer").css('min-height', '60vh');
                                $("#backBtn").removeClass('hidden');
                                $("#uploadBody").removeClass('hidden');
                                $("#errMsgBox").empty();
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

                    return;
                }


                formData.append("link", formData.get('video_link'));
                formData.delete('video_link');


                $.ajax({
                    url: storeUrl,
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.status === "ok") {
                            $("#id").val(data.id);
                            $("#my-awesome-dropzone").submit();
                            window.location.href = redirectUrl;
                            return;
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
