<?php

/** @var ClienteController $this */
/** @var Cliente $model */
$this->menu = array(
);
?>
<?php

echo $this->renderPartial('_form', array('model' => $model, 'modelDireccion' => $modelDireccion,
));
?>
