
<?php
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

            <?php echo $form->textFieldRow($model, 'celuda', array('maxlength' => 20)) ?>

            <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24)) ?>

            <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24)) ?>

            <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 255)) ?>

            <?php echo $form->textFieldRow($model, 'calle_1', array('maxlength' => 255)) ?>

            <?php echo $form->textFieldRow($model, 'calle_2', array('maxlength' => 255)) ?>

            <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 255)) ?>
            <div class="control-group">
                <label class="control-label" for="direccion">Dirección</label>
                <div class="controls">
                    <div class="controls-row">
                        
                    </div>
                    <div class="controls-row">
                        
                    </div>
                    <div class="controls-row">
                        
                    </div>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Cliente_provincia_id">Provincia</label>
                <div class="controls  controls-row">
                    <div class="span4">
                        <?php
                        $listProvincia = CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre');
                        $this->widget(
                                'bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => TRUE,
                            'name' => 'provincia_id',
                            'data' => count($listProvincia) != 0 ? $listProvincia : null,
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
            <div class="control-group">
                <label class="control-label" for="Cliente_ciudad_id">Ciudad</label>
                <div class="controls  controls-row">
                    <div class="span4">
                        <?php
                        $this->widget(
                                'bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => TRUE,
                            'name' => 'ciudad_id',
                            'data' => null,
                            'options' => array(
                                'placeholder' => 'Ciudades',
                                'width' => '100%',
                            )
                                )
                        );
                        ?>

                        <?php echo $form->error($model, 'ciudad_id'); ?>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="Cliente_barrio_id">Barrio</label>
                <div class="controls  controls-row">
                    <div class="span4">
                        <?php
//        
                        $this->widget(
                                'bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => TRUE,
                            'name' => 'barrio_id',
                            'data' => null,
                            'options' => array(
                                'placeholder' => 'Barrios',
                                'width' => '100%',
                            )
                                )
                        );
                        ?>

                        <?php echo $form->error($model, 'barrio_id'); ?>
                    </div>
                </div>
            </div>

            <div class="controls-row">
                <?php echo $form->textAreaRow($model, 'referencia', array('rows' => 5, 'cols' => 200)) ?>
            </div>
            <?php // echo $form->textAreaRow($model, 'descripcion', array('rows' => 3, 'cols' => 50)) ?>

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
