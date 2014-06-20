<?php

Yii::import('clientes.models._base.BaseCiudad');

class Ciudad extends BaseCiudad {

    /**
     * @return Ciudad
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Ciudad|Ciudades', $n);
    }

    public function rules() {
        return array(
            array('nombre,provincia_id ', 'required'),
//            array('provincia_id', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 32),
            array('provincia_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombre, provincia_id', 'safe', 'on' => 'search'),
        );
    }

}
