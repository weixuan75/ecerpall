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
                        $("#platform-name").blur(function(){
                            console.log("开始");
                            $("#platform-ename").val(pinyin.getFullChars($("#platform-name").val()));
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
            </div>
            <div class="card-footer">
                <?=Html::submitButton('<i class="fa fa-dot-circle-o"></i> 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                <?=Html::resetButton('<i class="fa fa-ban"></i> 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
            </div>
            <?php
            ActiveForm::end();
            ?>

        </div>
    </div>
</div>