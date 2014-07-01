<?php
/** @var InmuebleImagenController $this */
/** @var InmuebleImagen $model */

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
                                            'nombre',
                                'ruta',
                                array(
			'name' => 'inmueble_id',
			'value'=>($model->inmueble !== null) ? CHtml::link($model->inmueble, array('/inmueble/view', 'id' => $model->inmueble->id)).' ' : null,
			'type' => 'html',
		),
                ),
        )); ?>
    </div>
</div>