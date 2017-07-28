<?php
use yii\helpers\Html;
use yii\helpers\Url;
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
                    <?php foreach($platforms as $platform): ?>
                        <tr>
                            <td><?=$platform->id?></td>
                            <td><?=$platform->name?></td>
                            <td><?=$platform->ename?></td>
                            <td><?=$platform->content?></td>
                            <td><?=\app\erp\util\UserUtil::getUserNickname($platform->admin_id)["nickname"]?></td>
                            <td><?=Yii::$app->params['menu']['state'][1][$platform->state]?></td>
                            <td>
                                <?=date("Y-m-d H:i:s", $platform->create_time)?>
                                <br/>
                                <?=date("Y-m-d H:i:s", $platform->update_time)?>
                            </td>
                            <td>
                                <?php
                                if ((boolean)$platform->state) {
                                    ?>
                                    <a href="<?= Url::to(['platform/state', 'id' => $platform->id,'state'=>0,'reqURL'=>(Url::to(['platform/index'])."#list_".$platform->id)]) ?>"
                                    >禁用</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?= Url::to(['platform/state', 'id' => $platform->id,'state'=>1,'reqURL'=>(Url::to(['platform/index'])."#list_".$platform->id)]) ?>"
                                    >启动</a>
                                    <?php
                                }
                                ?>
                                <a href="<?=Url::to(['platform/del', 'id' => $platform->id,'state'=>1,'reqURL'=>(Url::to(['platform/index']))]) ?>">删除</a>
                                <a href="<?=Url::to(['platform/edit', 'id' => $platform->id,'state'=>1,'reqURL'=>(Url::to(['platform/index'])."#list_".$platform->id)]) ?>">编辑</a>
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
