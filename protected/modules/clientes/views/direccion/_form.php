
<?php
/** @var DireccionController $this */
/** @var Direccion $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
'type' => 'horizontal',
'id' => 'direccion-form',
'enableAjaxValidation' => true,
'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
'enableClientValidation' => false,
));?>
<div class="span12">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-book"></i> <?php echo $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Update')  ?> <?php echo  Direccion::label(); ?></h4>
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
                        <?php echo $form->dropDownListRow($model, 'cliente_id',count(Cliente::model()->findAll())? array(0 => ' -- Seleccione -- ') +CHtml::listData(Cliente::model()->findAll(), 'id', Cliente::representingColumn()):array(0=>' -- Ninguno -- ')) ?>
                                                
                                                        <?php echo $form->textFieldRow($model, 'calle_1', array('maxlength' => 128)) ?>
                    </div>
                                            
                                                    <div class="span12 ">
                        <?php echo $form->textFieldRow($model, 'calle_2', array('maxlength' => 128)) ?>
                                                
                                                        <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 8)) ?>
                    </div>
                                            
                                                    <div class="span12 ">
                        <?php echo $form->textAreaRow($model,'referencia',array('rows'=>3, 'cols'=>50)) ?>
                                                
                                                        <?php echo $form->dropDownListRow($model, 'barrio_id',count(Barrio::model()->findAll())? array(0 => ' -- Seleccione -- ') +CHtml::listData(Barrio::model()->findAll(), 'id', Barrio::representingColumn()):array(0=>' -- Ninguno -- ')) ?>
                    </div>
                                            
                                                    <div class="span12 ">
                        <?php echo $form->dropDownListRow($model, 'ciudad_id',count(Ciudad::model()->findAll())? array(0 => ' -- Seleccione -- ') +CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()):array(0=>' -- Ninguno -- ')) ?>
                                                            </div>                        <div class="row-fluid">

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