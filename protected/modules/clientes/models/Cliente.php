<?php

Yii::import('clientes.models._base.BaseCliente');

class Cliente extends BaseCliente {

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
            'razon_social' => Yii::t('app', 'Razón Social'),
            'celuda' => Yii::t('app', 'Céluda'),
            'telefono' => Yii::t('app', 'Teléfono'),
            'descripcion' => Yii::t('app', 'Descripción'),
                )
        );
    }

}
