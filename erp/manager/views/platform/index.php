<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-footer">
            <a href="<?=Url::to(['platform/add']) ?>" class="btn btn-bg btn-primary"><i class="fa fa-dot-circle-o"></i> 添 加 </a>
        </div>
        <div class="card">
            <div class="card-header">
                列表
            </div>
            <div class="card-block">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">名称</th>
                        <th class="text-center">英文名称</th>
                        <th class="text-center">介绍</th>
                        <th class="text-center">管理员</th>
                        <th class="text-center">状态</th>
                        <th class="text-center">时间</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($platforms as $platform): ?>
                        <tr>
                            <td class="text-center"><?=$platform->id?></td>
                            <td class="text-center"><?=$platform->name?></td>
                            <td class="text-center"><?=$platform->ename?></td>
                            <td class="text-center"><?=$platform->content?></td>
                            <td class="text-center"><?=$platform->admin_id?></td>
                            <td class="text-center"><?=$platform->state?></td>
                            <td class="text-center">
                                <?=date("Y-m-d H:i:s", $platform->create_time)?>
                                <br/>
                                <?=date("Y-m-d H:i:s", $platform->update_time)?>
                            </td>
                            <td class="text-center">
                                <a href="<?=Url::to(['platform/del', 'id' => $platform->id]) ?>">禁用</a>
                                <a href="<?=Url::to(['platform/del', 'id' => $platform->id]) ?>">激活</a>
                                <a href="<?=Url::to(['platform/del', 'id' => $platform->id]) ?>">删除</a>
                                <a href="<?=Url::to(['platform/edit', 'id' => $platform->id]) ?>">编辑</a>
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
