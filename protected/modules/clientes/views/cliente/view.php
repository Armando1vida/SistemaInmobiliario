<?php
/** @var ClienteController $this */
/** @var Cliente $model */

$this->menu=array(
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'icon-tags', 'url' => array('admin')),
array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);
?>


<div class="widget green">
    <div class="widget-title">
        <h4><i class="icon-eye-open"></i><?php echo Yii::t('AweCrud.app', 'View'); ?> </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
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
    </div>
</div>