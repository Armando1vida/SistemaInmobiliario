
<?php
Util::tsRegisterAssetJs('_form.js');
/** @var InmuebleController $this */
/** @var Inmueble $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'inmueble-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="span6">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-home"></i> <?php echo $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Update') ?> <?php echo Inmueble::label(); ?></h4>
<!--            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                a href="javascript:;" class="icon-remove"></a
            </span>-->
        </div>
        <div class="widget-body">

            <p class="note">
                <?php echo $form->errorSummary($model) ?>
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class='required'>*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?> 
            </p>

            <?php // echo $form->textFieldRow($model, 'cliente_propietario_id') ?>

            <?php // echo $form->textFieldRow($model, 'cliente_negocio_id') ?>

            <?php // echo $form->textFieldRow($model, 'direccion_id') ?>

            <?php // echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',), array('placeholder' => '')) ?>
            <div class="control-group">
                <label class="control-label" for="cliente_propietario_id">Propietario <span class='required'>*</span></label>
                <div class="controls  controls-row">
                    <div class="span8">
                        <?php
                        $listCliente = CHtml::listData(Cliente::model()->activos()->tipo(Cliente::TIPO_VENDEDOR)->findAll(), 'id', 'nombre_completo');
                        $this->widget(
                                'ext.bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => TRUE,
                            'name' => 'Inmueble[cliente_propietario_id]',
                            'data' => $listCliente,
                            'val' => $model->cliente_propietario_id,
                            'options' => array(
                                'placeholder' => 'Propietario',
                                'width' => '100%',
                            )
                                )
                        );
                        ?>
                        <?php echo $form->error($model, 'cliente_propietario_id'); ?>
                    </div>
                </div>
            </div>

            <?php echo $form->textFieldRow($model, 'precio', array('maxlength' => 10)) ?>

            <?php // echo $form->dropDownListRow($model, 'estado_inmueble', array('DISPONIBLE' => 'DISPONIBLE', 'VENDIDO' => 'VENDIDO', 'ARRENDADO' => 'ARRENDADO', 'RESERVADO' => 'RESERVADO',), array('placeholder' => '')) ?>

            <?php // echo $form->textFieldRow($model, 'fecha_publicacion') ?>


            <?php // echo $form->textFieldRow($model, 'fecha_negocio') ?>
            <?php echo $form->textFieldRow($model, 'numero_habitacion') ?>

            <?php echo $form->textFieldRow($model, 'numero_banio') ?>

            <?php echo $form->textFieldRow($model, 'numero_garage') ?>

            <?php echo $form->textFieldRow($model, 'descripcion', array('maxlength' => 500)) ?>
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

            <input id="archivosData"  type="hidden" name='Imagenes'></input>

            <div class="row-fluid">

                <div class="form-actions">
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
//                        'buttonType' => 'submit',
                        'type' => 'primary',
                        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                        'htmlOptions' => array(
                            'onclick' => 'js:guardarInmueble("' . CController::createUrl('/inmuebles/inmueble/create') . '")',
                        ),
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
<div class="span6">
    <div class="widget">
        <div class="widget-title">
            <h4><i class="icon-camera-retro"></i> Imagenes</h4>
<!--            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                a href="javascript:;" class="icon-remove"></a
            </span>-->
        </div>
        <div class="widget-body">

            <div class="row-fluid">

                <?php
                $this->widget('xupload.XUpload', array(
                    'model' => $archivos,
                    'url' => CController::createUrl('/inmuebles/inmuebleImagen/uploadTmp'),
                    'htmlOptions' => array('id' => 'archivo-form'),
                    'attribute' => 'file',
                    'pictures' => !$model->isNewRecord ? $model->inmuebleImagens : array(),
                    'multiple' => true,
                    'autoUpload' => true,
                    'options' => array(
                        'maxFileSize' => 2000000,
                        'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
                    )
                ))
                ?>


            </div>
        </div>
    </div>
</div>
