<?php
/** @var CiudadController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
                <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'id'); ?>
                                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->dropDownListRow($model, 'provincia_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Provincia::model()->findAll(), 'id', Provincia::representingColumn())); ?>
            </div><div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
