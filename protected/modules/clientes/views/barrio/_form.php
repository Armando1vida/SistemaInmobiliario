
<?php
/** @var BarrioController $this */
/** @var Barrio $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
'type' => 'horizontal',
'id' => 'barrio-form',
'enableAjaxValidation' => false,
'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
'enableClientValidation' => true,
));?>
<div class="span12">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-book"></i> <?php echo $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Update')  ?> <?php echo  Barrio::label(); ?></h4>
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

            
                
                                                    <div class="span12 ">
                        <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32)) ?>
                                                
                                                        <?php echo $form->dropDownListRow($model, 'ciudad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn())) ?>
                    </div>
                                                                                <div class="row-fluid">

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
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>