<?php

class ClienteController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
    public $defaultAction = 'admin';

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Cliente;
        $modelDireccion = new Direccion;
        $this->performAjaxValidation($model, 'cliente-form');
        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
            $modelDireccion->attributes = $_POST['Direccion'];
            if ($model->save()) {
                $modelDireccion->entidad_id = $model->id;
                $modelDireccion->entidad_tipo = 'cliente';
                $modelDireccion->ciudad_id = $modelDireccion->ciudad_id == 0 ? null : $modelDireccion->ciudad_id;
                $modelDireccion->barrio_id = $modelDireccion->barrio_id == 0 ? null : $modelDireccion->barrio_id;
                if ($modelDireccion->save()) {
                    $this->redirect(array('admin'));
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
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
        $modelDireccion = isset($model->direccions[0]) ? $model->direccions[0] : new Direccion;

        $this->performAjaxValidation($model, 'cliente-form');

        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
            $modelDireccion->attributes = $_POST['Direccion'];
            $modelDireccion->ciudad_id = $modelDireccion->ciudad_id == 0 ? null : $modelDireccion->ciudad_id;
            $modelDireccion->barrio_id = $modelDireccion->barrio_id == 0 ? null : $modelDireccion->barrio_id;
            if ($model->save()) {

                $modelDireccion->entidad_id = $model->id;
                $modelDireccion->entidad_tipo = 'cliente';
                if ($modelDireccion->save()) {
                    $this->redirect(array('admin'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'modelDireccion' => $modelDireccion,
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
//            $model = $this->loadModel($id);
            Cliente::model()->updateByPk($id, array('estado' => Cliente::ESTADO_INACTIVO,
            ));

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
        $dataProvider = new CActiveDataProvider('Cliente');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cliente('search');
        $model->unsetAttributes(); // clear any default values
//        if (isset($_GET['Cliente']))
//            $model->attributes = $_GET['Cliente'];
        if (isset($_GET['search'])) {
            $model->attributes = $this->assignParams($_GET['search']);
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Cliente::model()->findByPk($id);
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
            foreach (Cliente::model()->searchParams() as $param) {
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
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cliente-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
