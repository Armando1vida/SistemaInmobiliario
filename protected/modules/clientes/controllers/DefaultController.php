<?php

class DefaultController extends Controller {

    public $admin = false;

    public function actionIndex() {
        $this->render('index');
    }

}
