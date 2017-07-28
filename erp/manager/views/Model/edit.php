<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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