<?php
/** @var ClienteController $this */
/** @var Cliente $model */
$this->pageTitle = $model->nombre_completo;
?>

<div class="row-fluid">
    <div class="span12">
        <h1 class="name-title"><i class="icon-user"></i> <?php echo $model->nombre_completo ?></h1>
    </div>
</div>

<div class="widget green">
    <div class="widget-title">
        <h4><i class="icon-info-sign"></i><?php echo ' ' . Yii::t('AweCrud.app', 'View'); ?> </h4>
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
                'tipo',
//                'nombre',
//                'apellido',
                'nombre_completo',
                'razon_social',
                'nombre_comercial',
                'celuda',
                'telefono',
                'celular',
                'email_1',
                'email_2',
                'descripcion',
//                'estado',
//                'fecha_creacion',
//                'fecha_actualizacion',
                array(
                    'name' => 'Dirección',
                    'value' => (isset($model->direccions[0])) ? $model->direccions[0]->direccionConFormato : null,
                    'type' => 'raw',
                ),
            ),
        ));
        ?>
        <br>
        <?php echo Chtml::link('<i class="icon-edit-sign"></i> Actualizar', array('update', 'id' => $model->id), array('class' => 'btn')); ?>

    </div>
</div>