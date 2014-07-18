<?php Util::tsRegisterAssetJs('galery.js');?>
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-home"></i> Inmuebles</h4>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('ext.bootstrap.widgets.TbGridView', array(
            'id' => 'inmueble-grid',
            "template" => "{items}{summary}{pager}",
            'dataProvider' => $model->activos()->disponibles()->searchgalegy(),
            'columns' => array(
                array(
                    'value' => '$data->generateview()',
                    'type' => 'raw',
                ),
            ),
        ));
        ?>
    </div>
</div>