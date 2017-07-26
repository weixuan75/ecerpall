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
<!--                        <th>ID</th>-->
<!--                        <th>父级ID</th>-->
                        <th>名称</th>
<!--                        <th>英文名称</th>-->
<!--                        <th>介绍</th>-->
                        <th>管理员</th>
                        <th>URL地址</th>
                        <th>状态</th>
<!--                        <th>时间</th>-->
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($managers as $manager): ?>
                        <tr id="list_<?=$manager['id']?>">
                            <td><?=$manager['sort']?></td>
<!--                            <td>--><?php//=$manager['id']?><!--</td>-->
<!--                            <td>--><?php//=$manager['menu_pid']?><!--</td>-->
                            <td><?=$manager['name']?>
                                <a href="<?=Url::to(['menu/add', 'id' => $manager['id'],'reqURL'=>(Url::to(['/manager/menu'])."#list_".$manager['id'])]) ?>" title="添加子菜单"><i class="fa fa-plus-circle"></i></a></td>
<!--                            <td>--><?php//=$manager['ename']?><!--</td>-->
<!--                            <td>--><?php//=$manager['content']?><!--</td>-->
                            <td><?=UserUtil::getUserNickname($manager['admin_id'])["nickname"]?></td>
                            <td><?=$manager['url']?></td>
                            <td class="text-center"><?=Yii::$app->params['menu']['state'][1][$manager['state']]?></td>
<!--                            <td>-->
<!--                                --><?php//=date("Y-m-d H:i:s", $manager['create_time'])?>
<!--                                <br/>-->
<!--                                --><?php//=date("Y-m-d H:i:s", $manager['update_time'])?>
<!--                            </td>-->
                            <td>
                                <?php
                                if ((boolean)$manager['state']) {
                                    ?>
                                    <a href="<?= Url::to(['menu/state', 'id' => $manager['id'],'state'=>0,'reqURL'=>(Url::to(['/manager/menu'])."#list_".$manager['id'])]) ?>"
                                    >禁用</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?= Url::to(['menu/state', 'id' => $manager['id'],'state'=>1,'reqURL'=>(Url::to(['/manager/menu'])."#list_".$manager['id'])]) ?>"
                                    >启动</a>
                                    <?php
                                }
                                ?>
                                <a href="<?=Url::to(['menu/del', 'id' => $manager['id'],'reqURL'=>(Url::to(['/manager/menu']))]) ?>">删除</a>
                                <a href="<?=Url::to(['menu/edit', 'id' => $manager['id'],'reqURL'=>(Url::to(['/manager/menu'])."#list_".$manager['id'])]) ?>">编辑</a>
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
