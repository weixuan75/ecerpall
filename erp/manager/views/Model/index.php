<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>列表</h3>
                <button class="btn btn-bg btn-success" type="button" onclick="javascript:location.reload();" title="刷新当前页面"><i class="fa fa-refresh"></i></button>
                <a href="<?=Url::to(['add']) ?>" class="btn btn-bg btn-primary"> 添 加 </a>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
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
