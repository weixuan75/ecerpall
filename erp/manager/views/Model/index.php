<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\erp\util\UserUtil;
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>鼠标经过</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="table_basic.html#">选项1</a>
                </li>
                <li><a href="table_basic.html#">选项2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>数据</th>
                <th>用户</th>
                <th>值</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td><span class="line" style="display: none;">5,3,2,-1,-3,-2,2,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 9.375 0 0.5 3.5555555555555554 4.25 7.111111111111111 6.125 10.666666666666666 11.75 14.222222222222221 15.5 17.77777777777778 13.625 21.333333333333332 6.125 24.888888888888886 4.25 28.444444444444443 0.5 32 6.125 32 9.375"></polygon><polyline fill="transparent" points="0 0.5 3.5555555555555554 4.25 7.111111111111111 6.125 10.666666666666666 11.75 14.222222222222221 15.5 17.77777777777778 13.625 21.333333333333332 6.125 24.888888888888886 4.25 28.444444444444443 0.5 32 6.125" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                </td>
                <td>张三</td>
                <td class="text-navy"> <i class="fa fa-level-up"></i> 40%</td>
            </tr>
            <tr>
                <td>2</td>
                <td><span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                </td>
                <td>李四</td>
                <td class="text-warning"> <i class="fa fa-level-down"></i> -20%</td>
            </tr>
            <tr>
                <td>3</td>
                <td><span class="line" style="display: none;">1,6,3,9,5,9,5,3,9,6,4</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 13.833333333333334 3.2 5.5 6.4 10.5 9.600000000000001 0.5 12.8 7.166666666666666 16 0.5 19.200000000000003 7.166666666666666 22.400000000000002 10.5 25.6 0.5 28.8 5.5 32 8.833333333333332 32 15"></polygon><polyline fill="transparent" points="0 13.833333333333334 3.2 5.5 6.4 10.5 9.600000000000001 0.5 12.8 7.166666666666666 16 0.5 19.200000000000003 7.166666666666666 22.400000000000002 10.5 25.6 0.5 28.8 5.5 32 8.833333333333332" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                </td>
                <td>王麻子</td>
                <td class="text-navy"> <i class="fa fa-level-up"></i> 26%</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>列表</h5>

                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="btn btn-primary dim" type="button" href="<?=Url::to(['model/add']) ?>"><i class="fa fa-check"> 添 加 </i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <table class="table table-hover">
                    <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>英文名称</th>
                        <th>介绍</th>
                        <th>管理员</th>
                        <th>状态</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($model as $m): ?>
                        <tr id="list_<?=$m->id?>">
                            <td><?=$m->id?></td>
                            <td><?=$m->name?></td>
                            <td><?=$m->ename?></td>
                            <td><?=$m->content?></td>
                            <td><?=UserUtil::getUserNickname($m->admin_id)["nickname"]?></td>
                            <td class="text-center"><?=Yii::$app->params['menu']['state'][1][$m->state]?></td>
                            <td>
                                <?=date("Y-m-d H:i:s", $m->create_time)?>
                            </td>
                            <td>
                                <?php
                                if ((boolean)$m->state) {
                                    ?>
                                    <a href="<?= Url::to(['model/state', 'id' => $m->id,'state'=>0,'reqURL'=>(Url::to(['model/index'])."#list_".$m->id)]) ?>"
                                    >禁用</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?= Url::to(['model/state', 'id' => $m->id,'state'=>1,'reqURL'=>(Url::to(['model/index'])."#list_".$m->id)]) ?>"
                                    >启动</a>
                                    <?php
                                }
                                ?>
                                <a href="<?=Url::to(['model/del', 'id' => $m->id,'state'=>1,'reqURL'=>(Url::to(['model/index']))]) ?>">删除</a>
                                <a href="<?=Url::to(['model/edit', 'id' => $m->id,'reqURL'=>(Url::to(['model/index'])."#list_".$m->id)]) ?>">编辑</a>
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
