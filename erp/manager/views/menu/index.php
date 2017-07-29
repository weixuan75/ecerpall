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
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th>排序</th>
                        <th>名称</th>
                        <th>管理员</th>
                        <th>URL地址</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($managers as $manager): ?>
                        <tr id="list_<?=$manager['id']?>">
                            <td><?=$manager['sort']?></td>
                            <td><?=$manager['name']?>
                                <a href="<?=Url::to(['menu/add', 'id' => $manager['id'],'reqURL'=>(Url::to(['/manager/menu'])."#list_".$manager['id'])]) ?>" title="添加子菜单"><i class="fa fa-plus-circle"></i></a>
                            </td>
                            <td><?=UserUtil::getUserNickname($manager['admin_id'])["nickname"]?></td>
                            <td><?=$manager['url']?></td>
                            <td class="text-center"><?=Yii::$app->params['menu']['state'][1][$manager['state']]?></td>
                            <td>
                                <?php
                                if ((boolean)$manager['state']) {
                                    ?>
                                    <a href="<?= Url::to(['state', 'id' => $manager['id'],'state'=>0,'reqURL'=>(Url::to(['index'])."#list_".$manager['id'])]) ?>"
                                    >禁用</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?= Url::to(['state', 'id' => $manager['id'],'state'=>1,'reqURL'=>(Url::to(['index'])."#list_".$manager['id'])]) ?>"
                                    >启动</a>
                                    <?php
                                }
                                ?>
                                <a href="<?=Url::to(['del', 'id' => $manager['id'],'reqURL'=>(Url::to(['index']))]) ?>">删除</a>
                                <a href="<?=Url::to(['edit', 'id' => $manager['id'],'reqURL'=>(Url::to(['index'])."#list_".$manager['id'])]) ?>">编辑</a>
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
