<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>添加</h5></div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin();
                ?>
                <div class="card-block">
                    <?=$form->field($model,'shop_num')->textInput()?>
                    <?=$form->field($model,'name')->textInput()?>
                    <?=$form->field($model,'img')->textInput()?>
                    <?=$form->field($model,'imgs')->textInput()?>
                    <?=$form->field($model,'start_time')->textInput()?>
                    <?=$form->field($model,'end_time')->textInput()?>
                    <?=$form->field($model,'compact_code')->textInput()?>
                    <?=$form->field($model,'service_user')->textInput()?>
                    <?=$form->field($model,'service_user2')->textInput()?>
                    <div class="card-footer">
                        <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                        <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>