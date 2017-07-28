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
                        <th>店铺编号</th>
                        <th>名称</th>
                        <th>门头</th>
                        <th>信息</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $m): ?>
                        <tr>
                            <td><?=$m->shop_num?></td>
                            <td><?=$m->name?></td>
                            <td><?=$m->img?><br>
                                店内：
                                <?=$m->imgs?></td>
                            <td>
                                <span class="label <?php if(!empty($m->start_time)&&!empty($m->end_time)){echo "label-primary";} ?> ">有效期:<?=$m->start_time?>~<?=$m->end_time?></span>
                                <span class="label <?php if(!empty($m->compact_code)){echo "label-primary";} ?> ">签署的合同编号：<?=$m->compact_code?></span>
                                <span class="label <?php if(!empty($m->master_id)){echo "label-primary";} ?> ">负责人ID：<?=$m->master_id?></span>
                                <span class="label <?php if(!empty($m->master_id)){echo "label-primary";} ?> ">个人认证：<?=$m->master_id?></span>
                                <span class="label <?php if(!empty($m->phone)){echo "label-primary";} ?> ">联系电话：<?=$m->phone?></span>
                                <span class="label <?php if(!empty($m->phone)){echo "label-primary";} ?> ">地理位置：<?=$m->phone?></span>
                                <span class="label <?php if(!empty($m->phone)){echo "label-primary";} ?> ">财务：<?=$m->phone?></span>
                                <span class="label <?php if(!empty($m->phone)){echo "label-primary";} ?> ">账户：<?=$m->phone?></span>
                                <span class="label <?php if(!empty($m->service_user)){echo "label-primary";} ?> ">客服专员：<?=$m->service_user?></span>
                                <span class="label <?php if(!empty($m->service_user2)){echo "label-primary";} ?> ">招商经理：<?=$m->service_user2?></span>
                            </td>
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
