<?php
/** @var CiudadController $this */
/** @var Ciudad $model */

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
                                array(
			'name' => 'provincia_id',
			'value'=>($model->provincia !== null) ? CHtml::link($model->provincia, array('/provincia/view', 'id' => $model->provincia->id)).' ' : null,
			'type' => 'html',
		),
                ),
        )); ?>
    </div>
</div>