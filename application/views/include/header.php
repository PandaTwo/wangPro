<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>宽带管理系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" type="text/css" href="/static/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/static/lib/font-awesome/css/font-awesome.css">
    <script src="/static/lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/static/lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script src="/static/My97DatePicker/WdatePicker.js" type="text/javascript"></script>
    <script src="/static/lib/validator.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $(".knob").knob();
        });
    </script>
    <script type="text/javascript" src="/static/lib/artDialog/dist/dialog.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/lib/artDialog/css/ui-dialog.css">
    <link rel="stylesheet" type="text/css" href="/static/stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="/static/stylesheets/premium.css">
    <link rel="stylesheet" type="text/css" href="/static/lib/pager.css">
</head>
<body class=" theme-blue">
<!-- Demo page code -->
<script type="text/javascript">
    $(function () {
        var match = document.cookie.match(new RegExp('color=([^;]+)'));
        if (match) var color = match[1];
        if (color) {
            $('body').removeClass(function (index, css) {
                return (css.match(/\btheme-\S+/g) || []).join(' ')
            })
            $('body').addClass('theme-' + color);
        }
        $('[data-popover="true"]').popover({html: true});
    });
</script>
<style type="text/css">
    #line-chart {
        height: 300px;
        width: 800px;
        margin: 0px auto;
        margin-top: 1em;
    }
    .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover {
        color: #fff;
    }
</style>
<script type="text/javascript">
    $(function () {
        var uls = $('.sidebar-nav > ul > *').clone();
        uls.addClass('visible-xs');
        $('#main-menu').append(uls.clone());
    });
</script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="favicon.ico">
<!--[if lt IE 7 ]>
<body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>
<body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]>
<body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]>
<body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->
<div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a href="/" style="width: 350px;height: 80px;"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> 宽带管理系统</span></a>
    </div>

    <?php if(isset($_SESSION['adminUserName'])):?>
    <div class="navbar-collapse collapse" style="height: 1px;">
        <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li>
                <a href="#" id="showmenu">显示/隐藏侧栏</a>
            </li>
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle">
                <?php echo date('Y年-m月-d日 H:i') ?>
                </a>
            </li>
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
                    <?php echo isset($_SESSION['adminUserName']) ? $_SESSION['adminUserName'] : ""; ?>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/login/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <?php endif; ?>
</div>
<script type="text/javascript" charset="utf-8">
var adminName = '<?php echo isset($_SESSION['adminUserName']) ? $_SESSION['adminUserName'] : ""; ?>';
</script>