<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>编辑</h3>
                <button class="btn btn-bg btn-success" type="button" onclick="javascript:location.reload();" title="刷新当前页面"><i class="fa fa-refresh"></i></button>
                <a href="<?=\yii\helpers\Url::to(['index']) ?>" class="btn btn-bg btn-primary"> 返 回 列 表 </a>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SN</label>
                                <div class="col-sm-8"><label class="control-label" >pro-1501383749a709</label>
                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">颜色</label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-12">
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                        <button type="button" onclick="proColorAdd(this)" class="btn btn-primary" style="margin:0">添加</button>
                                                    </span>
                                            </div>
                                        </div>
                                        <div id="pro_color" class="col-sm-12 wrapper wrapper-content animated fadeInRight">
                                            <?php
                                            //                                                <div class="form-group">
                                            //                                                    <label class="col-sm-6">
                                            //                                                        <input class="form-control" type="text" value="选项1">
                                            //                                                    </label>
                                            //                                                    <div class=" col-sm-3">
                                            //                                                        <div class=" col-sm-6">
                                            //                                                            <a target="_blank" href="http://24.media.tumblr.com/20a9c501846f50c1271210639987000f/tumblr_n4vje69pJm1st5lhmo1_1280.jpg">
                                            //                                                                <img alt="image" class="feed-photo" src="/hplus1/img/p1.jpg" style="max-height: 50px;max-width: 50px">
                                            //                                                            </a>
                                            //                                                        </div>
                                            //                                                        <div class=" col-sm-6">
                                            //                                                            <a href="#" class="btn btn-primary btn-xs">选择图片</a>
                                            //                                                        </div>
                                            //                                                    </div>
                                            //                                                    <div class=" col-sm-3">
                                            //                                                        <button type="button" class="btn btn-xs btn-danger">删除</button>
                                            //                                                    </div>
                                            //                                                </div>
                                            //                                                <div class="hr-line-dashed"></div>
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">尺寸</label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-12">
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" onclick="proSizeAdd(this)" class="btn btn-primary" style="margin:0">添加</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="pro_size" class="col-sm-12 wrapper wrapper-content animated fadeInRight">
                                            <?php
                                            //                                                <div class="form-group col-sm-3">
                                            //                                                    <div class="input-group">
                                            //                                                        <input type="text" class="form-control">
                                            //                                                        <span class="input-group-btn">
                                            //                                                            <button type="button" class="btn btn-danger" style="margin:0"><i class="fa fa-close"></i></button>
                                            //                                                        </span>
                                            //                                                    </div>
                                            //                                                </div>
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(function(){
                                        colorTableTem();
                                        temp(ValProColor,"#pro_color",proColorTemp);
                                        temp(ValProSize,"#pro_size",proSizeTemp);
                                    });
                                    /*var ValProColor = [];
                                    var ValProSize = [];*/
                                    var ValProColor = ["红色", "白色", "黑色"];
                                    var ValProSize = ["m", "l", "xl", "xxl", "3xl"];
                                    //获取颜色容器
                                    var proColor = $("#pro_color");
                                    //获取尺寸容器
                                    var proSize = $("#pro_size");
                                    //颜色模板
                                    function proColorTemp(value){
                                        var html = '<div class="col-sm-12"><div class="form-group">'+
                                            '    <label class="col-sm-6">'+
                                            '        <input id="pro_color_val" class="form-control" type="text" value="'+value+'">'+
                                            '        <input id="pro_color_img" class="form-control" type="hidden" value="/hplus1/img/p1.jpg">'+
                                            '    </label>'+
                                            '    <div class=" col-sm-3">'+
                                            '        <div class=" col-sm-6">'+
                                            '            <a target="_blank" href="">'+
                                            '                <img alt="image" class="feed-photo" src="/hplus1/img/p1.jpg" style="max-height: 50px;max-width: 50px">'+
                                            '            </a>'+
                                            '        </div>'+
                                            '        <div class=" col-sm-6">'+
                                            '            <a href="#" class="btn btn-primary btn-xs">选择图片</a>'+
                                            '        </div>'+
                                            '    </div>'+
                                            '    <div class=" col-sm-3">'+
                                            '        <button type="button" onclick="proColorDel(this)" class="btn btn-xs btn-danger">删除</button>'+
                                            '    </div>'+
                                            '</div>'+
                                            '<div class="hr-line-dashed"></div></div>';
                                        return html;
                                    }
                                    //尺寸模板
                                    function proSizeTemp(value){
                                        var html = '<div class="form-group col-sm-3">'+
                                            '    <div class="input-group">'+
                                            '        <input id="pro_size_val" type="text" class="form-control" value="'+value+'">'+
                                            '        <span class="input-group-btn">'+
                                            '            <button type="button" onclick="proSizeDel(this)" class="btn btn-danger" style="margin:0"><i class="fa fa-close"></i></button>'+
                                            '        </span>'+
                                            '    </div>'+
                                            '</div>';
                                        return html;
                                    }
                                    //颜色添加
                                    function proColorAdd(obj){
                                        var input = obj.parentNode.parentNode.getElementsByTagName("input")[0];
                                        var v = $(input).val();
                                        if(!v ==""){
                                            ValProColor.push(v);
                                            colorTableTem();
                                            var html='';
                                            for(var i=0;i<ValProColor.length;i++) {
                                                html+=proColorTemp(ValProColor[i]);
                                            }
                                            proColor.html(html);
                                        }else{
                                            layui.use('layer', function(){
                                                var layer = layui.layer;
                                                //在这里面输入任何合法的js语句
                                                layer.alert("请输入内容");
                                            });
                                        }
                                    }
                                    //整合方法
                                    function temp(arr,dom,fun){
                                        var html='';
                                        for(var i=0;i<arr.length;i++) {
                                            html+=fun(arr[i]);
                                        }
                                        $(dom).html(html);
                                    }
                                    //颜色删除
                                    function proColorDel(obj){
                                        var html = obj.parentNode.parentNode.parentNode;
                                        console.log(ValProColor);
                                        var v = html.getElementsByTagName("input")[0];
                                        var varr = [$(v).val()];
                                        ValProColor = arrReat(varr,ValProColor);
                                        colorTableTem();
                                        console.log(varr);
                                        console.log(ValProColor);
                                        html.parentNode.removeChild(html);
                                    }
                                    //尺寸添加
                                    function proSizeAdd(obj){
                                        var input = obj.parentNode.parentNode.getElementsByTagName("input")[0];
                                        var v = $.trim($(input).val());
                                        if(!v == "" || !v == undefined || !v == null){
                                            ValProSize.push(v);
                                            var html='';
                                            for(var i=0;i<ValProSize.length;i++) {
                                                html+=proSizeTemp(ValProSize[i]);
                                            }
                                            colorTableTem();
                                            /*console.log("添加成功");
                                            console.log(ValProSize);
                                            console.log(ValProSize.length);*/
                                            proSize.html(html);
                                        }else{
                                            layui.use('layer', function(){
                                                var layer = layui.layer;
                                                //在这里面输入任何合法的js语句
                                                layer.alert("请输入内容");
                                            });
                                        }
                                    }
                                    //尺寸删除
                                    function proSizeDel(obj){
                                        var html = obj.parentNode.parentNode.parentNode;
                                        console.log(ValProSize);
                                        var v = html.getElementsByTagName("input")[0];
                                        var varr = [$(v).val()];
                                        ValProSize = arrReat(varr,ValProSize);
                                        colorTableTem();
                                        console.log(varr);
                                        console.log(ValProSize);
                                        html.parentNode.removeChild(html);
                                    }
                                    /**
                                     * 删除重复的数组
                                     * @param {Object} arr	子级数组
                                     * @param {Object} arrAll 父级数组
                                     */
                                    function arrReat(arr,arrAll){
                                        var temp = []; //临时数组1
                                        var temparray = []; //临时数组2
                                        for(var i=0;i<arr.length;i++) {
                                            temp[arr[i]] = true; //巧妙地方：把数组B的值当成临时数组1的键并赋值为真
                                        }
                                        for(var i = 0; i < arrAll.length; i++) {
                                            if(!temp[arrAll[i]]) {
                                                temparray.push(arrAll[i]);
                                                //巧妙地方：同时把数组A的值当成临时数组1的键并判断是否为真，
                                                //如果不为真说明没重复，就合并到一个新数组里，
                                                //这样就可以得到一个全新并无重复的数组
                                            }
                                        }
                                        return temparray;
                                    }

                                    /**
                                     * 颜色模板
                                     */
                                    function colorTableTem(){
                                        console.log("开始");
                                        console.log(ValProColor);
                                        var html = '';
                                        for(var i=0;i<ValProColor.length;i++){
                                            console.log(ValProColor[i]);
                                            html +=colorTableTr(ValProColor[i],ValProSize);
                                        }
                                        $("#pro_table_tbody").html(html);
                                    }
                                    function colorTableTr(color,size){
                                        var htmlVal = '';
                                        if(size == "" || size == undefined || size == null){
                                            size = ["均码"];
                                        }
                                        console.log(htmlVal);
                                        for(var i=0; i<size.length;i++){
                                            if(i==0){
                                                htmlVal+='<tr>'+
                                                    '    <td class="text-center" rowspan="'+size.length+'">'+color+'</td>'+
                                                    '    <td class="text-center">'+size[i]+'</td>'+
                                                    '    <td class="text-center"><input type="text" class="form-control" id="pro_price"></td>'+
                                                    '    <td class="text-center"><input type="text" class="form-control" id="pro_stock"></td>'+
                                                    '    <td class="text-center"><input type="text" class="form-control" id="pro_barcode"></td>'+
                                                    '</tr>';
                                            }else{
                                                htmlVal+='<tr>'+
                                                    '    <td class="text-center">'+size[i]+'</td>'+
                                                    '    <td class="text-center"><input type="text" class="form-control" id="pro_price"></td>'+
                                                    '    <td class="text-center"><input type="text" class="form-control" id="pro_stock"></td>'+
                                                    '    <td class="text-center"><input type="text" class="form-control" id="pro_barcode"></td>'+
                                                    '</tr>';
                                            }
                                        }
                                        console.log("colorTableTr:"+htmlVal);
//                                        proTableTbody.append(htmlVal);
                                        return htmlVal;
                                    }
                                </script>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <button type="submit" class="btn btn-bg btn-primary"> 下一步 </button>
                            <a href="/index.php?r=manager%2Fproduct%2Findex" class="btn btn-bg btn-danger"> 取 消 </a>
                        </div>
<!--                        <div class="col-sm-6 tab-pane active" id="home2" role="tabpanel" aria-expanded="true">-->
<!--                            <script src="/js/jquery.form.js"></script>-->
<!--                            <div class="row col-xs-12">-->
<!--                                <div id="main"  class="row col-xs-12">-->
<!--                                    <div class="demo">-->
<!--                                        <div class="btn2" style="background: #09c">-->
<!--                                            <span>上传图片</span>-->
<!--                                            <div id="fileuploada">-->
<!--                                                <input type="hidden" name="_csrf" value="b-w4umezsXfbBiOXDK5mVX65o0hs5nUbhic3HvpNhnZrewve9L5Y1tbwftjEv4TKKy6nj7koqSKQINyNdz0Orw==">-->
<!--                                                <input id="fileupload" type="file" name="UploadForm">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div id="filesStr"></div>-->
<!--                                        <div id="showimg"></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="imagelistFile text-center row col-xs-12" id="imagelistFile">-->
<!--                                    <img src='' height="400" width="400"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <style>
                            .btn {margin: 3px;}
                            .imagelistAll>ul {list-style: none}
                            .imagelistAll>ul>li {list-style: none;	float: left}
                            .imagelistFile>img,.imagelistAll>ul>li>img{margin:5px;padding:5px;	border: 1px solid #9d9d9d}
                            .imagelistFile *,imagelistAll *{float: left}
                            .imagelistAll>ul>li>.shouImg{border: 5px solid #419641;}
                            .demo {width: 620px;margin: 30px auto;}
                            .demo p {line-height: 32px;}
                            .btn2 {position: relative;overflow: hidden;margin: auto;display: inline-block;*display: inline;padding: 20px;font-size: 20px;line-height: 68px;*line-height: 60px;color: #fff;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid #cccccc;border-color: #e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color: #b3b3b3;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;}
                            .btn2 input ,.ImageOne{width: 100%;padding: 30px;line-height: 68px;position: absolute;top: 0;left: 0;margin: 0;border: solid transparent;opacity: 0;filter: alpha(opacity = 0);cursor: pointer;}
                        </style>
                        <script>
                            $(function () {
                                $("#addTVD").hide();
                                var bar = $('.bar');
                                var percent = $('.percent');
                                var showimg = $('#showimg');
                                var progress = $(".progress");
                                var files = $("#files");
                                var btn = $(".btn span");
                                var urlPOST = "/index.php?r=app%2Fattachment%2Fup";
                                $("#fileuploada").wrap(
                                    "<form id=\"myupload\" " +
                                    "action=\"" + urlPOST +
                                    "\" method='post' enctype='multipart/form-data'></form>"
                                );
                                $("#fileupload").change(function() {
                                    $("#myupload").ajaxSubmit({
                                        dataType: 'json',
                                        beforeSend: function() {
                                            showimg.empty();
                                            progress.show();
                                            var percentVal = "0%";
                                            bar.width(percentVal);
                                            percent.html(percentVal);
                                            btn.html("上传中...");
                                        },
                                        uploadProgress: function(event, position, total, percentComplete) {
                                            var percentVal = percentComplete + '%';
                                            bar.width(percentVal);
                                            percent.html(percentVal);
                                        },
                                        success: function(data) {
                                            var img = data.data.url;
                                            var name = data.data.name;
                                            var type = data.data.type;
                                            var ext = data.data.ext;
                                            $("#product-image").val(img);
                                            $("#imagelistFile").html("<img src='"+$("#product-image").val()+"'style='max-height: 400px;max-width: 400px;'/>");
                                        },
                                        error:function(xhr){
                                            btn.html("重新添加");
                                            bar.width('0');
                                            files.html(xhr.responseText);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>

                    <div class="col-sm-6" id="table_pro">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>价格</th>
                                <th><input type="text" class="form-control" id="pro_price"></th>
                                <th>库存</th>
                                <th><input type="text" class="form-control" id="pro_stock"></th>
                                <th>条码</th>
                                <th><input type="text" class="form-control" id="pro_barcode"></th>
                                <th><button type="button" class="btn btn-primary" onclick="proValZ(this)">确定</button></th>
                            </tr>
                            </thead>
                        </table>
                        <script>
                            function proValZ(obj){
                                var pro_price = obj.parentNode.parentNode.getElementsByTagName("input")[0];
                                var pro_stock = obj.parentNode.parentNode.getElementsByTagName("input")[1];
                                var pro_barcode = obj.parentNode.parentNode.getElementsByTagName("input")[2];
                                $("#pro_table_tbody #pro_price").val($(pro_price).val());
                                $("#pro_table_tbody #pro_stock").val($(pro_stock).val());
                                $("#pro_table_tbody #pro_barcode").val($(pro_barcode).val());
                            }
                        </script>
                        <table class="table table-bordered col-sm-12">
                            <thead>
                            <tr>
                                <td width="20%" class="text-center">颜色</td>
                                <td width="15%" class="text-center">尺寸</td>
                                <td width="20%" class="text-center">价格</td>
                                <td width="20" class="text-center">库存</td>
                                <td width="25" class="text-center">条码</td>
                            </tr>
                            </thead>
                            <tbody id="pro_table_tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>