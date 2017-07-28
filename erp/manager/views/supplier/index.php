<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
?><div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h3>列表</h3>
                <input class="btn btn-bg btn-primary" type="button" onclick="javascript:location.reload();" value="刷新当前页面">
                <a href="<?=Url::to(['add']) ?>" class="btn btn-bg btn-primary"> 添 加 </a>
            </div>
            <div class="ibox-content">
                <table class="table table-hover table-outline mb-0 hidden-sm-down">
                    <thead class="thead-default">
                    <tr>
                        <td>供应商名称</td>
                        <td>采购员ID</td>
                        <td>座机</td>
                        <td>联系人</td>
                        <td>联系电话</td>
                        <td>地址</td>
                        <td>银行账号</td>
                        <td>收款账号</td>
                        <td>银行名称</td>
                        <td>修改时间</td>
                        <td>创建时间</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $m): ?>
                        <tr>
                            <td><?=$m->title?></td>
                            <td><?=$m->user_id?><td>
                            <td><?=$m->tel?><td>
                            <td><?=$m->name?><td>
                            <td><?=$m->phone?><td>
                            <td><?=$m->address?><td>
                            <td><?=$m->banktitle?><td>
                            <td><?=$m->bank_name?><td>
                            <td><?=$m->bank_account?><td>
                            <td><?=$m->update_time?><td>
                            <td><?=$m->create_time?><td>
                            <td>
                                <a href="#">删除</a>
                                <a href="#">编辑</a>
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
