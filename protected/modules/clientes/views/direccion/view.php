<?php
/** @var DireccionController $this */
/** @var Direccion $model */

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
                                            array(
			'name' => 'cliente_id',
			'value'=>($model->cliente !== null) ? CHtml::link($model->cliente, array('/cliente/view', 'id' => $model->cliente->id)).' ' : null,
			'type' => 'html',
		),
                                'calle_1',
                                'calle_2',
                                'numero',
                                'referencia',
                                array(
			'name' => 'barrio_id',
			'value'=>($model->barrio !== null) ? CHtml::link($model->barrio, array('/barrio/view', 'id' => $model->barrio->id)).' ' : null,
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