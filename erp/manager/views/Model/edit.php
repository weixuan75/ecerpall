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
        <?=$form->field($platform,'name')->textInput()?>
        <?=$form->field($platform,'ename')->textInput()?>
        <?=$form->field($platform,'content')->textInput()?>
        <?php
        $platform_adminId = 0;
        if($platform->admin_id!=0||$platform->admin_id!=null){
            $platform_adminId=$platform->admin_id;
            ?>
            <?=$platform_adminId?>
            <?php
        }else{
            ?>
            <?=$form->field($platform,'admin_id')->textInput(['value'=>\app\erp\util\UserUtil::UserId()])?>
            <?php
        }
        ?>
        <?php
        $platform_state = 0;
        if($platform->state!=0||$platform->state!=null){
            $platform_state=$platform->state;
        }
        ?>
        <?=$form->field($platform,'state')->radioList(Yii::$app->params['platform']['state'][1],['value'=>$platform_state])?>
    <div class="card-footer">
        <?=Html::submitButton('<i class="fa fa-dot-circle-o"></i> 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
        <?=Html::resetButton('<i class="fa fa-ban"></i> 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
    </div>
    <?php
    ActiveForm::end();
    ?>

</div>