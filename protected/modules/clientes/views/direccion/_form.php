<div class="form">
    <?php
    /** @var DireccionController $this */
    /** @var Direccion $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'type' => 'horizontal',
        'id' => 'direccion-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
        'enableClientValidation' => true,
    ));?>

    <?php echo $form->errorSummary($model) ?>

    
        
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'calle_1', array('maxlength' => 128)) ?>
                    
                                <?php echo $form->textFieldRow($model, 'calle_2', array('maxlength' => 128)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 8)) ?>
                    
                                <?php echo $form->textAreaRow($model,'referencia',array('rows'=>3, 'cols'=>50)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->dropDownListRow($model, 'barrio_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Barrio::model()->findAll(), 'id', Barrio::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))) ?>
                        </div>        <div class="form-actions">
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