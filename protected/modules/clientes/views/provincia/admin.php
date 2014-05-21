<?php
/** @var ProvinciaController $this */
/** @var Provincia $model */
$this->menu = array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Provincia::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'itemOptions' => array('class' => 'active')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('provincia-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Provincia::label(2) ?>    </legend>

    <div class="well">
        <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'provincia-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
            'nombre',
            array(
    'class' => 'bootstrap.widgets.TbButtonColumn',
    'template' => '{view} {update}'
    ),
    ),
    )); ?>
    </div>
</fieldset>