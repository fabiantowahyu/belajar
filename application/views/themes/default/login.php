<?php
//initilize the page
require_once("themes/inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("themes/inc/config.ui.php");

/* ---------------- PHP Custom Scripts ---------

  YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
  E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$no_main_header = true;
$page_html_prop = array("id" => "extr-page", "class" => "animated fadeInDown");
include("themes/inc/header.php");
?>

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
    <!--<span id="logo"></span>-->
    <div id="logo-group">
        <span id="logo"> <img src="<?php echo base_url(); ?>/file_upload/logo/logo_blue.png" alt="Carsurin"> </span>
        <!-- END AJAX-DROPDOWN -->
    </div>

    <!-- <span id="extr-page-header-space"> 
        <div id="create-account">
            <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="javascript:void(0);" class="btn btn-danger" id="view-create">Create account</a>
        </div>
        <div id="sign-in">
            <span class="hidden-mobile hiddex-xs">Already registered?</span> <a href="javascript:void(0);" class="btn btn-danger" id="view-sign">SIGN IN</a>
        </div>
    </span> -->
</header>
<br>
<div id="main" role="main">
    <?php
    if (!empty($plugin)) {
	$this->load->view($plugin);
    }
    ?>
    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm" id="left_view">
                <!-- <h1 class="txt-color-red login-header-big">Laporan Surveyor - Coal</h1> -->
                <div class="hero">

                   <!--  <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header"> It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
                        <div class="login-app-icons">
<a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
<a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
</div>
                    </div> -->

                    <img src="<?php echo ASSETS_URL; ?>/img/demo/lscoal.jpg" class="pull-right display-image" alt="" style="width:710px">

                </div>

                <div class="row">
                    <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<h5 class="about-heading">About SmartAdmin - Are you up to date?</h5>
<p>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
</p>
</div> -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">  
                        <br/> <br/>
                        <h5 class="about-heading">PT. CARSURIN</h5>
                        <p>
                            Neo Soho Capital 28th Floor <br/>
                            Jl. Letjen S. Parman Kav. 28, Grogol Petamburan - Jakarta Barat 11470, Indonesia<br/>
                            Phone : +62 21-50226868 <br/>
                            Fax     : +62 21-50171799
                        </p>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<h5 class="about-heading">Not just your average template!</h5>
<p>
Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
</p>
</div> -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4" id="right_view">
                <div class="well no-padding">
                    <div id="login-view">
                        <form name ="frmLogin" action="login/doLogin" method="post" id="login-form" class="smart-form client-form">
                            <header>
                                Sign In
                            </header>
                            <fieldset>
                                <section>
                                    <label class="label">E-mail</label>
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input type="email" name="email">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                                </section>

                                <section>
                                    <label class="label">Password</label>
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="password">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                                    <div class="note">
                                        <a href="javascript:void(0);" id="view1">Forgot password?</a>
                                    </div>
                                </section>

                                <section>
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" checked="">
                                        <i></i>Stay signed in</label>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    Sign in
                                </button>
                            </footer>
                        </form>
                    </div>

                    <div id="forgot-pass">
                        <form name="frmForgotPassword" action="login/forgot_password" method="post" id="forgot-password-form" class="smart-form client-form">
                            <header>
                                Forgot Password
                            </header>
                            <fieldset>
                                <section>
                                    <label class="label">Enter your email address</label>
                                    <label class="input"><i class="icon-append fa fa-envelope"></i>
                                        <input type="email" name="forgot_email">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Please enter email address for password reset</b></label>
                                    <div class="note">
                                        <a href="javascript:void(0);" id="view2">I remembered my password!</a>
                                    </div>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-refresh"></i> Reset Password
                                </button>
                            </footer>
                        </form>
                    </div>
                </div>

                <!-- <h5 class="text-center"> - Download Mobile Apps -</h5>

                <ul class="list-inline text-center">
                    <li>
                        <span id="logo"> <img src="<?php echo base_url(); ?>/file_upload/logo/android apps.png" alt="Carsurin"> </span>
                        <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
</li>
<li>
<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
</li> 
                </ul>  -->

            </div>
        </div>
    </div>
</div>

<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
//include required scripts for change template
include("themes/inc/scriptslogin.php");
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<?php
//include footer
//include("themes/inc/google-analytics.php"); 
?>


