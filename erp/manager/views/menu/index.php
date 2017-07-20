<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
?>
<div class="row">
    <?php
    ?>
    <div class="col-md-12">
        <div class="card-footer">
            <a href="<?=Url::to(['menu/add']) ?>" class="btn btn-bg btn-primary"><i class="fa fa-dot-circle-o"></i> 添 加 菜 单 </a>
        </div>
        <div class="card">
            <div class="card-header">
                列表
            </div>
            <div class="card-block">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th>排序</th>
                        <th>ID</th>
                        <th>父级ID</th>
                        <th>名称</th>
                        <th>英文名称</th>
                        <th>介绍</th>
                        <th>管理员</th>
                        <th>URL地址</th>
                        <th>状态</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($managers as $manager): ?>
                        <tr>
                            <td><?=$manager['sort']?></td>
                            <td><?=$manager['id']?></td>
                            <td><?=$manager['menu_pid']?></td>
                            <td><?=$manager['name']?></td>
                            <td><?=$manager['ename']?></td>
                            <td><?=$manager['content']?></td>
                            <td><?=UserUtil::getUserNickname($manager['admin_id'])["nickname"]?></td>
                            <td><?=$manager['url']?></td>
                            <td><?=$manager['state']?></td>
                            <td>
                                <?=date("Y-m-d H:i:s", $manager['create_time'])?>
                                <br/>
                                <?=date("Y-m-d H:i:s", $manager['update_time'])?>
                            </td>
                            <td>
                                <a href="<?=Url::to(['user/del', 'id' => $manager['id']]) ?>">禁用</a>
                                <a href="<?=Url::to(['user/del', 'id' => $manager['id']]) ?>">激活</a>
                                <a href="<?=Url::to(['user/del', 'id' => $manager['id']]) ?>">删除</a>
                                <a href="<?=Url::to(['menu/edit', 'id' => $manager['id']]) ?>">编辑</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!--/.col-->
</div>
