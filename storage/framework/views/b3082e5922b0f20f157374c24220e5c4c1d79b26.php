<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Nitty Gritty - Login</title>
    <link href="<?php echo e(asset('public/plugins/bootstrapv3/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrapv3/css/bootstrap-theme.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo e(asset('public/plugins/animate.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/jquery-scrollbar/jquery.scrollbar.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/css/webarch.css')); ?>" rel="stylesheet" type="text/css" />

<style>
	.error-body {
    	background-color: #ffffff!important;
	}
	.loginFormPanel{
		background-color: #fff;
    	box-shadow: 2px 4px 66px 0px rgba(0, 0, 0, 0.24);
		padding:30px;
		border-top: 2px solid #2f944b;
		border-bottom: 2px solid #2f944b;
		border-radius: 5px;

	}
	.loginFormPanel h4{
		position:relative;
		padding-bottom: 10px;
		/* border-bottom: 1px solid #cccccc8c; */
		font-weight: 600;
		margin-bottom: 30px;
		text-align:center;
		letter-spacing: .8px;
	}
	.loginFormPanel h4::after{
		width:80px;
		height:2px;
		content:"";
		background:#000;
		position:absolute;
		bottom:0px;
		margin-left:-40px;
		left:50%;
		
	}

	.logo {
		margin: 0px auto 30px auto;
		/* padding: 15px; */
		text-align: center;
	}
	.loginFormPanel input[type='text'], .loginFormPanel input[type='password']{
		border-left: 2px solid #2f9247;
	}
	.loginFormPanel .btn-primary{
		background-color: #2f9247;
	}
	.loginFormPanel .btn-primary:hover{
		background-color: rgba(47, 146, 71, 0.6901960784313725);
	}
	.checkbox.check-success input[type=checkbox]:checked+label:before {
		background-color: #2f9247;
		border: 1px solid #2f9247;
	}
	.control-group .checkbox{
		margin-bottom: 35px;
		border-bottom: 1px solid #cccccc8c;
		padding-bottom: 10px;
	}

	.form-group .form-label {
		color: #000000;
		display: inline-block;
		margin-right: 8px;
	}

	/*.error-body{
		background: #b3ffab; 
		background: -webkit-linear-gradient(to top left, #2f944b, #12fff7); 
		background: linear-gradient(to right, #2f944b, #12fff7);
	}*/
	.error-body{
		background:url(http://localhost/MyProject/public/img/dubai_new.png);
		background-size:cover;
	}
</style>
    <!-- Styles -->
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
</head>
<body class="error-body no-top">
    
        <?php echo $__env->yieldContent('content'); ?>
   

    <!-- Scripts -->
    <script src="<?php echo e(asset('public/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('public/plugins/jquery/jquery-1.11.3.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/bootstrapv3/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
</body>
</html>
