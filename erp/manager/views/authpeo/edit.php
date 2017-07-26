<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\erp\util\UserUtil;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>添加</h5></div>
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