<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
?>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>列表</h3>
                <a href="<?=Url::to(['shopfinance/add']) ?>" class="btn btn-bg btn-primary"> 添 加 </a>
            </div>
            <div class="ibox-content">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th>店铺ID</th>
                        <th>姓名</th>
                        <th>银行名称</th>
                        <th>银行账号</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $m): ?>
                        <tr id="list_<?=$m->id?>">
                            <td><?=$m->shop_id?></td>
                            <td><?=$m->name?></td>
                            <td><?=$m->bank_name?></td>
                            <td><?=$m->back_acc?></td>
                            <td><?=$m->time?></td>
                            <td>
                                <a href="<?=Url::to(['model/del', 'id' => $m->id,'state'=>1,'reqURL'=>(Url::to(['model/index']))]) ?>">删除</a>
                                <a href="<?=Url::to(['model/edit', 'id' => $m->id,'reqURL'=>(Url::to(['model/index'])."#list_".$m->id)]) ?>">编辑</a>
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
