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
                        <th class="text-center"><i class="icon-people"></i></th>
                        <th class="text-center">用户</th>
                        <th class="text-center">状态</th>
                        <th class="text-center">电话</th>
                        <th class="text-center">邮箱</th>
                        <th class="text-center">会员组</th>
                        <th class="text-center">登陆</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($managers as $manager): ?>
                        <tr>
                            <td class="text-center">
                                <div class="avatar">
                                    <img src="/coreui/img/avatars/1.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                    <span class="avatar-status badge-success"></span>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="<?= Url::to(['user/show', 'id' => $manager->id]) ?>">
                                    <div><?= $manager->account; ?></div>
                                    <div class="small text-muted">
                                        <span>注册时间</span>| <?=date("Y-m-d H:i:s", $manager->create_time);?>
                                    </div>
                                </a>
                            </td>
                            <td class="text-center">
                                <?=Yii::$app->params['sysadmin']['state'][1][$manager->state];?>
                            </td>
                            <td class="text-center">
                                <i class="fa fa-phone fa-lg"></i>
                                <?= $manager->phone;?>
                            </td>
                            <td class="text-center">
                                <i class="fa fa-envelope fa-lg"></i>
                                <?= $manager->email;?>
                            </td>
                            <td class="text-center">
                                <?=time()?>
                            </td>
                            <td class="text-center">
                                <?=long2ip($manager->login_ip);?>
                                <?=date("Y-m-d H:i:s", $manager->create_time);?>
                            </td>
                            <td class="text-center">
                                禁用
                                激活
                                <?php if ($manager->id != 1): ?>
                                    <a href="<?php echo Url::to(['user/del', 'id' => $manager->id]) ?>">删除</a>
                                <?php endif; ?>
                                编辑
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
