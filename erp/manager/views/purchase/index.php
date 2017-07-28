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
                        <th>采购清单编号</th>
                        <th>类型：0是流通货1是尾货</th>
                        <th>供应商ID</th>
                        <th>采购单操作员</th>
                        <th>采购单操作员</th>
                        <th>状态</th>
                        <th>采购清单的价格</th>
                        <th>采购内容</th>
                        <th>采购总数量</th>
                        <th>采购总数量</th>
                        <th>修改时间</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $m): ?>
                        <tr>
                            <td><?=$m->code?></td>
                            <td><?=$m->type?></td>
                            <td><?=$m->supplier_id?><td>
                            <td><?=$m->user_id?><td>
                            <td><?=$m->state?><td>
                            <td><?=$m->price?><td>
                            <td><?=$m->data?><td>
                            <td><?=$m->num?><td>
                            <td><?=$m->updata_time?><td>
                            <td><?=$m->create_time?><td>
                            <td>
                                <a href="#">删除</a>
                                <a href="#">停止</a>
                                <a href="#">继续</a>
                                <a href="#">打款</a>
                                <a href="#">查看</a>
                                <a href="#">打印</a>
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
