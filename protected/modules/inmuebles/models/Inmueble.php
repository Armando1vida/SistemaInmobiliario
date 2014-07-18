<?php

Yii::import('inmuebles.models._base.BaseInmueble');

class Inmueble extends BaseInmueble {

    //ESTADO
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    //INMUEBLE_ESATDO   : DISPONIBLE,VENDIDO,ARRENDADO,RESERVADO
    const ESTADO_DISPONIBLE = 'DISPONIBLE';
    const ESTADO_VENDIDO = 'VENDIDO';
    const ESTADO_ARRENDADO = 'ARRENDADO';
    const ESTADO_RESERVADO = 'RESERVADO';

    /**
     * @return Inmueble
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function searchParams() {
        return array(
            'id',
            'cliente_propietario_id',
            'precio',
            'estado_inmueble',
            'numero_habitacion',
            'numero_banio',
            'numero_garage',
        );
    }

    public function searchParamsGalery() {
        return array(
            'provincia_id'
        );
    }

    public function relations() {
        return array(
            'direccions' => array(self::HAS_MANY, 'Direccion', 'entidad_id',
                'condition' => 'entidad_tipo = "inmueble"',
            ),
            'inmuebleImagens' => array(self::HAS_MANY, 'InmuebleImagen', 'inmueble_id'),
            'cliente_propietario' => array(self::BELONGS_TO, 'Cliente', 'cliente_propietario_id'),
            'cliente_negocio' => array(self::BELONGS_TO, 'Cliente', 'cliente_negocio_id'),
        );
    }

    public function scopes() {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO,
                )
            ),
            'disponibles' => array(
                'condition' => 't.estado_inmueble = :estado_inmueble',
                'params' => array(
                    ':estado_inmueble' => self::ESTADO_DISPONIBLE,
                )
            ),
        );
    }

    public function rules() {
        return array(
            array('estado, estado_inmueble, fecha_publicacion,cliente_propietario_id,precio,descripcion', 'required'),
            array('cliente_propietario_id, cliente_negocio_id, numero_habitacion, numero_banio, numero_garage', 'numerical', 'integerOnly' => true),
            array('estado', 'length', 'max' => 8),
            array('precio, estado_inmueble', 'length', 'max' => 10),
            array('descripcion', 'length', 'max' => 500),
            array('fecha_actualizacion, fecha_negocio', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO', 'INACTIVO')), // enum,
            array('estado_inmueble', 'in', 'range' => array('DISPONIBLE', 'VENDIDO', 'ARRENDADO', 'RESERVADO')), // enum,
            array('cliente_propietario_id, cliente_negocio_id, precio, fecha_actualizacion, fecha_negocio, numero_habitacion, numero_banio, numero_garage, descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, cliente_propietario_id, cliente_negocio_id, estado, precio, estado_inmueble, fecha_publicacion, fecha_actualizacion, fecha_negocio, numero_habitacion, numero_banio, numero_garage, descripcion', 'safe', 'on' => 'search'),
        );
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Inmueble|Inmuebles', $n);
    }

    public function detalleconformato() {
        $detalle = '';
        if ($this->numero_habitacion)
            $detalle .= "<b>$this->numero_habitacion</b> Habitaciones<br>";
        if ($this->numero_banio)
            $detalle .= "<b>$this->numero_banio</b> Baños<br>";
        if ($this->numero_garage)
            $detalle .= "<b>$this->numero_garage</b> Garages<br>";
        return $detalle;
    }

    public function getEstadoinmuebleformato() {
        $detalle = '';
        $usuario = Yii::app()->user->um->loadUserById(Yii::app()->user->id /* , true (para que cargue sus campos) */);
        if ($this->estado_inmueble == self::ESTADO_ARRENDADO)
            $detalle .= ' por ' . $usuario->username;
        if ($this->estado_inmueble == self::ESTADO_VENDIDO)
            $detalle .= ' a ' . $usuario->username;
        if ($this->estado_inmueble == self::ESTADO_RESERVADO)
            $detalle .= ' por ' . $usuario->username;
        $detalle = $this->estado_inmueble . $detalle;
        return $detalle;
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'numero_banio' => Yii::t('app', 'Numero de baños'),
            'numero_habitacion' => Yii::t('app', 'Numero de habitaciones'),
            'numero_garage' => Yii::t('app', 'Numero de garages'),
            'descripcion' => Yii::t('app', 'Descripción'),
        ));
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->with = array('cliente_propietario');
        $criteria->compare('t.id', $this->id, true, 'OR');
        $criteria->compare('CONCAT(IFNULL(CONCAT(cliente_propietario.nombre," "),""),IFNULL(cliente_propietario.apellido,""))', $this->cliente_propietario_id, true, 'OR');
//        $criteria->compare('cliente_propietario_id', $this->cliente_propietario_id, true, 'OR');
        $criteria->compare('t.cliente_negocio_id', $this->cliente_negocio_id, true, 'OR');
        $criteria->compare('t.estado', $this->estado, true, 'OR');
        $criteria->compare('t.precio', $this->precio, true, 'OR');
        $criteria->compare('t.estado_inmueble', $this->estado_inmueble, true, 'OR');
        $criteria->compare('t.fecha_publicacion', $this->fecha_publicacion, true, 'OR');
        $criteria->compare('t.fecha_actualizacion', $this->fecha_actualizacion, true, 'OR');
        $criteria->compare('t.fecha_negocio', $this->fecha_negocio, true, 'OR');
        $criteria->compare('t.numero_habitacion', $this->numero_habitacion, true, 'OR');
        $criteria->compare('t.numero_banio', $this->numero_banio, true, 'OR');
        $criteria->compare('t.numero_garage', $this->numero_garage, true, 'OR');
        $criteria->compare('t.descripcion', $this->descripcion, true, 'OR');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchgalegy() {
        $criteria = new CDbCriteria;
        $criteria->with = array('cliente_propietario');
        $criteria->compare('t.id', $this->id, true, 'OR');
//        $criteria->compare('cliente_propietario_id', $this->cliente_propietario_id, true, 'OR');
        $criteria->compare('t.cliente_negocio_id', $this->cliente_negocio_id, true, 'OR');
//        $criteria->compare('t.cliente_negocio_id', $this->cliente_negocio_id, true, 'OR');
        $criteria->compare('t.estado', $this->estado, true, 'OR');
        $criteria->compare('t.precio', $this->precio, true, 'OR');
        $criteria->compare('t.estado_inmueble', $this->estado_inmueble, true, 'OR');
        $criteria->compare('t.fecha_publicacion', $this->fecha_publicacion, true, 'OR');
        $criteria->compare('t.fecha_actualizacion', $this->fecha_actualizacion, true, 'OR');
        $criteria->compare('t.fecha_negocio', $this->fecha_negocio, true, 'OR');
        $criteria->compare('t.numero_habitacion', $this->numero_habitacion, true, 'OR');
        $criteria->compare('t.numero_banio', $this->numero_banio, true, 'OR');
        $criteria->compare('t.numero_garage', $this->numero_garage, true, 'OR');
        $criteria->compare('t.descripcion', $this->descripcion, true, 'OR');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function generateview() {
        $resultado = '<div class="row-fluid blog">';
        $resultado.='<div class="span4">';
        if (!empty($this->inmuebleImagens)) {
            $imagen = $this->inmuebleImagens[0];
            $resultado.='<img  src="' . $imagen->ruta . '" alt="">';
        } else {
            $resultado.='<div class=" hero-unit">';
            $resultado.=' <h2 class="text-center">Sin Im&aacute;gen </h2>';
            $resultado.='</div>';
        }
        $resultado.='  </div>';
        $resultado.='<div class="span8">';
        $resultado.='<div class="date" style="width:110px;>';
        $resultado.='<p class="day"> $ ' . $this->precio . '</p>';
        $resultado.=' <p class="month">  Precio  </p>';
        $resultado.=' </div>';
        $resultado.=' <h2>';
        $resultado.='<a href="/SistemaInmobiliario/inmuebles/inmueble/view?id='.$this->id.'">' . Util::truncateTwo($this->descripcion, 20) . '</a>';
        $resultado.='</h2>';
        $resultado.=' <p>';
        $resultado.='Propietario <a href="javascript:;">' . $this->cliente_propietario . '</a>';
        $resultado.=' </p>';
        if (isset($this->direccions[0])) {
            $resultado.='<p>';
            $resultado.=$this->direccions[0]->direccionConFormato;
            $resultado.=' </p>';
        }
        $resultado.='<p>';
        $resultado.=$this->detalleconformato();
        $resultado.=' </p>';
        if ((!Yii::app()->user->isSuperAdmin) && ( Yii::app()->user->checkAccess('cliente'))) {
            $resultado.=' <button  class="btn btn-info" onclick="js:comprar(' . $this->id . ')">Comprar</button>';
            $resultado.=' <button  class="btn btn-info" onclick="js:arrendar(' . $this->id . ')">Arrendar</button>';
            $resultado.=' <button  class="btn btn-info" onclick="js:reservar(' . $this->id . ')">Reservar</button>';
        }

        $resultado.='  </div>';
        $resultado.='  </div>';
        echo $resultado;
    }

}
