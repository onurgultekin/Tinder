
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8"/>
	<title>Sevgi.li</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link href="http://pages.revox.io/latest/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
	<link href="http://pages.revox.io/latest/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="http://pages.revox.io/latest/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="http://pages.revox.io/latest/pages/css/pages.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css">
            <link class="main-stylesheet" href="<?php echo base_url() ?>css/style.css" rel="stylesheet" type="text/css"/>
<!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body class="fixed-header">
    	<div class="login-wrapper ">
    		<div class="bg-pic">
    			<img src="http://i.kinja-img.com/gawker-media/image/upload/s--8JQH3rta--/fpajqze81onwr3yeygdz.jpg" data-src-retina="http://i.kinja-img.com/gawker-media/image/upload/s--8JQH3rta--/fpajqze81onwr3yeygdz.jpg" alt="" class="lazy">
    			<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
    				<h2 class="semi-bold text-white">
    					Sevgi.li make it easy to enjoy what matters the most in the life</h2>
    				</div>
    			</div>
    			<div class="login-container bg-white">
    				<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
    					<p class="p-t-35">Sign into your sevgi.li account</p>
    					<form id="form-login" class="p-t-15" role="form">
                                                                          <div class="portlet-progress"><div class="progress-circle-indeterminate progress-circle-success"></div></div>
    						<div class="form-group form-group-default">
    							<label>Login</label>
    							<div class="controls">
    								<input type="text" name="username" placeholder="Username" class="form-control registerInput username">
    							</div>
    						</div>
    						<div class="form-group form-group-default">
    							<label>Password</label>
    							<div class="controls">
    								<input type="password" class="form-control registerInput password" name="password" placeholder="Password">
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-md-6 no-padding">
    								<div class="checkbox check-success">
    									<input type="checkbox" value="1" id="checkbox1">
    									<label for="checkbox1">Keep me signed in</label>
    								</div>
    							</div>
    						</div>
    						<button class="btn btn-success btn-cons m-t-10" type="submit" onclick="Login();return false;">Sign in</button>
    						<a class="btn btn-complete btn-cons m-t-10" style="background-color:#3b5998; border:1px solid #3b5998;" href="index.php/login/facebookLogin"> <i class="fa fa-facebook"></i> Login with Facebook</a>
    					</form>
    					<div class="m-t-10">
    						<p>Don't have an account?</p>
    						<a class="btn btn-complete btn-cons" href="index.php/signup">Register for a new account</a>
    					</div>
    				</div>
    			</div>
    		</div>
    		<script src="http://pages.revox.io/latest/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    		<script src="http://pages.revox.io/latest/assets/plugins/jquery/jquery-1.8.3.min.js" type="text/javascript"></script>
    		<script src="http://pages.revox.io/latest/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    		<script type="text/javascript" src="http://pages.revox.io/latest/assets/plugins/switchery/js/switchery.min.js"></script>
                        <script type="text/javascript" src="<?php echo site_url("js/functions.js"); ?>"></script>
                        <script type="text/javascript">
                            removeErrors();
                        </script>
    	</body>
    	</html>