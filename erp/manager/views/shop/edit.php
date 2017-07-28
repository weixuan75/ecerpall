<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>实体店铺账户开通</h3>
                <input class="btn btn-bg btn-primary" type="button" onclick="javascript:location.reload();" value="刷新当前页面">
                <a href="<?=Url::to(['shop/index']) ?>" class="btn btn-bg btn-primary"> 返 回 列 表 </a>
            </div>
            <div class="ibox-content">
                <h2>
                    实体店铺开通步骤
                </h2>
                <p>
                    请认真核实填写！
                </p>

                <?php
                $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal',
//                        'enctype' => 'multipart/form-data'
                    ]
                ]);
                ?>

                <h2>基本信息</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <?=$form->field($model,'shop_num',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">店铺编号</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                        <?=$form->field($model,'name',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">店铺名称</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                        <?=$form->field($model,'compact_code',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">签署的合同编号</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                        <?=$form->field($model,'master_id',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">负责人ID</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput(['class'=>'form-control required1'])?>
                        <?=$form->field($model,'phone',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">联系电话</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                        <div class="col-sm-6"><?=$form->field($model,'start_time',[
                                'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">开始时间</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                            ])->label()->textInput()?></div>
                        <div class="col-sm-6"><?=$form->field($model,'end_time',[
                                'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">结束时间</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                            ])->label()->textInput()?></div>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($model,'service_user',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">客服专员</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>

                        <?=$form->field($model,'service_user2',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">招商经理</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>

                        <?=$form->field($model,'img',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">门头照片</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                        <?=$form->field($model,'imgs',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">店内照片</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                </div>

                <h2>地理位置</h2>

                <h2>财务</h2>

                <h2>账户信息</h2>

                <h2>个人认证</h2>

                <h2>条款</h2>
                <div class="row">
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                    <label for="acceptTerms">我同意注册条款</label>

                    <div class="card-footer">
                    </div>
                </div>
                <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>