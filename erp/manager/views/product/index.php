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
                        <th>SN</th>
                        <th>产品名称</th>
                        <th>产品的图片路径</th>
                        <th>原料</th>
                        <th>产品的价格</th>
                        <th>操作人员ID</th>
                        <th>产品的品牌的id</th>
                        <th>标签</th>
                        <th>产品分类</th>
                        <th>创建的时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $m): ?>
                        <tr>
                            <td><?=$m->sn?></td>
                            <td><?=$m->name?></td>
                            <td><?=$m->image?></td>
                            <td><?=$m->material?></td>
                            <td><?=$m->price?></td>
                            <td><?=$m->user_id?></td>
                            <td><?=$m->brand_id?></td>
                            <td><?=$m->tag?></td>
                            <td><?=$m->category_id?></td>
                            <td><?=$m->create_time?></td>
                            <td>
                                <a href="#">查看店铺信息</a>
                                <a href="#">继续完善信息</a>
                                <a href="#">修改客服专员</a>
                                <a href="#">修改招商经理</a>
                                <a href="#">查看仓库</a>
                                <a href="#">查看进货单</a>
                                <a href="#">查看销货订单</a>
                                <a href="#">查看财务报表</a>
                                <a href="#">续期</a>
                                <a href="#">禁用</a>
                                <a href="#">启动</a>
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
