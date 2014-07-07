<?php

/**
 * This is the model base class for the table "inmueble_imagen".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "InmuebleImagen".
 *
 * Columns in table "inmueble_imagen" available as properties of the model,
 * followed by relations of table "inmueble_imagen" available as properties of the model.
 *
 * @property integer $id
 * @property string $nombre
 * @property string $ruta
 * @property integer $inmueble_id
 *
 * @property Inmueble $inmueble
 */
abstract class BaseInmuebleImagen extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'inmueble_imagen';
    }

    public static function representingColumn() {
        return 'nombre';
    }

    public function rules() {
        return array(
            array('nombre, ruta, inmueble_id', 'required'),
            array('inmueble_id', 'numerical', 'integerOnly'=>true),
            array('nombre, ruta', 'length', 'max'=>45),
            array('id, nombre, ruta, inmueble_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'inmueble' => array(self::BELONGS_TO, 'Inmueble', 'inmueble_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'nombre' => Yii::t('app', 'Nombre'),
                'ruta' => Yii::t('app', 'Ruta'),
                'inmueble_id' => Yii::t('app', 'Inmueble'),
                'inmueble' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('ruta', $this->ruta, true);
        $criteria->compare('inmueble_id', $this->inmueble_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}