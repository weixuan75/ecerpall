<?php
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{:config('WEB_SITE_TITLE')}</title>
    <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>
<body class="gray-bg">



<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="product_form" name="product_form" method="post" action="/index.php?r=product/product/add">
            <div class="form-group">
                <label class="col-sm-3 control-label">产品名称：</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="产品名称！"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="button" onclick="submit_form()">添加产品</button>
                </div>
            </div>
        </form>
    </div>
</div>



    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
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
    <script>
        function submit_form(){
            $.ajax({
                //cache: true,
                type: "post",
                //sss: $("#product_form").serialize(),
                url: "index.php?r=product/product/add",

                data:{
                    "_csrf":"<?= Yii::$app->request->csrfToken ?>",
                    'product_name': $("#product_name").val()
                    /*
                    "sort":sort,
                    "name":name,
                    "path":rootPath,
                    "type":type,
                    "pay_time": payTime,
                    "state" : pState,
                    "content":content*/
                },
                async: false,
                error: function (request) {
                },
                success: function (data) {
                    var d = JSON.parse(data);
                    layer.msg(d.msg, {icon:1, time:1500, shade:0.1});
                    //var s = data;
                    //layer.msg(s.msg, {icon: 1, time: 1500, shade: 0.1});
//                    if (s.code == 1) {
//                        if (s.return_chart && s.return_chart == 1) {
//                            setTimeout(function () {
//                                window.location.href = "/admin/agent/mysaleslist_cs?shop_id=" + s.shop_id;
//                            }, 1000);
//                        }
//                        else {
//                            setTimeout(function () {
//                                window.location.href="/admin/agent/mysaleslist_cs?shop_id="+s.shop_id;
//                                window.location.href = "/admin/agent/myshoplist_cs?agent_id="+s.agent_id;
//                            }, 1000);
//                        }
//                    }

                }
            });
        }


    </script>
</body>
</html>