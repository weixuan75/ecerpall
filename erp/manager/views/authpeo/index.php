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
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <?php foreach($models as $model): ?>
                        <div class="col-sm-4">
                            <div class="contact-box">
                                <a href="profile.html">
                                    <div class="col-sm-4">
                                        <div class="text-center">
                                            <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a2.jpg">
                                            <div class="m-t-xs font-bold">CTO</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <h3><strong>奔波儿灞</strong></h3>
                                        <p><i class="fa fa-map-marker"></i> 甘肃·兰州</p>
                                        <address>
                                            <strong>Baidu, Inc.</strong><br>
                                            E-mail:xxx@baidu.com<br>
                                            Weibo:<a href="">http://weibo.com/xxx</a><br>
                                            <abbr title="Phone">Tel:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
