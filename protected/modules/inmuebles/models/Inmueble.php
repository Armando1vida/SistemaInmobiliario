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

    public function searchParams() {
        return array(
            'id',
            'cliente_propietario_id',
            'precio',
            'estado_inmueble',
            'numero_habitacion',
            'numero_banio',
            'numero_garage',
        );
    }

    public function relations() {
        return array(
            'direccions' => array(self::HAS_MANY, 'Direccion', 'entidad_id',
                'condition' => 'entidad_tipo = "inmueble"',
            ),
            'inmuebleImagens' => array(self::HAS_MANY, 'InmuebleImagen', 'inmueble_id'),
            'cliente_propietario' => array(self::BELONGS_TO, 'Cliente', 'cliente_propietario_id'),
        );
    }

    public function scopes() {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO,
                )
            ),
        );
    }

    public function rules() {
        return array(
            array('estado, estado_inmueble, fecha_publicacion,cliente_propietario_id', 'required'),
            array('cliente_propietario_id, cliente_negocio_id, numero_habitacion, numero_banio, numero_garage', 'numerical', 'integerOnly' => true),
            array('estado', 'length', 'max' => 8),
            array('precio, estado_inmueble', 'length', 'max' => 10),
            array('descripcion', 'length', 'max' => 500),
            array('fecha_actualizacion, fecha_negocio', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO', 'INACTIVO')), // enum,
            array('estado_inmueble', 'in', 'range' => array('DISPONIBLE', 'VENDIDO', 'ARRENDADO', 'RESERVADO')), // enum,
            array('cliente_propietario_id, cliente_negocio_id, precio, fecha_actualizacion, fecha_negocio, numero_habitacion, numero_banio, numero_garage, descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, cliente_propietario_id, cliente_negocio_id, estado, precio, estado_inmueble, fecha_publicacion, fecha_actualizacion, fecha_negocio, numero_habitacion, numero_banio, numero_garage, descripcion', 'safe', 'on' => 'search'),
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

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->with = array('cliente_propietario');
        $criteria->compare('t.id', $this->id, true, 'OR');
        $criteria->compare('CONCAT(IFNULL(CONCAT(cliente_propietario.nombre," "),""),IFNULL(cliente_propietario.apellido,""))', $this->cliente_propietario_id, true, 'OR');
//        $criteria->compare('cliente_propietario_id', $this->cliente_propietario_id, true, 'OR');
        $criteria->compare('t.cliente_negocio_id', $this->cliente_negocio_id, true, 'OR');
        $criteria->compare('t.estado', $this->estado, true, 'OR');
        $criteria->compare('t.precio', $this->precio, true, 'OR');
        $criteria->compare('t.estado_inmueble', $this->estado_inmueble, true, 'OR');
        $criteria->compare('t.fecha_publicacion', $this->fecha_publicacion, true, 'OR');
        $criteria->compare('t.fecha_actualizacion', $this->fecha_actualizacion, true, 'OR');
        $criteria->compare('t.fecha_negocio', $this->fecha_negocio, true, 'OR');
        $criteria->compare('t.numero_habitacion', $this->numero_habitacion, true, 'OR');
        $criteria->compare('t.numero_banio', $this->numero_banio, true, 'OR');
        $criteria->compare('t.numero_garage', $this->numero_garage, true, 'OR');
        $criteria->compare('t.descripcion', $this->descripcion, true, 'OR');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
