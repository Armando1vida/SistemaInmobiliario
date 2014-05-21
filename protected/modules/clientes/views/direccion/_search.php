<?php
/** @var DireccionController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
                <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'id'); ?>
                                <?php echo $form->textFieldRow($model, 'calle_1', array('maxlength' => 128)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'calle_2', array('maxlength' => 128)); ?>
                                <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 8)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textAreaRow($model,'referencia',array('rows'=>3, 'cols'=>50)); ?>
                                <?php echo $form->dropDownListRow($model, 'barrio_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Barrio::model()->findAll(), 'id', Barrio::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>
        </div>
        <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
