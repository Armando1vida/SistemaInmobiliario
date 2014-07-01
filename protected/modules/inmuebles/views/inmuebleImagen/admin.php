<?php
/** @var InmuebleImagenController $this */
/** @var InmuebleImagen $model */
$this->menu = array(
array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);

?>

<!-- BEGIN RECENT ORDERS PORTLET-->
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-tags"></i>  <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo InmuebleImagen::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div style="display: block;" class="widget-body">
            <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => 'inmueble-imagen-grid',
        'type' => ' table striped bordered hover advance',
        "template" => "{items}{summary}{pager}",
        'dataProvider' => $model->search(),
       //'filter' => $model,
        'columns' => array(
                    'nombre',
                        'ruta',
                        array(
                    'name' => 'inmueble_id',
                    'value' => 'isset($data->inmueble) ? $data->inmueble : null',
                    'filter' => CHtml::listData(Inmueble::model()->findAll(), 'id', Inmueble::representingColumn()),
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
