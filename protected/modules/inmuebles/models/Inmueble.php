<?php

Yii::import('inmuebles.models._base.BaseInmueble');

class Inmueble extends BaseInmueble {

    //ESTADO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    //INMUEBLE_ESATDO   : DISPONIBLE,VENDIDO,ARRENDADO,RESERVADO
    const ESTADO_DISPONIBLE = 'DISPONIBLE';
    const ESTADO_VENDIDO = 'VENDIDO';
    const ESTADO_ARRENDADO = 'ARRENDADO';
    const ESTADO_RESERVADO = 'RESERVADO';

    /**
     * @return Inmueble
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function relations() {
        return array(
            'direccions' => array(self::HAS_MANY, 'Direccion', 'entidad_id',
                'condition' => 'entidad_tipo = "inmueble"',
            ),
            'inmuebleImagens' => array(self::HAS_MANY, 'InmuebleImagen', 'inmueble_id'),
        );
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
