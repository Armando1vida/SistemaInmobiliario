<?php

Yii::import('inmuebles.models._base.BaseInmuebleImagen');

class InmuebleImagen extends BaseInmuebleImagen
{
    /**
     * @return InmuebleImagen
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'InmuebleImagen|InmuebleImagens', $n);
    }

}