<?php
/** @var ClienteController $this */
/** @var Cliente $model */
$this->menu = array(
    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);
?>

<!-- BEGIN RECENT ORDERS PORTLET-->
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-user"></i>  <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Cliente::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div  class="widget-body form">
        <?php
        $this->widget('ext.Truulo.TruuloModuleSearch', array(
            'model' => $model,
            'grid_id' => 'cliente-grid',
        ));
        ?>
        <div style="display: block;">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'cliente-grid',
                'type' => 'striped bordered hover advance',
                "template" => "{items}{summary}{pager}",
                'dataProvider' => $model->activos()->search(),
//        'filter' => $model,
                'columns' => array(
//                    'nombre_completo',
                    array(
                        'name' => 'nombre_completo',
                        'header' => 'Nombre',
                        'value' => 'CHtml::link($data->nombre_completo, Yii::app()->createUrl("clientes/cliente/view",array("id"=>$data->id)))',
                        'type' => 'raw',
                    ),
                    array(
                        'name' => 'cedula',
                        'value' => '$data->cedula',
                        'type' => 'raw',
                    ),
//                'apellido',
//                'razon_social',
//                    'celuda',
                    'telefono',
                    'celular',
                    'email',
//                    'tipo',
                    /*
                      'telefono',
                      'celular',
                      'email_1',
                      'email_2',
                      array(
                      'name' => 'estado',
                      'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
                      ),
                      'fecha_creacion',
                      'fecha_actualizacion',
                      array(
                      'name' => 'direccion_principal_id',
                      'value' => 'isset($data->direccionPrincipal) ? $data->direccionPrincipal : null',
                      'filter' => CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()),
                      ),
                      array(
                      'name' => 'direccion_secundaria_id',
                      'value' => 'isset($data->direccionSecundaria) ? $data->direccionSecundaria : null',
                      'filter' => CHtml::listData(Direccion::model()->findAll(), 'id', Direccion::representingColumn()),
                      ),
                      array(
                      'name' => 'ciudad_id',
                      'value' => 'isset($data->ciudad) ? $data->ciudad : null',
                      'filter' => CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn()),
                      ),
                     */
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update} {delete} ',
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
