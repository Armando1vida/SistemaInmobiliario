
<?php
/** @var CiudadController $this */
/** @var Ciudad $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'ciudad-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => true,
        ));
?>
<div class="span12">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-book"></i> <?php echo $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Update') ?> <?php echo Ciudad::label(); ?></h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <!--a href="javascript:;" class="icon-remove"></a-->
            </span>
        </div>
        <div class="widget-body">
            <p class="note">
                <?php echo $form->errorSummary($model) ?>
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class='required'>*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?> 
            </p>



            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32)) ?>

            <?php // echo $form->dropDownListRow($model, 'provincia_id', array(0 => ' -- Seleccione -- ') + CHtml::listData(Provincia::model()->findAll(), 'id', Provincia::representingColumn())) ?>
            <div class="control-group">
                <label class="control-label" for="Ciudad_provincia_id">Provincia <span class="required">*</span></label>
                <div class="controls  controls-row">
                    <div class="span4">
                        <?php
                        $listProvincia = CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre');
                        $this->widget('bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => TRUE,
                            'name' => 'Ciudad[provincia_id]',
                            'data' => $listProvincia,
                            'val' => $model->provincia_id,
                            'options' => array(
                                'placeholder' => 'Provincias',
                                'width' => '100%',
                            )
                                )
                        );
                        ?>
                        <?php echo $form->error($model, 'provincia_id'); ?>
                    </div>
                </div>
            </div>
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


