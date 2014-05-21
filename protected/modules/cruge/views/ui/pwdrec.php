<?php if (Yii::app()->user->hasFlash('pwdrecflash')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('pwdrecflash'); ?>
    </div>
<?php else: ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pwdrcv-form',
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
        <h4>Recuperar contraseña</h4>
        <div class="control-group">
            <div class="controls">
                <?php echo $form->error($model, 'username'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <?php echo $form->textField($model, 'username', array('placeholder' => CrugeTranslator::t('logon', 'Username'))); ?>

                </div>
            </div>
        </div>
        <p></p>
        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                        <?php
                        $this->widget('CCaptcha', array(
                            'buttonLabel' => '<i class="icon-refresh"></i>'
                        ));
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <p></p>

        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                        <?php echo $form->passwordField($model, 'verifyCode', array('placeholder' => Yii::t('app', CrugeTranslator::t("Código de verificación")))); ?>
                        <div class="hint"><?php echo CrugeTranslator::t("Ingrese los caracteres que se muestran."); ?></div>
                        <?php echo $form->error($model, 'verifyCode'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" id="login-btn" class="btn btn-block login-btn">
        <?php echo CrugeTranslator::t('logon', "Recuperar Contraseña") ?>
        <!--<i class=" icon-long-arrow-right"></i>-->
    </button>
    <!--    <div class="metro single-size terques login">
            <button type="submit" class="btn login-btn">
    <?php // echo CrugeTranslator::t('logon', "Recuperar Contraseña") ?>
                <i class=" icon-long-arrow-right"></i>
            </button>
        </div>-->

    <?php // if (CCaptcha::checkRequirements()): ?>
    <!--        <div class="metro single-size red">
                <div class="input-append lock-input captcha">
    <?php
    $this->widget('CCaptcha', array(
        'buttonLabel' => '<i class="icon-refresh"></i>'
    ));
    ?>
                </div>
            </div>-->
    <?php // endif; ?>

    <?php // if (CCaptcha::checkRequirements()): ?>
    <!--        <div class="metro double-size yellow">
                <div class="input-append lock-input">
    <?php echo $form->passwordField($model, 'verifyCode', array('placeholder' => Yii::t('app', CrugeTranslator::t("Código de verificación")))); ?>
                    <div class="hint"><?php echo CrugeTranslator::t("Ingrese los caracteres que se muestran."); ?></div>
    <?php echo $form->error($model, 'verifyCode'); ?>
                </div>
            </div>-->
    <?php // endif; ?>



    <?php $this->endWidget(); ?>
<?php endif; ?>