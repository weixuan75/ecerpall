<?php
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
        <form class="form-horizontal m-t" id="product_form" name="product_form" method="post" onsubmit="return check_form()" action="/index.php?r=product/product/create">
            <div class="form-group">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">产品名称：</label>
                <div class="col-sm-8">
                    <input type="text" id="name" name="name" class="form-control" placeholder="产品名">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">请选择产品类型：</label>
                <div class="col-sm-8">
                    <select id="category_id" name="category_id" class="selectpicker show-tick form-control" data-live-search="false">
                        <?php
                            if(!empty($categorys))
                            {
                                foreach($categorys as $key=>$val)
                                {
                                    ?>
                                    <option value="<?=$val->id ?>"><?=$val->name ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">请选择产品品牌：</label>
                <div class="col-sm-8">
                    <select id="brand_id" name="brand_id" class="selectpicker show-tick form-control" data-live-search="false">
                        <?php
                            if(!empty($brands))
                            {
                                foreach($brands as $key=>$val)
                                {
                                    ?>
                                    <option value="<?=$val->id ?>"><?=$val->name ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- 颜色选择区域 -->
            <div class="form-group">
                <label class="col-sm-3 control-label">请选择颜色：</label>
                <div class="col-sm-8" id="fcheckbox_color">
                        <!--div class="checkbox i-checks">
                        <label><input type="checkbox" value="fasdf" name="product_color" onclick="checkboxOnClick(this)" checked> <i></i> </label>
                        </div> -->
                </div>
                <div class="col-sm-12">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-8">
                        <label><input type="text" class="form-control" id="new_color"></label>
                        <label><input type="button" class="btn btn-facebook" value="添加颜色" onclick="add_color()"></label>
                    </div>
                </div>
            </div>
            <!-- 尺寸选择区域 -->
            <div class="form-group">
                <label class="col-sm-3 control-label">请选择尺寸：</label>
                <div class="col-sm-8" id="fcheckbox_size">
                    <table class="table table-striped" id="table_color_size">
                        <tbody><td></td><td>颜色</td><td>尺码</td><td>目前库存</td><td>图片</td><td>操作</td></tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-8">
                        <label><input type="text" class="form-control" id="new_size"></label>
                        <label><input type="button" class="btn btn-facebook" value="添加尺寸" onclick="add_size()"></label>
                    </div>
                </div>
            </div>
            <!-- 产品材质 -->
            <div class="form-group">
                <label class="col-sm-3 control-label">请填写材质：</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="texture" id="texture" placeholder="产品材质">
                </div>
            </div>
            <!-- 条码输入区 -->
            <div class="form-group">
                <label class="col-sm-3 control-label">请输入条码：</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="条码">
                </div>
            </div>
            <!-- 标签-->
            <div class="form-group">
                <label class="col-sm-3 control-label">产品标签：</label>
                <div class="col-sm-8">
                    <div class="radio i-checks">
                        <label><input type="radio" checked="" value="1" name="tag_id"><i></i>流通货</label>
                    </div>
                    <div class="radio i-checks">
                        <label><input type="radio" value="2" name="tag_id"><i></i>尾货</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">产品价格：</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" placeholder="价格" onKeyUp="value=value.replace(/[^\d\.]/g,'')" oninput="input_filter_nie(event)" onpropertychange="input_filter_ie(event)">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <input class="btn btn-primary" type="button" onclick="start_upload_file()" value="添加产品"></input>
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
<script src="https://cdn.bootcss.com/jquery.serializeJSON/2.8.1/jquery.serializejson.min.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script>


</script>
<script>
    function check_form(){
        var form_data = $("#product_form").serializeJSON();
        console.log(form_data);
        return true;
    }
    function input_filter_nie(event){
        event.target.oldValue;
       // console.log(event.target.oldValue);
        return false;
    }
    function input_filter_ie(even){
        if(event.propertyName.toLowerCase() == "value")
        {
          //  console.log(event.srcElement.value);
        }
        return false;
    }
</script>
<script>
    var table_color_size = [];              //在js中保存这个表格
    $(document).ready(function(){
        //示范一个公告层
//        layer.open({
//            type: 1
//            ,title: false //不显示标题栏
//            ,closeBtn: false
//            ,area: '300px;'
//            ,shade: 0.8
//            ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
//            ,resize: false
//            ,btn: ['火速围观', '残忍拒绝']
//            ,btnAlign: 'c'
//            ,moveType: 1 //拖拽模式，0或者1
//            ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">内发生发达地方容<br>内容</div>'
//            ,success: function(layero){
//                var btn = layero.find('.layui-layer-btn');
//                btn.find('.layui-layer-btn0').attr({
//                    href: 'http://www.layui.com/'
//                    ,target: '_blank'
//                });
//            }
//        });

    });
    function add_size(){
        var size_val = $("#new_size").val();
        //判断用户添加的颜色值
        if($.trim(size_val).length <= 0)
        {
            layer.msg("尺寸值不能为空！", {icon:2, time:1000, shade:0.1});
            return ;
        }
        $flag = true;
        //尺寸值是否已经存在
        $("[name='product_size[]'][checked]").each(function(){
            if($(this).val() == size_val)
            {
                layer.msg("尺寸值已存在！", {icon:0, time:1000, shade:0.1});
                $flag = false;
            }
        });
        if(!$flag)
            return ;

        $("#table_color_size").find("tr").each(function(i){
            var tr = $(this).children();
            if(tr.eq(0).find("input").attr("checked"))
            {
                //修改尺码
                //判断尺码是否已经添加过了
                var text = "";
                for(var j = 0; j < table_color_size[i-1].size_val.length; j ++)
                {
                    //已经存在，直接返回
                    if(table_color_size[i-1].size_val[j] == size_val)
                    {
                        return ;
                    }
                    text = text + ""+table_color_size[i-1].size_val[j]+"<br />";
                }
                table_color_size[i-1].size_val.push(size_val);        //添加一个尺寸值
                text = text +""+size_val;
                //不存在，将该尺寸添加进表单数据中去
                tr.eq(2).html(text);
                console.log(table_color_size);
            }
        });

//        $("#table_color_size tr").find("input[type='checkbox']").each(function(i){
//            if($(this).attr("checked"))
//            {
//                console.log($("#table_color_size tr:eq("+i+")").find("td:eq(1)"));
//                $("#table_color_size tr:eq("+i+")").find("td:eq(1)").val("fadsf");
//            }
//        });
       // $("#fcheckbox_size").append("<div class=\"checkbox i-checks\"><label class=\"\"> <div class=\"icheckbox_square-green checked\" style=\"position: relative;\"> <input type=\"checkbox\" value=\""+size_val+"\" name=\"product_size[]\" onclick=\"checkboxOnClick(this)\" style=\"position: absolute; opacity: 0;\" checked><ins class=\"iCheck-helper\" style=\"position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;\"></ins> </div> <i></i> "+size_val+"</label> </div>");
    }
    function delete_color(obj){
        var delete_i = -1;
        $("#table_color_size tr").find("a").each(function(i){
            if(this == obj)
            {
                delete_i = i;
            }
        });
        $("#table_color_size tr:eq("+(delete_i+1)+")").remove();
        $("[name='product_color[]'").each(function(i) {
            if(i == delete_i)
                $(this).parent().parent().parent().remove();
        });
        for(var i = delete_i; i < table_color_size.length - 1; i ++)
        {
            table_color_size[i] = table_color_size[i+1];
        }
        table_color_size.pop();
        console.log(table_color_size);
    }
    function add_color(){
        var color_val = $("#new_color").val();
        //判断用户添加的颜色值
        if($.trim(color_val).length <= 0)
        {
            layer.msg("颜色值不能为空！", {icon:2, time:1000, shade:0.1});
            return ;
        }
        $flag = true;
        //判断颜色值是否已经存在
        $("[name='product_color[]'][checked]").each(function(){
            if($(this).val() == color_val)
            {
                layer.msg("该颜色值已存在！", {icon:0, time:1000, shade:0.1});
                $flag = false;
            }
        });
        if(!$flag)
            return ;
        $("#fcheckbox_color").append("<div class=\"checkbox i-checks\"><label class=\"\"> <div class=\"icheckbox_square-green checked\" style=\"position: relative;\"> <input type=\"checkbox\" value=\""+color_val+"\" name=\"product_color[]\" onclick=\"checkboxOnClick(this)\" style=\"position: absolute; opacity: 0;\" checked><ins class=\"iCheck-helper\" style=\"position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;\"></ins> </div> <i></i> "+color_val+"</label> </div>");
        var check_str = "<input type='checkbox' onclick='checkbox_change_state(this)' checked>";
        //var check_str = "<div class=\"checkbox i-checks\"><label><input type=\"checkbox\" value=\"fasdf\" name=\"product_color\" onclick=\"checkbox_change_state(this)\" checked><i></i></label></div>";
        //往表格中插入一行
        var size = $("#table_color_size tr").size();
        $("<tr><td>"+"</td><td>"+color_val+"</td><td></td><td>0</td><td></td>"+
            "<td><input type='file' id='product_imgs' class='product_imgs'></td>" +
            "<td><a href='javascript:void(0)' class='btn btn-primary' onclick='delete_color(this)'>删除</a></td>"+
            "</tr>").insertAfter($("#table_color_size tr:eq("+(size-1)+")"));
        $("#table_color_size tr:eq("+(size)+")").find("td:eq(0)").html(check_str);

        table_color_size.push({color_val:color_val, size_val:[], count:0});
    }
    function checkboxOnClick(obj){
        if(!$(obj).is(':checked'))
        {
            //查找用户点击的是第几个
            var p = $(obj).parent().parent().parent().parent().find("input").each(function(i){
                //查找到该对象
                if(this == obj)
                {
                    //var len = $("#table_color_size").find("tr").size() - 1;
                    //移除表格
                    $("#table_color_size").find("tr:eq("+(i+1)+")").remove();
                    //删除数据
                    for(var ii = i; ii < table_color_size.length - 1; ii ++)
                    {
                        table_color_size[ii] = table_color_size[ii+1];
                    }
                    table_color_size.pop();
//                    console.log(table_color_size);
                }
            });
            $(obj).parent().parent().parent().remove();
        }
    }

    function checkbox_change_state(obj){
        $(obj).attr("checked", !$(obj).attr("checked"));
    }
</script>


<script>
    var file_upload_index = 0;
    function start_upload_file(){
        file_upload_index = 0;
        upload_file();
    }
    function upload_file(){
        //文件上传完毕，退出上传
        if(file_upload_index >= $(".product_imgs").length)
        {

            submit_form();          //文件全部上传完毕，开始提交表单
            return ;
        }
        var fd = new FormData();
        fd.append("upload", 1);
        //添加产品
        fd.append("upfile", $(".product_imgs").get(file_upload_index).files[0]);
        fd.append("_csrf", "<?= Yii::$app->request->csrfToken ?>");
        $.ajax({
            url:'/index.php?r=product/file/upload',
            type:'POST',
            entype:'multipart/form-data',
            processData:false,
            contentType:false,
            data:fd,
            success:function(d){
                console.log("msg"+d);
                file_upload_index ++;
                upload_file();
            }
        });
    }
</script>
<script>
    function submit_form(){
        var form_data = $("#product_form").serializeJSON();
        form_data._csrf = "<?= Yii::$app->request->csrfToken ?>";
        form_data.color_size = table_color_size;
        console.log(form_data.color_size);
        $.ajax({
            type: "post",
            url: "index.php?r=product/product/create",
            data:form_data,
            async: false,
            error: function (request) {
            },
            success: function (data) {
                var d = JSON.parse(data);
                layer.msg(d.msg, {icon:1, time:1500, shade:0.1});
                //表单提价完毕，清理session缓冲
                return;
                $.ajax({
                   url:'/index.php?r=product/file/clearcache',
                    type:'POST',
                    data:{
                    "_csrf":"<?= Yii::$app->request->csrfToken ?>",
                        "ccc":"sss"
                    },
                    success:function(d){
                        console.log(d);
                    }
                });
            }
        });
    }
</script>
</body>
</html>