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
                <?php
                $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal',
                    ]
                ]);
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?=$form->field($user,'shop_id',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">店铺ID</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'shop_num',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">店铺编号</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'account',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">账号</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'phone',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">手机号</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'password',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">密码</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'email',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">电子邮箱</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'dbname',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">数据库名称</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'state',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">state</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->radioList(["0"=>"禁用","1"=>"激活"])?>
                    </div>
                    <div class="col-sm-12">
                        <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                        <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?></div>
            </div>
        </div>
    </div>
</div>