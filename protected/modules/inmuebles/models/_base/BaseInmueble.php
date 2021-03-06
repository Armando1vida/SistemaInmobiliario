<?php

/**
 * This is the model base class for the table "inmueble".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Inmueble".
 *
 * Columns in table "inmueble" available as properties of the model,
 * followed by relations of table "inmueble" available as properties of the model.
 *
 * @property integer $id
 * @property integer $cliente_propietario_id
 * @property integer $cliente_negocio_id
 * @property string $estado
 * @property string $precio
 * @property string $estado_inmueble
 * @property string $fecha_publicacion
 * @property string $fecha_actualizacion
 * @property string $fecha_negocio
 * @property integer $numero_habitacion
 * @property integer $numero_banio
 * @property integer $numero_garage
 * @property string $descripcion
 *
 * @property InmuebleImagen[] $inmuebleImagens
 */
abstract class BaseInmueble extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'inmueble';
    }

    public static function representingColumn() {
        return 'estado';
    }

    public function rules() {
        return array(
            array('estado, estado_inmueble, fecha_publicacion', 'required'),
            array('cliente_propietario_id, cliente_negocio_id, numero_habitacion, numero_banio, numero_garage', 'numerical', 'integerOnly'=>true),
            array('estado', 'length', 'max'=>8),
            array('precio, estado_inmueble', 'length', 'max'=>10),
            array('descripcion', 'length', 'max'=>500),
            array('fecha_actualizacion, fecha_negocio', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO','INACTIVO')), // enum,
            array('estado_inmueble', 'in', 'range' => array('DISPONIBLE','VENDIDO','ARRENDADO','RESERVADO')), // enum,
            array('cliente_propietario_id, cliente_negocio_id, precio, fecha_actualizacion, fecha_negocio, numero_habitacion, numero_banio, numero_garage, descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, cliente_propietario_id, cliente_negocio_id, estado, precio, estado_inmueble, fecha_publicacion, fecha_actualizacion, fecha_negocio, numero_habitacion, numero_banio, numero_garage, descripcion', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'inmuebleImagens' => array(self::HAS_MANY, 'InmuebleImagen', 'inmueble_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'cliente_propietario_id' => Yii::t('app', 'Cliente Propietario'),
                'cliente_negocio_id' => Yii::t('app', 'Cliente Negocio'),
                'estado' => Yii::t('app', 'Estado'),
                'precio' => Yii::t('app', 'Precio'),
                'estado_inmueble' => Yii::t('app', 'Estado Inmueble'),
                'fecha_publicacion' => Yii::t('app', 'Fecha Publicacion'),
                'fecha_actualizacion' => Yii::t('app', 'Fecha Actualizacion'),
                'fecha_negocio' => Yii::t('app', 'Fecha Negocio'),
                'numero_habitacion' => Yii::t('app', 'Numero Habitacion'),
                'numero_banio' => Yii::t('app', 'Numero Banio'),
                'numero_garage' => Yii::t('app', 'Numero Garage'),
                'descripcion' => Yii::t('app', 'Descripcion'),
                'inmuebleImagens' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('cliente_propietario_id', $this->cliente_propietario_id);
        $criteria->compare('cliente_negocio_id', $this->cliente_negocio_id);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('precio', $this->precio, true);
        $criteria->compare('estado_inmueble', $this->estado_inmueble, true);
        $criteria->compare('fecha_publicacion', $this->fecha_publicacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('fecha_negocio', $this->fecha_negocio, true);
        $criteria->compare('numero_habitacion', $this->numero_habitacion);
        $criteria->compare('numero_banio', $this->numero_banio);
        $criteria->compare('numero_garage', $this->numero_garage);
        $criteria->compare('descripcion', $this->descripcion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => null,
                'updateAttribute' => 'fecha_actualizacion',
                'timestampExpression' => new CDbExpression('NOW()'),
            )
        ), parent::behaviors());
    }
}