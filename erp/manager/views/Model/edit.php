<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="card">
    <div class="card-header">
        <strong>添加</strong>
    </div>
    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="card-block">
        <script src="/js/pinyin.js"></script>
        <script>
            $(function () {
                $("#model-name").blur(function(){
                    $("#model-ename").val(pinyin.getFullChars($("#model-name").val()));
                });
            });
        </script>
        <?=$form->field($model,'name')->textInput()?>
        <?=$form->field($model,'ename')->textInput()?>
        <?=$form->field($model,'content')->textInput()?>
        <?php
        $model_adminId = 0;
        if($model->admin_id!=0||$model->admin_id!=null){
            $model_adminId=$model->admin_id;
            ?>
            <?=$model_adminId?>
            <?php
        }else{
            ?>
            <?=$form->field($model,'admin_id')->textInput(['value'=>\app\erp\util\UserUtil::UserId()])?>
            <?php
        }
        ?>
        <?php
        $model_state = 0;
        if($model->state!=0||$model->state!=null){
            $model_state=$model->state;
        }
        ?>
        <?=$form->field($model,'state')->radioList(Yii::$app->params['platform']['state'][1],['value'=>$model_state])?>
    <div class="card-footer">
        <?=Html::submitButton('<i class="fa fa-dot-circle-o"></i> 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
        <?=Html::resetButton('<i class="fa fa-ban"></i> 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
    </div>
    <?php
    ActiveForm::end();
    ?>

</div>