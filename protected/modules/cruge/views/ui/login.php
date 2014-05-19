<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <div class="alert alert-error">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>
    </div>
<?php else: ?>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'logon-form',
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <div class="lock">
        <i class="icon-lock"></i>
    </div>

    <div class="control-wrap">
        <h4>User Login</h4>
        <div class="control-group">
            <div class="controls">
                <?php echo $form->error($model, 'username'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <?php echo $form->textField($model, 'username', array('placeholder' => CrugeTranslator::t('logon', 'Username'))); ?>

                </div>
            </div>

        </div>
        <div class="control-group">
            <div class="controls">
                <?php echo $form->error($model, 'password'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span>
                    <?php echo $form->passwordField($model, 'password', array('placeholder' => Yii::t('app', CrugeTranslator::t('logon', "Password")))); ?>
                </div>
            </div>

            <div class="mtop10">
                <div class="block-hint pull-left small">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?> Recordarme más tarde
                </div>
                <div class="block-hint pull-right">
                    <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
                </div>
            </div>
            <div class="clearfix space5"></div>
        </div>
    </div>
    <button type="submit" id="login-btn" class="btn btn-block login-btn">
        <?php echo CrugeTranslator::t('logon', "Login") ?>
        <i class=" icon-long-arrow-right"></i>
    </button>

    <?php
    /* if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
      echo Yii::app()->user->ui->registrationLink; */
    ?>
    <?php
    //	si el componente CrugeConnector existe lo usa:
    //
        if (Yii::app()->getComponent('crugeconnector') != null) {
        if (Yii::app()->crugeconnector->hasEnabledClients) {
            ?>
            <div class='crugeconnector'>
                <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                <ul>
                    <?php
                    $cc = Yii::app()->crugeconnector;
                    foreach ($cc->enabledClients as $key => $config) {
                        $image = CHtml::image($cc->getClientDefaultImage($key));
                        echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
    }
    ?>


    <?php $this->endWidget(); ?>
<?php endif; ?>
