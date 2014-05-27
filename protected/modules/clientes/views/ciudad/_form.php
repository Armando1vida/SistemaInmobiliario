<div class="form">
    <?php
    /** @var CiudadController $this */
    /** @var Ciudad $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'type' => 'horizontal',
        'id' => 'ciudad-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
        'enableClientValidation' => false,
    ));?>

    <?php echo $form->errorSummary($model) ?>

    
        
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32)) ?>
                    
                                <?php echo $form->dropDownListRow($model, 'provincia_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Provincia::model()->findAll(), 'id', Provincia::representingColumn())) ?>
            </div>
                                <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>