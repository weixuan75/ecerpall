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
                <button class="btn btn-bg btn-success" type="button" onclick="javascript:location.reload();" title="刷新当前页面"><i class="fa fa-refresh"></i></button>
                <a href="<?=\yii\helpers\Url::to(['index']) ?>" class="btn btn-bg btn-primary"> 返 回 列 表 </a>
            </div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal',
                    ]
                ]);
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?=$form->field($model,'name',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">分类名称</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                    </div>
                    <div class="col-sm-12">
                        <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                        <a href="<?=\yii\helpers\Url::to(['index']) ?>" class="btn btn-bg btn-danger">  取 消 </a>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?></div>
            </div>
        </div>
    </div>
</div>