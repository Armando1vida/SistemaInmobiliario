<?php
/** @var ClienteController $this */
/** @var Cliente $model */
$this->menu = array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Cliente::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'itemOptions' => array('class' => 'active')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cliente-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Cliente::label(2) ?>    </legend>

    <div class="well">
        <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'cliente-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
            'tipo',
                'nombre',
                'apellido',
                'razon_social',
                'nombre_comercial',
                'celuda',
                    /*
                'telefono',
                'celular',
                'email_1',
                'email_2',
                array(
                    'name' => 'estado',
                    'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
                ),
                'fecha_creacion',
                'fecha_actualizacion',
                array(
                    'name' => 'direccion_principal_id',
                    'value' => 'isset($data->direccionPrincipal) ? $data->direccionPrincipal : null',
                    'filter' => CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()),
                ),
                array(
                    'name' => 'direccion_secundaria_id',
                    'value' => 'isset($data->direccionSecundaria) ? $data->direccionSecundaria : null',
                    'filter' => CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()),
                ),
                array(
                    'name' => 'ciudad_id',
                    'value' => 'isset($data->ciudad) ? $data->ciudad : null',
                    'filter' => CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()),
                ),
                */
    array(
    'class' => 'bootstrap.widgets.TbButtonColumn',
    'template' => '{view} {update}'
    ),
    ),
    )); ?>
    </div>
</fieldset>