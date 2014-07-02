<?php

Yii::import('inmuebles.models._base.BaseInmuebleImagen');

class InmuebleImagen extends BaseInmuebleImagen {

    public $picture;

    /**
     * @return InmuebleImagen
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'InmuebleImagen|InmuebleImagens', $n);
    }

    public function rule() {
        return array_merge(parent::rules(), array(
            array('picture', 'length', 'max' => 255, 'tooLong' => '{attribute} is too long (max {max} chars).', 'on' => 'upload'),
            array('picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Size should be less then 2MB !!!', 'on' => 'upload'),
                ))
        ;
    }

}
