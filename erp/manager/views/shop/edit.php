<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
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
                <div class="row">
                    <div class="col-sm-4">
                        <?=$form->field($address,'sheng',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">省</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-4">
                        <?=$form->field($address,'shi',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">市</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-4">
                        <?=$form->field($address,'qu',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">区</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <?=$form->field($address,'adress',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">详细地址</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                    ])->label()->textarea()?>
                    <?=$form->field($address,'map',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">地图标注</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                    ])->label()->textInput()?>

                </div>

                <h2>财务</h2>
                <div class="row">
                    <?=$form->field($finance,'name',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">姓名</label>
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
                </div>

                <h2>账户信息</h2>
                <div class="row">
                    <?=$form->field($user,'access',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">账号</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                    ])->label()->textInput()?>
                    <?=$form->field($user,'phone',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">联系电话</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                    ])->label()->textInput()?>
                    <?=$form->field($user,'password',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">密码</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                    ])->label()->textInput()?>
                    <?=$form->field($user,'email',[
                        'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">电子邮箱</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                    ])->label()->textInput()?>

                </div>

                <h2>个人认证</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <?=$form->field($authPeople,'name',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">姓名</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($authPeople,'birthday',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">出生日期</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($authPeople,'gender',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">性别</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($authPeople,'nation',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">民族</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($authPeople,'adress',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">地址</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($authPeople,'idnumber',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">身份证号</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-4">
                        <?=$form->field($authPeople,'img1',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">身份证正面</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-4">
                        <?=$form->field($authPeople,'img2',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">身份证反面</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                    <div class="col-sm-4">
                        <?=$form->field($authPeople,'img3',[
                            'template' => "<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">手持身份证</label>
<div class=\"col-sm-8\">{input}</div>
<div class=\"col-lg-12\">{error}</div>
</div>
<div class=\"hr-line-dashed\"></div>",
                        ])->label()->textInput()?>
                    </div>
                </div>

                <h2>条款</h2>
                <div class="row">
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                    <label for="acceptTerms">我同意注册条款</label>

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
</div>