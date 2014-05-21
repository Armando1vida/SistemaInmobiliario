<?php
/** @var ClienteController $this */
/** @var Cliente $model */

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Cliente::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
    //array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'itemOptions'=>array('class'=>'active')),
    //array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    //array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View'); ?> </legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
                  'tipo',
             'nombre',
             'apellido',
             'razon_social',
             'nombre_comercial',
             'celuda',
             'telefono',
             'celular',
             'email_1',
             'email_2',
             'descripcion',
             'estado',
             'fecha_creacion',
             'fecha_actualizacion',
             array(
			'name' => 'direccion_principal_id',
			'value'=>($model->direccionPrincipal !== null) ? CHtml::link($model->direccionPrincipal, array('/direccion/view', 'id' => $model->direccionPrincipal->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'direccion_secundaria_id',
			'value'=>($model->direccionSecundaria !== null) ? CHtml::link($model->direccionSecundaria, array('/direccion/view', 'id' => $model->direccionSecundaria->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'ciudad_id',
			'value'=>($model->ciudad !== null) ? CHtml::link($model->ciudad, array('/ciudad/view', 'id' => $model->ciudad->id)).' ' : null,
			'type' => 'html',
		),
	),
)); ?>
</fieldset>