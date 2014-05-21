<?php
/** @var ClienteController $this */
/** @var Cliente $data */
?>
<div class="view">
                    
        <?php if (!empty($data->tipo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tipo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->apellido)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->apellido); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->razon_social)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->razon_social); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->nombre_comercial)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_comercial')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombre_comercial); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->celuda)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('celuda')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->celuda); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->telefono)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->telefono); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->celular)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->celular); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->email_1)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email_1')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->email_1); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->email_2)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email_2')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->email_2); ?>
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
                
        <?php if (!empty($data->fecha_creacion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha_creacion, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fecha_creacion)); ?>
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
                
        <?php if (!empty($data->direccionPrincipal->calle_1)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('direccion_principal_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->direccionPrincipal->calle_1); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->direccionSecundaria->calle_1)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('direccion_secundaria_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->direccionSecundaria->calle_1); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ciudad->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ciudad->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>