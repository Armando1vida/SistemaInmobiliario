<?php
/** @var ClienteController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
                <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'id'); ?>
                                <?php echo $form->textFieldRow($model, 'tipo', array('maxlength' => 0)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)); ?>
                                <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 64)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'razon_social', array('maxlength' => 64)); ?>
                                <?php echo $form->textFieldRow($model, 'nombre_comercial', array('maxlength' => 64)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'celuda', array('maxlength' => 20)); ?>
                                <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24)); ?>
                                <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255)); ?>
                                <?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',)); ?>
                                <?php echo $form->textFieldRow($model, 'fecha_creacion'); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'fecha_actualizacion'); ?>
                                <?php echo $form->dropDownListRow($model, 'direccion_principal_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->dropDownListRow($model, 'direccion_secundaria_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>
                                <?php echo $form->dropDownListRow($model, 'ciudad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>
        </div>
        <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
