
<?php
/** @var InmuebleController $this */
/** @var Inmueble $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'inmueble-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="span6">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-home"></i> <?php echo $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Update') ?> <?php echo Inmueble::label(); ?></h4>
<!--            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                a href="javascript:;" class="icon-remove"></a
            </span>-->
        </div>
        <div class="widget-body">

            <p class="note">
                <?php echo $form->errorSummary($model) ?>
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class='required'>*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?> 
            </p>

            <?php // echo $form->textFieldRow($model, 'cliente_propietario_id') ?>

            <?php // echo $form->textFieldRow($model, 'cliente_negocio_id') ?>

            <?php // echo $form->textFieldRow($model, 'direccion_id') ?>

            <?php // echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',), array('placeholder' => '')) ?>


            <?php echo $form->textFieldRow($model, 'precio', array('maxlength' => 10)) ?>

            <?php // echo $form->dropDownListRow($model, 'estado_inmueble', array('DISPONIBLE' => 'DISPONIBLE', 'VENDIDO' => 'VENDIDO', 'ARRENDADO' => 'ARRENDADO', 'RESERVADO' => 'RESERVADO',), array('placeholder' => '')) ?>

            <?php // echo $form->textFieldRow($model, 'fecha_publicacion') ?>


            <?php // echo $form->textFieldRow($model, 'fecha_negocio') ?>
            <?php echo $form->textFieldRow($model, 'numero_habitacion') ?>

            <?php echo $form->textFieldRow($model, 'numero_banio') ?>

            <?php echo $form->textFieldRow($model, 'numero_garage') ?>

            <?php echo $form->textFieldRow($model, 'descripcion', array('maxlength' => 500)) ?>


            <div class="row-fluid">

                <div class="form-actions">
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'type' => 'primary',
                        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                    ));
                    ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        //'buttonType'=>'submit',
                        'label' => Yii::t('AweCrud.app', 'Cancel'),
                        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
                    ));
                    ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<div class="span6">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-camera-retro"></i> Imagenes</h4>
<!--            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                a href="javascript:;" class="icon-remove"></a
            </span>-->
        </div>
        <div class="widget-body">
            <?php
            $this->widget('ext.bootstrap.widgets.TbFileUpload', array(
                'url' => $this->createUrl("/inmuebles/inmuebleImagen/upload"),
                'model' => $modelImagen,
                'attribute' => 'picture', // see the attribute?
                'multiple' => true,
                'options' => array(
                    'maxFileSize' => 2000000,
                    'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
            )));
            ?>
            <?php
//            $formA = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
//                'id' => 'archivo-form',
//                'type' => 'vertical',
//                'enableAjaxValidation' => true,
//                'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
//                'enableClientValidation' => false,
//            ));
            ?>
            <?php
//            Util::checkAccess(array("action_nota_guardarNota")) ?
//                            $formA->widget('xupload.XUpload', array(
//                                'model' => $archivos,
//                                'url' => CController::createUrl('/inmueble/inmuebleImagen/uploadTmp'),
//                                'htmlOptions' => array('id' => 'archivo-form'),
//                                'attribute' => 'file',
//                                'multiple' => true,
//                                'autoUpload' => true
//                            )) : '';
            ?>
            <?php // $this->endWidget();  ?>


        </div>
    </div>
</div>