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
                    <?php
                    $form = ActiveForm::begin([
                        'options' => [
                            'class' => 'form-horizontal',
                        ]
                    ]);
                    ?>
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
                                        tableTem(ValProColor,ValProSize);
                                        temp(ValProColor,"#pro_color",proColorTemp);
                                        temp(ValProSize,"#pro_size",proSizeTemp);
                                    });
                                    var ValProColor = ["红色", "白色", "黑色"];
                                    var ValProSize = ["m", "l", "xl", "xxl", "3xl"];
                                    //获取颜色容器
                                    var proColor = $("#pro_color");
                                    //获取尺寸容器
                                    var proSize = $("#pro_size");
                                    //颜色模板
                                    function proColorTemp(value,id){
                                        var html = '<div class="col-sm-12">'+
                                            '    <div class="form-group">'+
                                            '        <label class="col-sm-6">'+
                                            '            <span class="form-control">'+value+'</span>'+
                                            '            <input id="pro_color_val" name="ProductColor['+id+'][\'name\']" class="form-control" type="hidden" value="'+value+'">'+
                                            '            <input id="pro_color_img_'+id+'" name="ProductColor['+id+'][\'imgSrc\']"  class="form-control" type="hidden" value="/hplus1/img/p1.jpg">'+
                                            '        </label>'+
                                            '        <div class=" col-sm-3">'+
                                            '            <div class=" col-sm-6">'+
                                            '                <a target="_blank" href="">'+
                                            '                    <div class="imagelistFile text-center row col-xs-12" id="imagelistFile_'+id+'">'+
                                            '                        <img alt="image" class="feed-photo" src="/hplus1/img/p1.jpg" style="max-height: 50px;max-width: 50px">'+
                                            '                    </div>'+
                                            '                </a>'+
                                            '            </div>'+
                                            '            <div class="col-sm-6">'+
                                            '                <div class="btn btn-primary btn-xs" style="color: #fff;text-align: center;cursor: pointer;">'+
                                            '                    <span>上传图片</span>'+
                                            '                    <form id="myupload_'+id+'" action="<?= Url::to(["/app/attachment/up"])?>" method="get" enctype="multipart/form-data">'+
                                            '                       <div id="fileuploada_'+id+'">'+
                                            '                            <input'+
                                            '                                style="position: absolute;top: 0;left: 0;margin: 0;border: solid transparent;opacity: 0;filter: alpha(opacity = 0);cursor: pointer;"'+
                                            '                                id="fileupload"'+
                                            '                                class="btn btn-primary btn-xs"'+
                                            '                                onchange="proFileUpdate(this,'+id+')"'+
                                            '                                type="file"'+
                                            '                                name="UploadForm">'+
                                            '                       </div>'+
                                            '                    </form>'+
                                            '                </div>'+
                                            '            </div>'+
                                            '        </div>'+
                                            '        <div class=" col-sm-3">'+
                                            '            <button type="button" onclick="proDel(this,ValProColor,\'ValProColor\')" class="btn btn-xs btn-danger">删除</button>'+
                                            '        </div>'+
                                            '    </div>'+
                                            '    <div class="hr-line-dashed"></div>'+
                                            '</div>';
                                        return html;
                                    }
                                    //尺寸模板
                                    function proSizeTemp(value){
                                        var html = '<div class="form-group col-sm-3">'+
                                            '    <div class="input-group">'+
                                            '        <span type="text" class="form-control">'+value+'</span>'+
                                            '        <input id="pro_size_val" type="hidden" class="form-control" value="'+value+'">'+
                                            '        <span class="input-group-btn">'+
                                            '            <button type="button" onclick="proDel(this,ValProSize,\'ValProSize\')" class="btn btn-danger" style="margin:0"><i class="fa fa-close"></i></button>'+
                                            '        </span>'+
                                            '    </div>'+
                                            '</div>';
                                        return html;
                                    }
                                    //颜色添加
                                    function proColorAdd(obj){
                                        var input = obj.parentNode.parentNode.getElementsByTagName("input")[0];
                                        if(valTrue($(input).val())){
                                            ValProColor.push($(input).val());
                                            tableTem(ValProColor,ValProSize);
                                            temp(ValProColor,"#pro_color",proColorTemp);
                                            return ValProColor;
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
                                            html+=fun(arr[i],i);
                                        }
                                        $(dom).html(html);
                                    }
                                    //删除
                                    function proDel(obj,ValArr,ValName){
//                                        console.log("------------------------------------------------------");
                                        var html = obj.parentNode.parentNode.parentNode;
//                                        console.log("proDel："+ValArr);
                                        var v = html.getElementsByTagName("input")[0];
                                        var varr = [$(v).val()];
                                        ValArr = arrReat(varr,ValArr);
//                                        console.log(varr);
//                                        console.log("proDel-2："+ValArr);
                                        html.parentNode.removeChild(html);
                                        var val = ValName;
//                                        console.log("proDel-val："+val);
                                        if(val=="ValProColor"){
                                            tableTem(ValArr,ValProSize);
                                            return ValProColor = ValArr;
                                        }else{
                                            tableTem(ValProColor,ValArr);
                                            return ValProSize = ValArr;
                                        }
                                    }
                                    //尺寸添加
                                    function proSizeAdd(obj){
                                        var input = obj.parentNode.parentNode.getElementsByTagName("input")[0];
                                        if(valTrue($(input).val())){
                                            ValProSize.push($(input).val());
                                            tableTem(ValProColor,ValProSize);
                                            temp(ValProSize,"#pro_size",proSizeTemp);
                                            return ValProSize;
                                        }else{
                                            layui.use('layer', function(){
                                                var layer = layui.layer;
                                                //在这里面输入任何合法的js语句
                                                layer.alert("请输入内容");
                                            });
                                        }
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
                                    //产品ID
//                                    var product_id = "";
                                    /**
                                     * 颜色模板
                                     */
                                    function tableTem(ColorArr,SizeArr){
//                                        console.log("tableTem-ValProColor："+ColorArr);
//                                        console.log("tableTem-SizeArr："+SizeArr);
                                        var html = '';
                                        for(var i=0;i<ColorArr.length;i++){
//                                            console.log(ColorArr[i]);
                                            html +=colorTableTr(ColorArr[i],SizeArr,i);
                                        }
                                        $("#pro_table_tbody").html(html);
                                    }
                                    function colorTableTr(color,SizeArr,colorId){
                                        var htmlVal = '';
                                        if(SizeArr == "" || SizeArr == undefined || SizeArr == null){
                                            SizeArr = ["均码"];
                                        }
//                                        console.log(htmlVal);
                                        for(var i=0; i<SizeArr.length;i++){
                                            if(i==0){
                                                htmlVal+='<tr color="'+i+'">'+
                                                    '    <td class="text-center" rowspan="'+SizeArr.length+'">' +
                                                    color+'</td>'+
                                                    '    <td class="text-center">'+SizeArr[i]+'</td>'+
                                                    '    <input type="hidden" name="ProductRelation['+colorId+']['+i+'][\'color\']" value="'+color+'">' +
                                                    '    <input type="hidden" name="ProductRelation['+colorId+']['+i+'][\'size\']" value="'+SizeArr[i]+'">' +
                                                    '    <td class="text-center"><input name="ProductRelation['+colorId+']['+i+'][\'price\']" type="text" class="form-control text-center" id="pro_price"></td>'+
                                                    '    <td class="text-center"><input name="ProductRelation['+colorId+']['+i+'][\'stock\']" type="text" class="form-control text-center" id="pro_stock"></td>'+
                                                    '    <td class="text-center"><input name="ProductRelation['+colorId+']['+i+'][\'barcode\']" type="text" class="form-control text-center" id="pro_barcode"></td>'+
                                                    '</tr>';
                                            }else{
                                                htmlVal+='<tr>'+
                                                    '    <td class="text-center">'+SizeArr[i]+'</td>'+
                                                    '    <input type="hidden" name="ProductRelation['+colorId+']['+i+'][\'color\']" value="'+color+'">' +
                                                    '    <input type="hidden" name="ProductRelation['+colorId+']['+i+'][\'size\']" value="'+SizeArr[i]+'">' +
                                                    '    <td class="text-center"><input name="ProductRelation['+colorId+']['+i+'][\'price\']" type="text" class="form-control text-center" id="pro_price"></td>'+
                                                    '    <td class="text-center"><input name="ProductRelation['+colorId+']['+i+'][\'stock\']" type="text" class="form-control text-center" id="pro_stock"></td>'+
                                                    '    <td class="text-center"><input name="ProductRelation['+colorId+']['+i+'][\'barcode\']" type="text" class="form-control text-center" id="pro_barcode"></td>'+
                                                    '</tr>';
                                            }
                                        }
//                                        console.log("colorTableTr:"+htmlVal);
                                        return htmlVal;
                                    }
                                    //判断Input中是否有值
                                    function valTrue(val){
                                        var v = $.trim(val);
                                        if(!v == "" || !v == undefined || !v == null){
                                            return true;
                                        }else{
                                            return false;
                                        }
                                    }
                                </script>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                    </div>
                    <div class="col-sm-6" id="table_pro">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>价格</th>
                                <th><input type="text" value="" class="form-control" id="pro_price"></th>
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
                                if(valTrue($(pro_price).val())||valTrue($(pro_stock).val())||valTrue($(pro_barcode).val())){
                                    $("#pro_table_tbody #pro_price").val($(pro_price).val());
                                    $("#pro_table_tbody #pro_stock").val($(pro_stock).val());
                                    $("#pro_table_tbody #pro_barcode").val($(pro_barcode).val());
                                }else{
                                    layui.use('layer', function(){
                                        var layer = layui.layer;
                                        //在这里面输入任何合法的js语句
                                        layer.alert("请输入内容");
                                    });
                                }
                            }
                        </script>
                        <table class="table table-bordered col-sm-12">
                            <style>
                                .table>tbody>tr>td {padding:0;}
                                .table>tbody>tr>td>.form-control {border-color:#fff;}
                            </style>
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
                    <div class="col-sm-12">
                        <?=Html::submitButton(' 确 定 ',["class"=>"btn btn-bg btn-primary"])?>
                        <a href="<?=Url::to(["/manager/product/index"])?>" class="btn btn-bg btn-danger"> 返回产品列表 </a>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/jquery.form.js"></script>
<script>
    $(function () {
    });
    function proFileUpdate(obj,id) {
        var input1 = "#pro_color_img_"+id;
        var ajaxId = '#myupload_'+id;
        var imagelistFile = '#imagelistFile_'+id;
        console.log(input1);
        $(ajaxId).ajaxSubmit({
            dataType: 'json',
            data:{
                "_csrf":"<?= Yii::$app->request->csrfToken ?>",
            },
            beforeSend: function() {
//                showimg.empty();
//                progress.show();
//                var percentVal = "0%";
//                bar.width(percentVal);
//                percent.html(percentVal);
//                btn.html("上传中...");
            },
            uploadProgress: function(event, position, total, percentComplete) {
//                var percentVal = percentComplete + '%';
//                percent.html(percentVal);
            },
            success: function(data) {
                if(!data.data ==""){
                    var img = data.data.url;
                    $(input1).val(img);
                    console.log($(input1).val());
                    $(imagelistFile).html("<img src='"+$(input1).val()+"' style=\"max-height: 50px;max-width: 50px\"/>");
                }
            },
            error:function(xhr){
            }
        });
    }
</script>