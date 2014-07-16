<?php

Yii::import('clientes.models._base.BaseCliente');

class Cliente extends BaseCliente {

    //ESTADO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    //TIPO
    const TIPO_VENDEDOR = 'VENDEDOR';
    const TIPO_COMPRADOR = 'COMPRADOR';

    //Direccion
    public $calle_1;
    public $calle_2;
    public $numero;
    public $referencia_dir;
    public $barrio_id;
    public $ciudad_id;
    public $provincia_id;
    //Cliente
    private $nombre_completo;

    /**
     * @return Cliente
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function relations() {
        return array(
            'direccions' => array(self::HAS_MANY, 'Direccion', 'entidad_id', 'condition' => 'entidad_tipo = "cliente"',),
        );
    }

    public function rules() {
        return array(
            array('tipo, nombre, apellido', 'required'),
            array('email', 'email'),
            array('nombre, apellido, razon_social', 'length', 'max' => 64),
            array('cedula', 'length', 'max' => 20),
            array('telefono, celular', 'length', 'max' => 24),
            array('email', 'length', 'max' => 50),
            array('estado', 'length', 'max' => 8),
            array('descripcion, fecha_actualizacion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO', 'INACTIVO')), // enum,
            array('razon_social, cedula, telefono, celular, email, descripcion, estado, fecha_actualizacion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, tipo, nombre, apellido, razon_social, cedula, telefono, celular, email, descripcion, estado, fecha_creacion, fecha_actualizacion,nombre_completo', 'safe', 'on' => 'search'),
        );
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
            'celuda' => Yii::t('app', 'Cédula'),
            'telefono' => Yii::t('app', 'Teléfono'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'calle_1' => Yii::t('app', 'Calle 1'),
            'calle_2' => Yii::t('app', 'Calle 2'),
            'numero' => Yii::t('app', 'Número'),
            'referencia' => Yii::t('app', 'Referencia'),
            'barrio_id' => Yii::t('app', 'Barrio'),
            'ciudad_id' => Yii::t('app', 'Ciudad'),
            'provincia_id' => Yii::t('app', 'Provincia'),
            'nombre_completo' => Yii::t('app', 'Nombre'),
                )
        );
    }

    /**
     * 
     * @return type
     */
    public function searchParams() {
        return array(
            'nombre_completo',
            'celuda',
            'telefono',
            'celular',
            'email',
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
    public function getNombre_completo() {
        if (!$this->nombre_completo)
            $this->nombre_completo = $this->nombre . ($this->nombre ? ' ' : '') . $this->apellido;
        return $this->nombre_completo;
    }

    /**
     * 
     * @param type $nombre_completo
     * @return type
     */
    public function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
        return $this->nombre_completo;
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

    public function tipo($tipo) {
        $this->getDbCriteria()->mergeWith(
                array(
                    'condition' => 'tipo = :tipo',
                    'params' => array(
                        ':tipo' => $tipo
                    ),
                )
        );
        return $this;
    }

    /**
     * 
     * @return \CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria;
        $sort = new CSort;

//        $criteria->compare('id', $this->id);
        $criteria->compare('t.tipo', $this->tipo, true . 'OR');
        $criteria->compare('CONCAT(IFNULL(CONCAT(t.nombre," "),""),IFNULL(t.apellido,""))', $this->nombre_completo, true, 'OR');

//        $criteria->compare('nombre', $this->nombre, true);
//        $criteria->compare('apellido', $this->apellido, true);
//        $criteria->compare('razon_social', $this->razon_social, true);
        $criteria->compare('t.cedula', $this->cedula, true, 'OR');
        $criteria->compare('t.telefono', $this->telefono, true, 'OR');
        $criteria->compare('t.celular', $this->celular, true, 'OR');
        $criteria->compare('t.email', $this->email, true, 'OR');
//        $criteria->compare('descripcion', $this->descripcion, true);
//        $criteria->compare('estado', $this->estado, true);
//        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
//        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);


        $sort->attributes = array(
            'nombre_completo' => array(
                'asc' => 'CONCAT(IFNULL(CONCAT(t.nombre," "),""),IFNULL(t.apellido,"")) asc',
                'desc' => 'CONCAT(IFNULL(CONCAT(t.nombre," "),""),IFNULL(t.apellido,"")) desc',
            ),
            'cedula' => array(
                'asc' => 't.cedula asc',
                'desc' => 't.cedula desc',
            ),
            '*',
        );
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
    }

}
