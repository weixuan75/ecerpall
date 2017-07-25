
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 表单向导</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/hplus1/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/hplus1/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/hplus1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/hplus1/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="/hplus1/css/animate.min.css" rel="stylesheet">
    <link href="/hplus1/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight"><?= $content ?></div>
<script src="/hplus1/js/jquery.min.js?v=2.1.4"></script>
<script src="/hplus1/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/hplus1/js/content.min.js?v=1.0.0"></script>
<script src="/hplus1/js/plugins/staps/jquery.steps.min.js"></script>
<script src="/hplus1/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/hplus1/js/plugins/validate/messages_zh.min.js"></script>
<script>
    $(document).ready(function(){$("#wizard").steps();$("#form").steps({bodyTag:"fieldset",onStepChanging:function(event,currentIndex,newIndex){if(currentIndex>newIndex){return true}if(newIndex===3&&Number($("#age").val())<18){return false}var form=$(this);if(currentIndex<newIndex){$(".body:eq("+newIndex+") label.error",form).remove();$(".body:eq("+newIndex+") .error",form).removeClass("error")}form.validate().settings.ignore=":disabled,:hidden";return form.valid()},onStepChanged:function(event,currentIndex,priorIndex){if(currentIndex===2&&Number($("#age").val())>=18){$(this).steps("next")}if(currentIndex===2&&priorIndex===3){$(this).steps("previous")}},onFinishing:function(event,currentIndex){var form=$(this);form.validate().settings.ignore=":disabled";return form.valid()},onFinished:function(event,currentIndex){var form=$(this);form.submit()}}).validate({errorPlacement:function(error,element){element.before(error)},rules:{confirm:{equalTo:"#password"}}})});
</script>
</body>

</html>