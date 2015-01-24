<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<meta charset="utf-8"/>
<title>Sevgi.li SignUp</title>
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
<body class="fixed-header   ">
<div class="register-container full-height sm-p-t-30">
<div class="container-sm-height full-height">
<div class="row row-sm-height">
<div class="col-sm-12 col-sm-height col-middle">
<h3><a href="<?php echo base_url() ?>">Sevgi.li</a> makes it easy to enjoy what matters the most in your life</h3>
<form id="form-register" class="p-t-15" role="form">
<div class="portlet-progress"><div class="progress-circle-indeterminate progress-circle-success"></div></div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default required">
<label>First Name</label>
<input type="text" name="fname" placeholder="John" class="form-control registerInput firstname" >
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default required">
<label>Last Name</label>
<input type="text" name="lname" placeholder="Smith" class="form-control registerInput lastname" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Sevgi.li User name</label>
<input type="text" name="uname" placeholder="sevgi.li/username (this can be changed later)" class="form-control registerInput username" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Password</label>
<input type="password" name="pass" placeholder="Minimum of 4 Charactors" class="form-control registerInput password" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Email</label>
<input type="email" name="email" placeholder="We will send loging details to you" class="form-control registerInput email" >
</div>
</div>
</div>
<div class="row m-t-10">
<div class="col-md-6">
<p>I agree to the <a href="#" class="text-info small">Pages Terms</a> and <a href="#" class="text-info small">Privacy</a>.</p>
</div>
</div>
<p class="m-t-10">
<button class="btn btn-complete btn-cons" onclick="Signup();return false;" type="submit">Create a new account</button>
<a href="<?php echo base_url() ?>" class="btn btn-success registrationSuccessfull" style="display:none"><i class="fa fa-check"></i> Registration Successfull. Click for login</a>
</p>
</form>
</div>
</div>
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