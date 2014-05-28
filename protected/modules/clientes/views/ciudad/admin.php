<?php
/** @var CiudadController $this */
/** @var Ciudad $model */
$this->menu = array(
array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);

?>

<!-- BEGIN RECENT ORDERS PORTLET-->
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-tags"></i>  <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Ciudad::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div style="display: block;" class="widget-body">
            <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => 'ciudad-grid',
        'type' => ' table striped bordered hover advance',
        "template" => "{items}{summary}{pager}",
        'dataProvider' => $model->search(),
       //'filter' => $model,
        'columns' => array(
                    'nombre',
                        array(
                    'name' => 'provincia_id',
                    'value' => 'isset($data->provincia) ? $data->provincia : null',
                    'filter' => CHtml::listData(Provincia::model()->findAll(), 'id', Provincia::representingColumn()),
                ),
                    array(
        'class' => 'CButtonColumn',
        'template' => '{delete} {update}',
        'buttons' => array(
        'update' => array(
        'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
        'options' => array('title' => 'Actualizar'),
        'imageUrl' => false,
        ),
        'delete' => array(
        'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
        'options' => array('title' => 'Eliminar'),
        'imageUrl' => false,
        ),
        ),
        'htmlOptions' => array(
        'width' => '80px'
        )



        ),
        ),
        )); ?>
    </div>
</div>
