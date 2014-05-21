<?php

Yii::import('clientes.models._base.BaseCliente');

class Cliente extends BaseCliente
{
    /**
     * @return Cliente
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Cliente|Clientes', $n);
    }

}