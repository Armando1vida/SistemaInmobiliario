<?php

class InmuebleController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
    public $defaultAction = 'admin';

    public function filters() {
        return array(
//            array('CrugeAccessControlFilter'),
            array('CrugeAccessControlFilter -error'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $modelDireccion = isset($model->direccions[0]) ? $model->direccions[0] : new Direccion;
        $this->render('view', array(
            'model' => $model,
            'modelDireccion' => $modelDireccion,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Inmueble;
        Yii::import("xupload.models.XUploadForm");
        $archivos = new XUploadForm;
//        $archivos->algo = 'hola';
        $modelDireccion = new Direccion;
        $model->estado = Inmueble::ESTADO_ACTIVO;
        $model->estado_inmueble = Inmueble::ESTADO_DISPONIBLE;
        $model->fecha_publicacion = Util::FechaActual();
        $this->performAjaxValidation($model, 'inmueble-form');
        if (isset($_POST['Inmueble'])) {
            $model->attributes = $_POST['Inmueble'];
            $modelDireccion->attributes = $_POST['Direccion'];

            if ($model->save()) {
                $modelDireccion->entidad_id = $model->id;
                $modelDireccion->entidad_tipo = 'inmueble';
                $modelDireccion->ciudad_id = $modelDireccion->ciudad_id == 0 ? null : $modelDireccion->ciudad_id;
                $modelDireccion->barrio_id = $modelDireccion->barrio_id == 0 ? null : $modelDireccion->barrio_id;
                if ($modelDireccion->save()) {
                    $imagenes = $_POST['Imagenes'];
                    if ($imagenes != '[]') {
                        $imagenes = CJSON::decode($imagenes);
                        if (!file_exists('uploads/inmueble/' . $model->id)) {
                            mkdir('uploads/inmueble/' . $model->id, 0777, true);
                        }
                        $path = realpath(Yii::app()->getBasePath() . "/../uploads/inmueble/" . $model->id) . "/";
                        $pathorigen = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/";
                        $publicPath = Yii::app()->getBaseUrl() . "/uploads/inmueble/" . $model->id . '/';
                        foreach ($imagenes as $value) {
                            $archivo_model = new InmuebleImagen();
                            $archivo_model->nombre = $value['nombreArchivo'];
                            $archivo_model->ruta = $publicPath . $value['filename'];
                            $archivo_model->inmueble_id = $model->id;
                            if (rename($pathorigen . $value['filename'], $path . $value['filename'])) {
                                $archivo_model->save();
                            }
                        }
                        $this->redirect(array('admin'));
                    } else {
                        $this->redirect(array('admin'));
                    }
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'archivos' => $archivos,
            'modelDireccion' => $modelDireccion,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        Yii::import("xupload.models.XUploadForm");
        $archivos = new XUploadForm;
        $modelDireccion = isset($model->direccions[0]) ? $model->direccions[0] : new Direccion;
//        die(var_dump($model->inmuebleImagens));
        $this->performAjaxValidation($model, 'inmueble-form');

        if (isset($_POST['Inmueble'])) {
            $model->attributes = $_POST['Inmueble'];
            $modelDireccion->attributes = $_POST['Direccion'];
            $modelDireccion->ciudad_id = $modelDireccion->ciudad_id == 0 ? null : $modelDireccion->ciudad_id;
            $modelDireccion->barrio_id = $modelDireccion->barrio_id == 0 ? null : $modelDireccion->barrio_id;
            if ($model->save()) {
                $modelDireccion->entidad_id = $model->id;
                $modelDireccion->entidad_tipo = 'inmueble';
                if ($modelDireccion->save()) {
                    $imagenes = $_POST['Imagenes'];
                    if ($imagenes != '[]') {
                        $imagenes = CJSON::decode($imagenes);
                        if (!file_exists('uploads/inmueble/' . $model->id)) {
                            mkdir('uploads/inmueble/' . $model->id, 0777, true);
                        }
                        $path = realpath(Yii::app()->getBasePath() . "/../uploads/inmueble/" . $model->id) . "/";
                        $pathorigen = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/";
                        $publicPath = Yii::app()->getBaseUrl() . "/uploads/inmueble/" . $model->id . '/';
                        foreach ($imagenes as $value) {
                            $archivo_model = new InmuebleImagen();
                            $archivo_model->nombre = $value['nombreArchivo'];
                            $archivo_model->ruta = $publicPath . $value['filename'];
                            $archivo_model->inmueble_id = $model->id;
                            if (rename($pathorigen . $value['filename'], $path . $value['filename'])) {
                                $archivo_model->save();
                            }
                        }
                        $this->redirect(array('admin'));
                    } else {
                        $this->redirect(array('admin'));
                    }
//                    $this->redirect(array('admin'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'modelDireccion' => $modelDireccion,
            'archivos' => $archivos,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
//            $this->loadModel($id)->delete();
            Inmueble::model()->updateByPk($id, array('estado' => Inmueble::ESTADO_INACTIVO));

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Inmueble');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Inmueble('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['search'])) {
            $model->attributes = $this->assignParams($_GET['search']);
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionGalery() {
        $model = new Inmueble('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['search'])) {
            $model->attributes = $this->assignParams($_GET['search']);
        }
        $this->render('galery', array(
            'model' => $model,
        ));
    }

    public function actionAjaxComprar() {
        if (Yii::app()->request->isAjaxRequest) {
            $result = array();
            $id = $_GET['id'];
//            $model = $this->loadModel($id);
            $enable = Inmueble::model()->updateByPk($id, array('estado_inmueble' => Inmueble::ESTADO_VENDIDO, 'fecha_negocio' => Util::FechaActual(), 'cliente_negocio_id' => Yii::app()->user->id));
            if ($enable) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $result['message'] = 'No se pudo concretar la compra, intentelo mas tarde.';
            }
            echo json_encode($result);
        }
    }

    public function actionAjaxArrendar() {
        if (Yii::app()->request->isAjaxRequest) {
            $result = array();
            $id = $_GET['id'];
//            $model = $this->loadModel($id);
            $enable = Inmueble::model()->updateByPk($id, array('estado_inmueble' => Inmueble::ESTADO_ARRENDADO, 'fecha_negocio' => Util::FechaActual(), 'cliente_negocio_id' => Yii::app()->user->id));
            if ($enable) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $result['message'] = 'No se pudo concretar el arriendo, intentelo mas tarde.';
            }
            echo json_encode($result);
        }
    }

    public function actionAjaxReservar() {
        if (Yii::app()->request->isAjaxRequest) {
            $result = array();
            $id = $_GET['id'];
//            $model = $this->loadModel($id);
            $enable = Inmueble::model()->updateByPk($id, array('estado_inmueble' => Inmueble::ESTADO_RESERVADO, 'fecha_negocio' => Util::FechaActual(), 'cliente_negocio_id' => Yii::app()->user->id));
            if ($enable) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $result['message'] = 'No se pudo concretar la reserva, intentelo mas tarde.';
            }
            echo json_encode($result);
        }
    }

    public function actionError() {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->user->ui->loginUrl);
        }
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                if ($error['code'] == 404) {
                    $this->layout = '//layouts/error';
                    $this->render('404', $error);
                } else if ($error['code'] == 401) {
                    $this->layout = '//layouts/error';
                    $this->render('401', $error);
                } else {
                    $this->render('error', $error);
                }
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Inmueble::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * 
     * @param type $params
     * @return type
     */
    public function assignParams($params) {
        $result = array();
        if ($params['filters'][0] == 'all') {
            foreach (Inmueble::model()->searchParams() as $param) {
                $result[$param] = $params['value'];
            }
        } else {
            foreach ($params['filters'] as $param) {
                $result[$param] = $params['value'];
            }
        }
        return $result;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null, $attributes = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'inmueble-form') {
            echo CActiveForm::validate($model, $attributes);
            Yii::app()->end();
        }
    }

}
