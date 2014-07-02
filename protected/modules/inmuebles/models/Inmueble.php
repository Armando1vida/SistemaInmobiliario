<?php

Yii::import('inmuebles.models._base.BaseInmueble');

class Inmueble extends BaseInmueble {

    /**
     * @return Inmueble
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Inmueble|Inmuebles', $n);
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'numero_banio' => Yii::t('app', 'Numero de baños'),
            'numero_habitacion' => Yii::t('app', 'Numero de habitaciones'),
            'numero_garage' => Yii::t('app', 'Numero de garages'),
            'descripcion' => Yii::t('app', 'Descripción'),
        ));
    }

}
