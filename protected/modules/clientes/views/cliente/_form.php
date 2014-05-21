<div class="form">
    <?php
    /** @var ClienteController $this */
    /** @var Cliente $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'type' => 'horizontal',
        'id' => 'cliente-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
        'enableClientValidation' => true,
    ));?>

    <?php echo $form->errorSummary($model) ?>

    
        
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'tipo', array('maxlength' => 0)) ?>
                    
                                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 64)) ?>
                    
                                <?php echo $form->textFieldRow($model, 'razon_social', array('maxlength' => 64)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'nombre_comercial', array('maxlength' => 64)) ?>
                    
                                <?php echo $form->textFieldRow($model, 'celuda', array('maxlength' => 20)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24)) ?>
                    
                                <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255)) ?>
                    
                                <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255)) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50)) ?>
                    
                                <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',)) ?>
            </div>
                    
        
        
                            <div class="span12 ">
                <?php echo $form->dropDownListRow($model, 'direccion_principal_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))) ?>
                    
                                <?php echo $form->dropDownListRow($model, 'direccion_secundaria_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))) ?>
            </div>
                    
                            <div class="span12 ">
                <?php echo $form->dropDownListRow($model, 'ciudad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))) ?>
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