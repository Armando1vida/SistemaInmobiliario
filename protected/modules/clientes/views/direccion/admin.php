<?php
/** @var DireccionController $this */
/** @var Direccion $model */
$this->menu = array(
array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);

?>

<!-- BEGIN RECENT ORDERS PORTLET-->
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-tags"></i>  <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Direccion::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div style="display: block;" class="widget-body">
            <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => 'direccion-grid',
        'type' => ' table striped bordered hover advance',
        "template" => "{items}{summary}{pager}",
        'dataProvider' => $model->search(),
       //'filter' => $model,
        'columns' => array(
                    array(
                    'name' => 'cliente_id',
                    'value' => 'isset($data->cliente) ? $data->cliente : null',
                    'filter' => CHtml::listData(Cliente::model()->findAll(), 'id', Cliente::representingColumn()),
                ),
                        'calle_1',
                        'calle_2',
                        'numero',
                        'referencia',
                        array(
                    'name' => 'barrio_id',
                    'value' => 'isset($data->barrio) ? $data->barrio : null',
                    'filter' => CHtml::listData(Barrio::model()->findAll(), 'id', Barrio::representingColumn()),
                ),
                            /*
                        array(
                    'name' => 'ciudad_id',
                    'value' => 'isset($data->ciudad) ? $data->ciudad : null',
                    'filter' => CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()),
                ),
                        */
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
