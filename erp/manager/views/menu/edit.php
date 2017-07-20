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
                $("#menu-name").blur(function(){
                    $("#menu-ename").val(pinyin.getFullChars($("#menu-name").val()));
                });
            });
        </script>

        <?php
        $menu_state = 0;
        if($menu->state!=0||$menu->state!=null){
            $menu_state=$menu->state;
        }
        ?>
        <?=$form->field($menu,'sort')->textInput()?>
        <?=$form->field($menu,'name')->textInput()?>
        <?=$form->field($menu,'ename')->textInput()?>
        <?=$form->field($menu,'menu_pid')->dropDownList($option)?>
        <?=$form->field($menu,'content')->textInput()?>
        <?=$form->field($menu,'url')->textInput()?>
        <?=$form->field($menu,'admin_id')->textInput()?>
        <?php
        $menu_state = 0;
        if($menu->state!=0||$menu->state!=null){
            $menu_state=$menu->state;
        }
        ?>
        <?=$form->field($menu,'state')->radioList(Yii::$app->params['menu']['state'][1],['value'=>$menu_state])?>
    </div>
    <div class="card-footer">
        <?=Html::submitButton('<i class="fa fa-dot-circle-o"></i> 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
        <?=Html::resetButton('<i class="fa fa-ban"></i> 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
    </div>
    <?php
    ActiveForm::end();
    ?>
</div>