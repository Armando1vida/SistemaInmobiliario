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
        <h4><i class="icon-tags"></i>  <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Inmueble::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div style="display: block;" class="widget-body">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'inmueble-grid',
            'type' => ' table striped bordered hover advance',
            "template" => "{items}{summary}{pager}",
            'dataProvider' => $model->search(),
            //'filter' => $model,
            'columns' => array(
                'cliente_propietario_id',
                'cliente_negocio_id',
                'direccion_id',
                array(
                    'name' => 'estado',
                    'filter' => array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',),
                ),
                'precio',
                array(
                    'name' => 'estado_inmueble',
                    'filter' => array('DISPONIBLE' => 'DISPONIBLE', 'VENDIDO' => 'VENDIDO', 'ARRENDADO' => 'ARRENDADO', 'RESERVADO' => 'RESERVADO',),
                ),
                /*
                  'fecha_publicacion',
                  'fecha_actualizacion',
                  'fecha_negocio',
                  'numero_habitacion',
                  'numero_banios',
                  'numero_garage',
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
        ));
        ?>
    </div>
</div>
