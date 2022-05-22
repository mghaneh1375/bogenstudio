<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title>ورود</title>

    <link rel="stylesheet" href="{{asset('assets/css/font.css?v=1.1')}}">
    <link type="text/css" rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('panel/css/loginCss.css?v=1.1')}}">
    <script src="{{asset('panel/js/jquery.min.js')}}"></script>

</head>

<body class="en_IN">
<div class="wrapper">

    <!--bg_banner_end-->
    <div class="wrap">
        <div class="layout_panel">
            <div class="layout" id="layout">
                <div id="main-content">

                    <div class="mainbox form-panel" id="login-main">

                        <div class="lgnheader">
                            <div class="header_tit t_c">
                                <img width="100px" src="{{asset('assets/images/logo.svg')}}">
                                <h4 class="header_tit_txt farsi" id="login-title">Enter your username and password</h4>
                                <div class="site_info"></div>
                            </div>
                        </div>

                        <div class="tabs-con tabs_con now" data-con="pwd">
                            <div>
                                <div class="login_area" id="login-main-form">
                                    <div class="loginbox c_b">

                                        <div class="lgn_inputbg c_b login-panel pwdLogin">

                                            <div class="single_imgarea" id="account-info">
                                                <div class="na-img-area" id="account-avator" style="display: none;"><div class="na-img-bg-area" id="account-avator-con"></div></div>
                                                <p class="us_name tac" id="account-displayname"></p>
                                                <p class="us_id tac"></p>
                                            </div>
                                            <label id="region-code" class="labelbox login_user c_b">
                                                <input class="item_account farsi" autocomplete="off" type="text" name="username" id="username" placeholder="username" />
                                            </label>

                                            <label class="labelbox pwd_panel c_b">
                                                <input class="item_account farsi" type="password" placeholder="Password" autocomplete="off" id="password" name="password" />
                                                <input class="item_account" type="text" placeholder="Password" autocomplete="off" id="visiablePwd" name="visiablepwd" style="display: none;" />
                                            </label>
                                        </div>

                                        <div class="err_tip">
                                            <div><em class="icon_error"></em><span class="error-con"></span></div>
                                        </div>

                                        <div class="btns_bg">
                                            <input class="btnadpt farsi" id="login-button" type="submit" value="Login" /> <span id="custom_display_8" class="sns-default-container sns_default_container" style="display: none;"> </span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loginPath = '{{route('doLogin')}}';
    var homePath = '{{route('admin.home')}}';
</script>
<script src="{{asset('panel/js/login.js')}}"></script>

</body>

</html>
