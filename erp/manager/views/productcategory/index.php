<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>列表</h3>
                <button class="btn btn-bg btn-success" type="button" onclick="javascript:location.reload();" title="刷新当前页面"><i class="fa fa-refresh"></i></button>
            </div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal',
                        'action' => \yii\helpers\Url::to(['add']),
                    ]
                ]);
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?=$form->field($model,'name',['template' => "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">分类名称</label><div class=\"col-sm-8\">{input}{error}</div></div><div class=\"hr-line-dashed\"></div>",])->textInput()?>
                    </div>
                    <div class="col-sm-12">
                        <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?></div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>分类名</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $m): ?>
                        <tr>
                            <td><?=$m->id?></td>
                            <td><?=$m->name?></td>
                            <td>
                                <a href="#">编辑</a>
                                <a href="#">修改</a>
                                <a href="#">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination pull-right">
                    <?= yii\widgets\LinkPager::widget([
                        'pagination' => $pager,
                        'prevPageLabel' => '&#8249;',
                        'nextPageLabel' => '&#8250;'
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>
