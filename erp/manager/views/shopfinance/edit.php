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
                <a href="<?=Url::to(['shopfinance/index']) ?>" class="btn btn-bg btn-primary"> 返 回 列 表 </a>
            </div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin();
                ?>
                <div class="card-block">
                    <?=$form->field($finance,'shop_id')->dropDownList($shoplist)?>
                    <?=$form->field($finance,'name')->textInput()?>
                    <?=$form->field($finance,'bank_name')->textInput()?>
                    <?=$form->field($finance,'back_acc')->textInput()?>
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