<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\erp\util\UserUtil;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>添加</h5></div>
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin();
                ?>
                <div class="card-block">
                    <script src="/js/pinyin.js"></script>
                    <script>
                        $(function () {
                            $("#menu-name").blur(function(){
                                $("#menu-ename").val(pinyin.getFullChars($("#menu-name").val()));
                            });
                        });
                    </script>

                    'name' => '姓名',
                    <?=$form->field($menu,'name')->textInput()?>
                    'birthday' => '出生日期',
                    <?=$form->field($menu,'birthday')->textInput()?>
                    'gender' => '性别',
                    'nation' => '民族',
                    'idnumber' => '身份证号',
                    'adress' => '身份证地址',
                    'createtime' => '创建时间',
                    'img1' => '身份证正面',
                    'img2' => '身份证反面',
                    'img3' => '手持身份证',

                    <?=$form->field($menu,'sort')->textInput()?>
                    <?=$form->field($menu,'name')->textInput()?>
                    <?=$form->field($menu,'ename')->textInput()?>
                    <?=$form->field($menu,'menu_pid')->dropDownList($option)?>
                    <?=$form->field($menu,'content')->textInput()?>
                    <?=$form->field($menu,'url')->textInput()?>
                    <?php
                    $platform_adminId = 0;
                    if($menu->admin_id!=0||$menu->admin_id!=null){
                        $platform_adminId=$menu->admin_id;
                        ?>
                        <p>当前目录管理员：<?=UserUtil::getUserNickname($platform_adminId)["nickname"]?></p>
                        <?php
                    }else{
                        ?>
                        <?=$form->field($menu,'admin_id')->textInput(['value'=>UserUtil::UserId()])?>
                        <?php
                    }
                    ?>
                    <?php
                    $platform_state = 0;
                    if($menu->state!=0||$menu->state!=null){
                        $platform_state=$menu->state;
                    }
                    ?>
                    <?=$form->field($menu,'state')->radioList(Yii::$app->params['platform']['state'][1],['value'=>$platform_state])?>
                </div>
                <div class="card-footer">
                    <?=Html::submitButton(' 提 交 ',["class"=>"btn btn-bg btn-primary"])?>
                    <?=Html::resetButton(' 取 消 ',["class"=>"btn btn-bg btn-danger"])?>
                </div>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>