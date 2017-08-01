
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>后台管理系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <script src="/hplus1/js/jquery.min.js"></script>
    <link href="/hplus1/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/hplus1/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/hplus1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/hplus1/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="/hplus1/css/animate.min.css" rel="stylesheet">
    <link href="/hplus1/css/style.min.css?v=4.0.0" rel="stylesheet">
    <script src="/layui/layui.js"></script>

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight"><?= $content ?></div>
<script src="/hplus1/js/bootstrap.min.js"></script>
<script src="/hplus1/js/content.min.js?v=1.0.0"></script>
<script src="/hplus1/js/plugins/staps/jquery.steps.min.js"></script>
<script src="/hplus1/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/hplus1/js/plugins/validate/messages_zh.min.js"></script>
<script src="/hplus1/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script>
    $(document).ready(function(){$("#wizard").steps();$("#form").steps({bodyTag:"fieldset",onStepChanging:function(event,currentIndex,newIndex){if(currentIndex>newIndex){return true}if(newIndex===3&&Number($("#age").val())<18){return false}var form=$(this);if(currentIndex<newIndex){$(".body:eq("+newIndex+") label.error",form).remove();$(".body:eq("+newIndex+") .error",form).removeClass("error")}form.validate().settings.ignore=":disabled,:hidden";return form.valid()},onStepChanged:function(event,currentIndex,priorIndex){if(currentIndex===2&&Number($("#age").val())>=18){$(this).steps("next")}if(currentIndex===2&&priorIndex===3){$(this).steps("previous")}},onFinishing:function(event,currentIndex){var form=$(this);form.validate().settings.ignore=":disabled";return form.valid()},onFinished:function(event,currentIndex){var form=$(this);form.submit()}}).validate({errorPlacement:function(error,element){element.before(error)},rules:{confirm:{equalTo:"#password"}}})});
</script>
</body>

</html>