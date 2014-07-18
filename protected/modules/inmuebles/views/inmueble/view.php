<?php
/** @var InmuebleController $this */
/** @var Inmueble $model */
?>
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-home"></i> Informaci&oacute;n</h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>							
    </div>
    <div class="widget-body">
        <hr class="clearfix">
        <?php if (!empty($model->inmuebleImagens)): ?>
            <?php $this->beginWidget('ext.bootstrap.widgets.TbImageGallery'); ?>            
            <?php $i = 0; ?>
            <?php $j = 0; ?>
            <?php foreach ($model->inmuebleImagens as $image): ?>
                <?php $i++; ?>
                <?php $j++; ?>
                <?php if ($i == 1): ?>
                    <div class="row-fluid">
                    <?php endif; ?>
                    <div class="span2">
                        <div class="thumbnail">
                            <div class="item">
                                <a class="fancybox-button" title="<?php echo $image->nombre; ?>"  href="<?php echo $image->ruta ?>" data-gallery="gallery">
                                    <img   src="<?php echo $image->ruta; ?>" alt="Photo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php if ($i == 5 || $j == count($model->inmuebleImagens)): ?>
                    </div>
                    <div class="space10"></div>
                    <?php $i = 0; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php $this->endWidget(); ?>
        <?php else : ?>
            <div class=" hero-unit">
                <h1 class="text-center">Sin Im&aacute;genes</h1>
                <!--                
                                <p>Tagline</p>
                                <p>
                                    <a class="btn btn-primary btn-large">
                                        Learn more
                                    </a>
                                </p>-->
            </div>
        <?php endif; ?>
        <hr class="clearfix">
        <div class="contact-us">
            <h3>C&oacute;digo: <?php echo Util::number_pad($model->id, 10); ?></h3>
            <div class="row-fluid">
                <div class="span4">
                    <h4>Detalle</h4>
                    <p>
                        <strong>Estado :</strong> <?php echo $model->estadoinmuebleformato; ?><br>
                        <strong>Precio :</strong> <?php echo $model->precio; ?><br>
                        <strong>Num. habitaciones :</strong> <?php echo $model->numero_habitacion; ?><br>
                        <strong>Num. baños :</strong> <?php echo $model->numero_banio; ?><br>
                        <strong>Num. garage :</strong> <?php echo $model->numero_garage; ?><br>
                        <strong>Descripci&oacute;n :</strong> <?php echo $model->descripcion; ?><br>
                    </p>
                </div>
                <div class="span4">
                    <h4>Ubicaci&oacute;n</h4>
                    <?php if (!$modelDireccion->isNewRecord): ?>
                        <p>
                            <strong>Direcci&oacute;n:</strong> <?php echo $modelDireccion->direccionConFormato; ?><br>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="span4">
                    <h4>Propietario</h4>
                    <p> <strong>Nombre:</strong> <?php echo $model->cliente_propietario; ?><br>
                        <strong>Tel&eacute;fono :</strong> <?php echo $model->cliente_propietario->telefono; ?><br>
                        <strong>Celular :</strong> <?php echo $model->cliente_propietario->celular; ?><br>
                        <strong>E-mail :</strong> <?php echo $model->cliente_propietario->email; ?><br>
                </div>
            </div>
            <div class="space20"></div>
        </div>
        <br>
        <?php // echo Chtml::link('<i class="icon-edit-sign"></i> Actualizar', array('update', 'id' => $model->id), array('class' => 'btn')); ?>
        <?php if ((!Yii::app()->user->isSuperAdmin) && Yii::app()->user->checkAccess('operador')) : ?>
            <a class="btn" href="/SistemaInmobiliario/inmuebles/inmueble/update?id=<?php echo $model->id ?>"><i class="icon-edit-sign"></i> Actualizar</a>
        <?php endif; ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            //'buttonType'=>'submit',
            'label' => Yii::t('AweCrud.app', 'Regresar'),
            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
        ));
        ?>
    </div> 

</div>



