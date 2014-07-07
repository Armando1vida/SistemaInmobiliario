<?php

/** @var InmuebleController $this */
/** @var Inmueble $model */
$this->menu = array(
);
?>


<?php

echo $this->renderPartial('_form', array(
    'model' => $model,
    'modelDireccion' => $modelDireccion,
    'archivos' => $archivos,
));
?>
