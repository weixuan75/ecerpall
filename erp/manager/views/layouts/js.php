<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基本表单</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <script src="/hplus1/js/jquery.min.js"></script>
    <link href="/hplus1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hplus1/css/font-awesome.min.css" rel="stylesheet">
    <link href="/hplus1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/hplus1/css/animate.min.css" rel="stylesheet">
    <link href="/hplus1/css/style.min.css?v=4.0.0" rel="stylesheet">


</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight"><?= $content ?></div>
<script src="/hplus1/js/bootstrap.min.js"></script>
<script src="/hplus1/js/content.min.js"></script>
<script src="/hplus1/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>

</html>