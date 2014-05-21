<?php
/** @var BarrioController $this */
/** @var Barrio $model */
$this->menu = array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Barrio::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'itemOptions' => array('class' => 'active')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('barrio-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Barrio::label(2) ?>    </legend>

    <div class="well">
        <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'barrio-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
            'nombre',
                array(
                    'name' => 'ciudad_id',
                    'value' => 'isset($data->ciudad) ? $data->ciudad : null',
                    'filter' => CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()),
                ),
            array(
    'class' => 'bootstrap.widgets.TbButtonColumn',
    'template' => '{view} {update}'
    ),
    ),
    )); ?>
    </div>
</fieldset>