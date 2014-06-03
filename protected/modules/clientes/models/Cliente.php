<?php

Yii::import('clientes.models._base.BaseCliente');

class Cliente extends BaseCliente {

    //ESTADO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    //TIPO
    const TIPO_VENDEDOR = 'VENDEDOR';
    const TIPO_COMPRADOR = 'COMPRADOR';

    /**
     * @return Cliente
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Cliente|Clientes', $n);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'nombre' => Yii::t('app', 'Nombres'),
            'apellido' => Yii::t('app', 'Apellidos'),
            'razon_social' => Yii::t('app', 'Razón Social'),
            'celuda' => Yii::t('app', 'Céluda'),
            'telefono' => Yii::t('app', 'Teléfono'),
            'descripcion' => Yii::t('app', 'Descripción'),
                )
        );
    }

    /**
     * 
     * @return array tipos
     * 
     */
    public function getTipos() {
        return array(
            self::TIPO_COMPRADOR => Yii::t('app', 'Comprador'),
            self::TIPO_VENDEDOR => Yii::t('app', 'Vendedor'),
        );
    }

    /**
     * 
     * @return type
     */
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

}
