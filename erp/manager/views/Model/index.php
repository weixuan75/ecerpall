<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-footer">
            <a href="<?=Url::to(['model/add']) ?>" class="btn btn-bg btn-primary"><i class="fa fa-dot-circle-o"></i> 添 加 </a>
        </div>
        <div class="card">
            <div class="card-header">
                列表
            </div>
            <div class="card-block">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>英文名称</th>
                        <th>介绍</th>
                        <th>管理员</th>
                        <th>状态</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($model as $m): ?>
                        <tr id="list_<?=$m->id?>">
                            <td><?=$m->id?></td>
                            <td><?=$m->name?></td>
                            <td><?=$m->ename?></td>
                            <td><?=$m->content?></td>
                            <td><?=UserUtil::getUserNickname($m->admin_id)["nickname"]?></td>
                            <td class="text-center"><?=Yii::$app->params['menu']['state'][1][$m->state]?></td>
                            <td>
                                <?=date("Y-m-d H:i:s", $m->create_time)?>
                            </td>
                            <td>
                                <?php
                                if ((boolean)$m->state) {
                                    ?>
                                    <a href="<?= Url::to(['model/state', 'id' => $m->id,'state'=>0,'reqURL'=>(Url::to(['model/index'])."#list_".$m->id)]) ?>"
                                    >禁用</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?= Url::to(['model/state', 'id' => $m->id,'state'=>1,'reqURL'=>(Url::to(['model/index'])."#list_".$m->id)]) ?>"
                                    >启动</a>
                                    <?php
                                }
                                ?>
                                <a href="<?=Url::to(['model/del', 'id' => $m->id]) ?>">删除</a>
                                <a href="<?=Url::to(['model/edit', 'id' => $m->id]) ?>">编辑</a>
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
