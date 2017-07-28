<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\erp\util\UserUtil;
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
                <?php
                $form = ActiveForm::begin();
                ?>
                    <?=$form->field($model,'name')->textInput()?>
                    <?=$form->field($model,'birthday')->textInput()?>
                    <?=$form->field($model,'gender')->radioList(['<i></i>男', '<i></i>女'], ['class' => 'radio i-checks']);?>
                    <?=$form->field($model,'nation')->textInput()?>
                    <?=$form->field($model,'idnumber')->textInput()?>
                    <?=$form->field($model,'adress')->textInput()?>
                    <?=$form->field($model,'img1')->textInput()?>
                    <?=$form->field($model,'img2')->textInput()?>
                    <?=$form->field($model,'img3')->textInput()?>
                    <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                    <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>