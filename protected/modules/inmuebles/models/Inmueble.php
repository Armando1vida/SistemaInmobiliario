<?php

Yii::import('inmuebles.models._base.BaseInmueble');

class Inmueble extends BaseInmueble
{
    /**
     * @return Inmueble
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Inmueble|Inmuebles', $n);
    }

}