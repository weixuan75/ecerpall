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
                        <?=$form->field($model,'code',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">采购清单编号</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'type',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">类型</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->radioList(['<i></i>流通货', '<i></i>尾货'], ['class' => 'radio i-checks']);?>
                        <?=$form->field($model,'supplier_id',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">供应商ID</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'state',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">采购单操作员</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'price',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">状态</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'data',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">采购清单的价格</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                        <?=$form->field($model,'num',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">采购内容</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                    </div>
                    <div class="col-sm-12">
                        <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                        <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?></div>
            </div>
        </div>
    </div>
</div>