<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>实体店铺账户开通</h5>
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
                        "id"=>"form",
                        'class' => 'wizard-big',
//                        'enctype' => 'multipart/form-data'
                    ]
                ]);
                ?>

                <h1>基本信息</h1>
                <style>
                    .wizard-big.wizard > .content {
                        min-height: 700px;
                    }
                </style>
                <fieldset>
                    <h2>基本信息</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <?=$form->field($model,'shop_num')->label()->textInput(['class'=>'form-control required'])?>
                            <?=$form->field($model,'name')->label()->textInput(['class'=>'form-control required'])?>
                            <?=$form->field($model,'compact_code')->label()->textInput(['class'=>'form-control required'])?>
                            <?=$form->field($model,'master_id')->label()->textInput(['class'=>'form-control required'])?>
                            <?=$form->field($model,'phone')->label()->textInput(['class'=>'form-control required'])?>
                            <div class="col-sm-6"><?=$form->field($model,'start_time')->label()->textInput(['class'=>'form-control required'])?></div>
                            <div class="col-sm-6"><?=$form->field($model,'end_time')->label()->textInput(['class'=>'form-control required'])?></div>
                        </div>
                        <div class="col-sm-6">
                            <?=$form->field($model,'service_user')->label()->textInput(['class'=>'form-control required'])?>
                            <?=$form->field($model,'service_user2')->label()->textInput(['class'=>'form-control required'])?>
                            <?=$form->field($model,'img')->label()->textInput()?>
                            <?=$form->field($model,'imgs')->label()->textInput()?>
                        </div>
                    </div>
                </fieldset>
                <h1>位置</h1>
                <fieldset>
                    <h2>地理位置</h2>
                    <?=$form->field($address,'sheng')->label()->textInput()?>
                    <?=$form->field($address,'shi')->label()->textInput()?>
                    <?=$form->field($address,'qu')->label()->textInput()?>
                    <?=$form->field($address,'adress')->label()->textarea()?>
                    <?=$form->field($address,'map')->label()->textInput()?>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>用户名 *</label>
                                <input id="userName" name="userName" type="text" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>密码 *</label>
                                <input id="password" name="password" type="text" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>确认密码 *</label>
                                <input id="confirm" name="confirm" type="text" class="form-control required">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <div style="margin-top: 20px">
                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <h1>财务</h1>
                <fieldset>
                    <h2>账户信息</h2>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>用户名 *</label>
                                <input id="userName" name="userName" type="text" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>密码 *</label>
                                <input id="password" name="password" type="text" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>确认密码 *</label>
                                <input id="confirm" name="confirm" type="text" class="form-control required">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <div style="margin-top: 20px">
                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <h1>账户</h1>
                <fieldset>
                    <h2>账户信息</h2>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>用户名 *</label>
                                <input id="userName" name="userName" type="text" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>密码 *</label>
                                <input id="password" name="password" type="text" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>确认密码 *</label>
                                <input id="confirm" name="confirm" type="text" class="form-control required">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <div style="margin-top: 20px">
                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <h1>个人资料</h1>
                <fieldset>
                    <h2>个人资料信息</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>姓名 *</label>
                                <input id="name" name="name" type="text" class="form-control required">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email *</label>
                                <input id="email" name="email" type="text" class="form-control required email">
                            </div>
                            <div class="form-group">
                                <label>地址 *</label>
                                <input id="address" name="address" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <h1>警告</h1>
                <fieldset>
                    <div class="text-center" style="margin-top: 120px">
                        <h2>你是火星人 :-)</h2>
                    </div>
                </fieldset>
                <h1>完成</h1>
                <fieldset>
                    <h2>条款</h2>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                    <label for="acceptTerms">我同意注册条款</label>
                </fieldset>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>添加</h5></div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal',
//                        'enctype' => 'multipart/form-data'
                    ]
                ]);
                ?>

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
    <label class=\"col-sm-2 control-label\">名称</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($model,'img',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">店铺门头</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($model,'imgs',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">店内图片</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($model,'start_time',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">开始时间</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($model,'end_time',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">结束时间</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($model,'compact_code',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">合同号</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
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

                <div class="ibox-title"><h5>地理位置</h5></div>

                <?=$form->field($address,'sheng',[
                    'template' => "<div class=\"col-sm-4\">{input}</div>",
                ])->label()->textInput()?>
                <?=$form->field($address,'shi',[
                    'template' => "<div class=\"col-sm-4\">{input}</div>",
                ])->label()->textInput()?>
                <?=$form->field($address,'qu',[
                    'template' => "<div class=\"col-sm-4\">{input}</div>",
                ])->label()->textInput()?>
                <div class=\"hr-line-dashed\"></div>
                <?=$form->field($address,'adress',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">详细地址</label>
<div class=\"col-sm-10\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textarea()?>
                <?=$form->field($address,'map',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">地图定位</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>



                <div class="ibox-title"><h5>财务信息</h5></div>

                <?=$form->field($finance,'name',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">收款人姓名</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($finance,'bank_name',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">银行名称</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>
                <?=$form->field($finance,'back_acc',[
                    'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">银行账号</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                ])->label()->textInput()?>

                <div class="card-footer">
                    <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                    <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                </div>
            </div>
            <?php
            ActiveForm::end();
            ?>
        </div>
    </div>
</div>