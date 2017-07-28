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
                <input class="btn btn-bg btn-primary" type="button" onclick="javascript:location.reload();" value="刷新当前页面">
                <a href="<?=Url::to(['shopuser/index']) ?>" class="btn btn-bg btn-primary"> 返 回 列 表 </a>
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
                        <?=$form->field($user,'shop_id',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">店铺ID</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->dropDownList($shoplist)?>
                        <?=$form->field($user,'role_id',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">角色</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->radioList(["1000"=>"管理员","2000"=>"店长","3000"=>"店员"])?>
                        <?=$form->field($user,'account',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">账号</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'phone',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">手机号</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'password',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">密码</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'email',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">电子邮箱</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'dbname',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">数据库名称</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($user,'state',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">状态</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->radioList(["0"=>"禁用","1"=>"激活"])?>
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