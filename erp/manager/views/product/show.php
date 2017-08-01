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
                <a href="<?=Url::to(['edit','id'=>$m->id,'reqURL'=>(Url::to(['edit'])."#list_".$m->id)]) ?>">修改参数</a>
                <a href="<?=Url::to(['edit','id'=>$m->id,'reqURL'=>(Url::to(['edit'])."#list_".$m->id)]) ?>">修改基本信息</a>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $form = ActiveForm::begin([
                            'options' => [
                                'class' => 'form-horizontal',
                            ]
                        ]);
                        ?>
                        <div class="form-group"><label class="col-sm-2 control-label">SN</label><div class="col-sm-8"><label class="control-label" ><?=$model->sn?></label><p class="help-block help-block-error"></p></div></div><div class=\"hr-line-dashed\"></div>
                        <?=$form->field($model,'name',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">产品名称</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'image',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">产品的图片路径</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'material',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">原料</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->dropDownList($mater)?>
                        <?=$form->field($model,'price',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">价格</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'brand_id',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">品牌</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->dropDownList($brand)?>
                        <?=$form->field($model,'tag',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">标签</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->radioList(['<i></i>流通货', '<i></i>非流通'], ['class' => 'radio i-checks']);?>
                        <?=$form->field($model,'category_id',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">分类</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->dropDownList($category)?>
                        <?=Html::submitButton(' 下一步 ',["class"=>"btn btn-bg btn-primary"])?>
                        <a href="<?=\yii\helpers\Url::to(['index']) ?>" class="btn btn-bg btn-danger"> 取 消 </a>
                        <?php
                        ActiveForm::end();
                        ?>
                    </div>
                    <div class="col-sm-6 tab-pane active" id="home2" role="tabpanel" aria-expanded="true">
                        <script src="/js/jquery.form.js"></script>
                        <div class="row col-xs-12">
                            <div id="main"  class="row col-xs-12">
                                <div class="demo">
                                    <div class="btn2" style="background: #09c">
                                        <span>上传图片</span>
                                        <div id="fileuploada">
                                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                                            <input id="fileupload" type="file" name="UploadForm">
                                        </div>
                                    </div>
                                    <div id="filesStr"></div>
                                    <div id="showimg"></div>
                                </div>
                            </div>
                            <div class="imagelistFile text-center row col-xs-12" id="imagelistFile">
                                <img src='' height="400" width="400"/>
                            </div>
                        </div>
                    </div>
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
                            var urlPOST = "<?= \yii\helpers\Url::to(['/app/attachment/up'])?>";
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
            </div>
        </div>
    </div>
</div>