<?php
/** @var InmuebleController $this */
/** @var Inmueble $data */
?>
<div class="view">
                    
        <?php if (!empty($data->cliente_propietario_id)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cliente_propietario_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cliente_propietario_id); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cliente_negocio_id)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cliente_negocio_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cliente_negocio_id); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->direccion_id)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('direccion_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->direccion_id); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->estado)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->estado); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->precio)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->precio); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->estado_inmueble)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('estado_inmueble')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->estado_inmueble); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fecha_publicacion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_publicacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha_publicacion, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fecha_publicacion)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fecha_actualizacion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha_actualizacion, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fecha_actualizacion)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fecha_negocio)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_negocio')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha_negocio, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fecha_negocio)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->numero_habitacion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('numero_habitacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->numero_habitacion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->numero_banios)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('numero_banios')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->numero_banios); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->numero_garage)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('numero_garage')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->numero_garage); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->descripcion); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>