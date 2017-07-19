<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>代理商管理后台</title>
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <style type="text/css">
        .long-tr th{
            text-align: center
        }
        .long-td td{
            text-align: center
        }
    </style>
    <link type="text/css" rel="stylesheet" href="/admin/js/plugins/layer/laydate/need/laydate.css"/>
    <link type="text/css" rel="stylesheet" href="/admin/js/plugins/layer/laydate/skins/default/laydate.css" id="LayDateSkin"/>
    <link rel="stylesheet" href="/admin/js/layer/skin/default/layer.css?v=3.0.11110" id="layuicss-skinlayercss"/>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12"><?= $content ?></div>
    </div>
</div>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/admin/js/content.min.js?v=1.0.0"></script>
<script src="/admin/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/admin/js/plugins/layer/laydate/laydate.js"></script>
<script src="/admin/js/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="/admin/js/jquery.form.js"></script>
<script src="/admin/js/layer/layer.js"></script>
<script src="/admin/js/laypage/laypage.js"></script>
<script src="/admin/js/laytpl/laytpl.js"></script>
<script src="/admin/js/lunhui.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script src="/admin/js/jquery.leoweather.min.js"></script>
<script type="text/javascript">
    $('#weather').leoweather({format:'，{时段}好！</p><p><span id="colock">现在时间是：<strong>{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}</strong></span></p> <b>{城市}天气</b> {天气} {夜间气温}℃ ~ {白天气温}℃'});
</script>


</body></html>
