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
                <?=$form->field($admin,'account')->textInput()?>
                <?=$form->field($admin,'email')->textInput()?>
                <?=$form->field($admin,'phone')->textInput()?>
                <?=$form->field($admin,'password')->passwordInput()?>
                <?=$form->field($admin,'repass')->passwordInput()?>
                <?php
                $sysadmin_state = 0;
                if($admin->state!=0||$admin->state!=null){
                    $sysadmin_state=$admin->state;
                }
                ?>
                <?=$form->field($admin,'state')->radioList(Yii::$app->params['sysadmin']['state'][1],['value'=>$sysadmin_state])?>
                <?=$form->field($admin,'sys_group_id')->textInput()?>
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