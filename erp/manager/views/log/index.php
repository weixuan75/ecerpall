<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                列表
            </div>
            <div class="card-block">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">管理员ID</th>
                        <th class="text-center">模块ID</th>
                        <th class="text-center">操作内容</th>
                        <th class="text-center">操作标签</th>
                        <th class="text-center">时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($managers as $manager): ?>
                        <tr>
                            <td><?=$manager->id?></td>
                            <td>
                                <?php
                                echo \app\erp\models\Sysadmindate::findOne($manager->admin_id)['nickname']
                                ?>
                            </td>
                            <td><?=$manager->model_id?></td>
                            <td><?=$manager->content?></td>
                            <td><?=$manager->tag?></td>
                            <td><?=date("m-d H:i:s", $manager->time)?></td>
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
