<?php

Yii::import('clientes.models._base.BaseDireccion');

class Direccion extends BaseDireccion {

    /**
     * @return Direccion
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Direccion|Direccions', $n);
    }

    public function getDireccionConFormato() {
        $direccion = '';
        if ($this->calle_1)
            $direccion .= $this->calle_1;
        if ($this->calle_2)
            $direccion .= ' y ' . $this->calle_2;
        if ($this->numero)
            $direccion .= ', ' . $this->numero;
        if ($this->ciudad)
            $direccion .= '<br>' . $this->ciudad->provincia;
        if ($this->ciudad)
            $direccion .= ' - ' . $this->ciudad;
        if ($this->barrio)
            $direccion .= ' - ' . $this->barrio;

        return $direccion;
    }

}
