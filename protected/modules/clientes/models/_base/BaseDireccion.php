<?php

/**
 * This is the model base class for the table "direccion".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Direccion".
 *
 * Columns in table "direccion" available as properties of the model,
 * followed by relations of table "direccion" available as properties of the model.
 *
 * @property integer $id
 * @property integer $entidad_id
 * @property string $calle_1
 * @property string $calle_2
 * @property string $numero
 * @property string $referencia
 * @property integer $barrio_id
 * @property integer $ciudad_id
 * @property string $entidad_tipo
 *
 * @property Barrio $barrio
 * @property Ciudad $ciudad
 * @property Cliente $entidad
 */
abstract class BaseDireccion extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'direccion';
    }

    public static function representingColumn() {
        return 'entidad_tipo';
    }

    public function rules() {
        return array(
            array('entidad_tipo', 'required'),
            array('entidad_id, barrio_id, ciudad_id', 'numerical', 'integerOnly'=>true),
            array('calle_1, calle_2', 'length', 'max'=>128),
            array('numero', 'length', 'max'=>8),
            array('entidad_tipo', 'length', 'max'=>45),
            array('referencia', 'safe'),
            array('entidad_id, calle_1, calle_2, numero, referencia, barrio_id, ciudad_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, entidad_id, calle_1, calle_2, numero, referencia, barrio_id, ciudad_id, entidad_tipo', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'barrio' => array(self::BELONGS_TO, 'Barrio', 'barrio_id'),
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'entidad' => array(self::BELONGS_TO, 'Cliente', 'entidad_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'entidad_id' => Yii::t('app', 'Entidad'),
                'calle_1' => Yii::t('app', 'Calle 1'),
                'calle_2' => Yii::t('app', 'Calle 2'),
                'numero' => Yii::t('app', 'Numero'),
                'referencia' => Yii::t('app', 'Referencia'),
                'barrio_id' => Yii::t('app', 'Barrio'),
                'ciudad_id' => Yii::t('app', 'Ciudad'),
                'entidad_tipo' => Yii::t('app', 'Entidad Tipo'),
                'barrio' => null,
                'ciudad' => null,
                'entidad' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('entidad_id', $this->entidad_id);
        $criteria->compare('calle_1', $this->calle_1, true);
        $criteria->compare('calle_2', $this->calle_2, true);
        $criteria->compare('numero', $this->numero, true);
        $criteria->compare('referencia', $this->referencia, true);
        $criteria->compare('barrio_id', $this->barrio_id);
        $criteria->compare('ciudad_id', $this->ciudad_id);
        $criteria->compare('entidad_tipo', $this->entidad_tipo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}