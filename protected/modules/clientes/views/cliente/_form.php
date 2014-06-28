
<?php
Util::tsRegisterAssetJs('_form.js');
/** @var ClienteController $this */
/** @var Cliente $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'cliente-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => true,
        ));
?>
<div class="span12">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-book"></i> <?php echo $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Update') ?> <?php echo Cliente::label(); ?></h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <!--<a href="javascript:;" class="icon-remove"></a>-->
            </span>
        </div>
        <div class="widget-body">
            <p class="note">
                <?php echo $form->errorSummary($model) ?>
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class='required'>*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?> 
            </p>

            <?php echo $form->dropDownListRow($model, 'tipo', array(null => '-- Seleccione --') + $model->tipos, array('class' => 'span5 fix')) ?>

            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>

            <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 64)) ?>

            <?php echo $form->textFieldRow($model, 'razon_social', array('maxlength' => 64)) ?>

            <?php echo $form->textFieldRow($model, 'cedula', array('maxlength' => 20)) ?>

            <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24)) ?>

            <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24)) ?>

            <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 255)) ?>

            <?php // echo $form->textFieldRow($model, 'calle_1', array('maxlength' => 255)) ?>

            <?php // echo $form->textFieldRow($model, 'calle_2', array('maxlength' => 255)) ?>

            <?php // echo $form->textFieldRow($model, 'numero', array('maxlength' => 255)) ?>
            <div class="control-group">
                <div class="control-group">
                    <label class="control-label">Dirección</label>
                    <div class="controls">
                        <?php echo $form->textField($modelDireccion, 'calle_1', array('maxlength' => 255, 'class' => 'span8', 'placeholder' => 'Calle Principal')) ?>  
                    </div>
                </div>
                <div class="control-group" >
                    <div class="controls controls-row">
                        <?php echo $form->textField($modelDireccion, 'calle_2', array('maxlength' => 255, 'class' => 'span8', 'placeholder' => 'Calle Secundaria')) ?>  
                    </div>
                </div>
                <div class="control-group" >
                    <div class="controls controls-row">
                        <?php echo $form->textField($modelDireccion, 'numero', array('maxlength' => 255, 'class' => 'span4', 'placeholder' => 'Número')) ?>  
                        <div class="span4">

                            <?php
                            $provincias_list = !$modelDireccion->ciudad_id ? array(0 => '- Provincia -') + CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre') :
                                    array($modelDireccion->ciudad->provincia->id => $modelDireccion->ciudad->provincia->nombre) + CHtml::listData(
                                            Provincia::model()->findAll(array(
                                                "condition" => "id !=:id",
                                                "order" => "nombre",
                                                "params" => array(':id' => $modelDireccion->ciudad->provincia->id)
                                            )), 'id', 'nombre');
                            $this->widget(
                                    'bootstrap.widgets.TbSelect2', array(
                                'asDropDownList' => TRUE,
                                'model' => $modelDireccion,
                                'name' => 'Direccion[provincia_id]',
                                'data' => $provincias_list,
                                'val' => $modelDireccion->ciudad_id ? $modelDireccion->ciudad->provincia->id : 0,
                                'options' => array(
                                    'placeholder' => 'Provincias',
                                    'width' => '100%',
                                )
                                    )
                            );
                            ?>
                            <?php echo $form->error($modelDireccion, 'provincia_id'); ?>
                        </div>
                    </div>
                </div>
                <div class="control-group" >
                    <div class="controls controls-row">
                        <div class="span4">
                            <?php
                            $lista_ciudad = !$modelDireccion->ciudad_id ? array(0 => '- Ninguno -') : array($modelDireccion->ciudad->id => $modelDireccion->ciudad->nombre) + CHtml::listData(
                                            Ciudad::model()->findAll(array(
                                                "condition" => "provincia_id =:provincia_id AND id!=:id",
                                                "order" => "nombre",
                                                "params" => array(':provincia_id' => $modelDireccion->ciudad->provincia->id,
                                                    ':id' => $modelDireccion->ciudad->id)
                                            )), 'id', 'nombre');
                            $this->widget(
                                    'bootstrap.widgets.TbSelect2', array(
                                'asDropDownList' => TRUE,
                                'name' => 'Direccion[ciudad_id]',
                                'model' => $modelDireccion,
                                'val' => $modelDireccion->ciudad_id ? $modelDireccion->ciudad->id : 0,
                                'data' => $lista_ciudad,
                                'options' => array(
                                    'placeholder' => 'Ciudades',
                                    'width' => '100%',
                                )
                                    )
                            );
                            ?>

                            <?php echo $form->error($modelDireccion, 'ciudad_id'); ?>
                        </div>
                        <div class="span4">
                            <?php
                            $lista_barrio = !$modelDireccion->barrio_id ? array(0 => '- Ninguno -') : array(0 => '- Barrio -') + CHtml::listData(
                                            Barrio::model()->findAll(array(
                                                "condition" => "ciudad_id =:ciudad_id",
                                                "order" => "nombre",
                                                "params" => array(':ciudad_id' => $modelDireccion->ciudad->id)
                                            )), 'id', 'nombre');
                            $this->widget(
                                    'bootstrap.widgets.TbSelect2', array(
                                'asDropDownList' => TRUE,
                                'name' => 'Direccion[barrio_id]',
                                'model' => $modelDireccion,
                                'data' => $lista_barrio,
                                'val' => $modelDireccion->barrio_id ? $modelDireccion->barrio_id : 0,
                                'options' => array(
                                    'placeholder' => 'Barrios',
                                    'width' => '100%',
                                )
                                    )
                            );
                            ?>

                            <?php echo $form->error($modelDireccion, 'barrio_id'); ?>
                        </div>
                    </div>
                </div>
                <div class="control-group" >
                    <div class="controls controls-row">
                        <?php echo $form->textArea($modelDireccion, 'referencia', array('rows' => 5, 'cols' => 500, 'class' => 'span8', 'placeholder' => 'Referencia')) ?>

                    </div>
                </div>
            </div>  

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

    </div>
</div>
</div>
<?php $this->endWidget(); ?>
