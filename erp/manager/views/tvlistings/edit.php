<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>编辑</h3>
                <input class="btn btn-bg btn-primary" type="button" onclick="javascript:location.reload();" value="刷新当前页面">
                <a href="<?=\yii\helpers\Url::to(['index']) ?>" class="btn btn-bg btn-primary"> 返 回 列 表 </a>
            </div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin();
                ?>
                <div class="card-block">
                    <?=$form->field($tv,'name')->textInput()?>

                    <?php
                    $tv_state = 1;
                    if($tv->state!=1&&$tv->state=null){
                        $tv_state=$tv->state;
                    }
                    ?>
                    <?=$form->field($tv,'state')->radioList(Yii::$app->params['tvlistings']['state'][1],['value'=>$tv_state])?>
                    <?=$form->field($tv,'content')->textInput()?>
                </div>
                <div class="card-footer">
                    <?=Html::submitButton('<i class="fa fa-dot-circle-o"></i> 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                    <a class="btn btn-bg btn-danger" href="<?=$reqURL?>"><i class="fa fa-ban"></i> 取 消</a>
                </div>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>