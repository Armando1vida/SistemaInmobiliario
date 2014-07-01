<?php
/** @var InmuebleController $this */
/** @var Inmueble $model */
$this->menu = array(
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
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'cliente_propietario_id',
                'cliente_negocio_id',
                'direccion_id',
                'estado',
                'precio',
                'estado_inmueble',
                'fecha_publicacion',
                'fecha_actualizacion',
                'fecha_negocio',
                'numero_habitacion',
                'numero_banios',
                'numero_garage',
                'descripcion',
            ),
        ));
        ?>
    </div>
</div>