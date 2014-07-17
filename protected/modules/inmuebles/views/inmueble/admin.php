<?php
/** @var InmuebleController $this */
/** @var Inmueble $model */
$this->menu = array(
    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);
?>

<!-- BEGIN RECENT ORDERS PORTLET-->
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-home"></i>  <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Inmueble::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body form">
        <?php
        $this->widget('ext.Truulo.TruuloModuleSearch', array(
            'model' => $model,
            'grid_id' => 'inmueble-grid',
        ));
        ?>
        <div style="display: block;">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'inmueble-grid',
                'type' => ' table striped bordered hover advance',
                "template" => "{items}{summary}{pager}",
                'dataProvider' => $model->activos()->search(),
                //'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'id',
                        'value' => 'CHtml::link(Util::number_pad($data->id, 7), Yii::app()->createUrl("inmuebles/inmueble/view",array("id"=>$data->id)))',
                        'type' => 'raw',
                    ),
                    array(
                        'name' => 'cliente_propietario_id',
                        'value' => '$data->cliente_propietario',
                    ),
//                'cliente_negocio_id',
//                'direccion_id',
//                array(
//                    'name' => 'estado',
//                    'filter' => array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',),
//                ),
                    'precio',
                    array(
                        'name' => 'estado_inmueble',
//                    'filter' => array('DISPONIBLE' => 'DISPONIBLE', 'VENDIDO' => 'VENDIDO', 'ARRENDADO' => 'ARRENDADO', 'RESERVADO' => 'RESERVADO',),
                    ),
//                  'fecha_publicacion',
//                  'fecha_actualizacion',
//                  'fecha_negocio',
                    array(
                        'name' => 'numero_habitacion',
                        'header' => 'Num. habitación',
                        'value' => '$data->numero_habitacion',
                        'type' => 'raw',
                    ),
                    array(
                        'name' => 'numero_banio',
                        'header' => 'Num. baños',
                        'value' => '$data->numero_banio',
                        'type' => 'raw',
                    ),
                    array(
                        'name' => 'numero_garage',
                        'header' => 'Num. garage',
                        'value' => '$data->numero_garage',
                        'type' => 'raw',
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update} {delete}',
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
            ));
            ?>
        </div>
    </div>
</div>
