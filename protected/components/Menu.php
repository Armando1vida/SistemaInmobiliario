<?php

class Menu {

    private static $_controller;

    public static function getMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<span class="icon-box"> <i class="icon-user"></i></span> Clientes', 'access' => 'action_cliente_admin', 'url' => array('/clientes/cliente')),
            array('label' => '<span class="icon-box"> <i class="icon-home"></i></span> Inmueble', 'access' => 'action_inmueble_admin', 'url' => array('/inmuebles/inmueble')),
            array('label' => '<span class="icon-box"> <i class="icon-camera"></i></span> Galeria', 'access' => 'action_inmueble_galery', 'url' => array('/inmuebles/inmueble/galery')),
        );

        return self::generateMenu($items);
    }

    public static function getAdminMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<span class="icon-box"> <i class="icon-dashboard"></i></span> Regresar a la App', 'url' => Yii::app()->homeUrl),
            array('label' => '<span class="icon-box"> <i class="icon-user"></i></span> Usuarios', 'url' => Yii::app()->user->ui->userManagementAdminUrl, 'access' => 'Cruge.ui.*', 'active_rules' => array('module' => 'cruge')),
            array('label' => '<span class="icon-box"> <i class="icon-book"></i></span> Catagolo<span class="arrow"></span>', 'url' => 'javascript:;', 'items' => array(
                    array('label' => 'Provincia', 'url' => array('/clientes/provincia'), 'access' => 'action_provincia_admin', 'active_rules' => array('module' => 'clientes', 'controller' => 'provincia')),
                    array('label' => 'Ciudad', 'url' => array('/clientes/ciudad'), 'access' => 'action_ciudad_admin', 'active_rules' => array('module' => 'clientes', 'controller' => 'ciudad')),
                    array('label' => 'Barrio', 'url' => array('/clientes/barrio'), 'access' => 'action_barrio_admin', 'active_rules' => array('module' => 'clientes', 'controller' => 'barrio')),
                )),
        );

        return self::generateMenu($items);
    }

    /**
     * Function to create a menu with acces rules and active item
     * @param array $items items to build the menu
     * @return array the formated menu
     */
    private static function generateMenu($items) {
        $menu = array();

        foreach ($items as $k => $item) {
            $access = false;
            $menu_item = $item;

            // Check children access
            if (isset($item['items'])) {
                $menu_item['items'] = array();
                // Check childrens access
                foreach ($item['items'] as $j => $children) {
                    if ($access = Yii::app()->user->checkAccess($children['access'])) {
                        $menu_item['items'][$j] = $children;
                        if (isset($children['active_rules']) && self::getActive($children['active_rules'])) {
                            $menu_item['items'][$j]['active'] = true;
                            $menu_item['active'] = true;
                        }
                    }
                }
            } else {
                // Check item access
                if (isset($item['access'])) {
                    $access = Yii::app()->user->checkAccess($item['access']);
                } else {
                    $access = true;
                }
                // Check active
                if (isset($item['active_rules'])) {
                    $menu_item['active'] = self::getActive($item['active_rules']);
                }
            }

            // If acces to the item or any child add to the menu
            if ($access) {
                $menu[] = $menu_item;
            }
        }

        return $menu;
    }

    /**
     * Function to compare the menu active rules with the current url
     * @param array $active_rules the array of rules to compare
     * @return boolean true if the rules match the current url
     */
    private static function getActive($active_rules) {
        $current = false;

        if (self::$_controller) {
            if (is_array(current($active_rules))) {
                foreach ($active_rules as $rule) {
                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';

                    if (isset($rule['module']) && self::$_controller->module) {
                        if ($operator == "==")
                            $current = self::$_controller->module->id == $rule['module'];
                        if ($operator == "!=")
                            $current = self::$_controller->module->id != $rule['module'];
                    }
                    if (isset($rule['controller'])) {
                        if ($operator == "==")
                            $current = self::$_controller->id == $rule['controller'];
                        if ($operator == "!=")
                            $current = self::$_controller->id != $rule['controller'];
                    }
                    if (isset($rule['action'])) {
                        if ($operator == "==")
                            $current = self::$_controller->action->id == $rule['action'];
                        if ($operator == "!=")
                            $current = self::$_controller->action->id != $rule['action'];
                    }

                    if (!$current)
                        break;
                }
            } else {
                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';

                if (isset($active_rules['module']) && self::$_controller->module) {
                    if ($operator == "==")
                        $current = self::$_controller->module->id == $active_rules['module'];
                    if ($operator == "!=")
                        $current = self::$_controller->module->id != $active_rules['module'];
                }
                if (isset($active_rules['controller'])) {
                    if ($operator == "==")
                        $current = self::$_controller->id == $active_rules['controller'];
                    if ($operator == "!=")
                        $current = self::$_controller->id != $active_rules['controller'];
                }
                if (isset($active_rules['action'])) {
                    if ($operator == "==")
                        $current = self::$_controller->action->id == $active_rules['action'];
                    if ($operator == "!=")
                        $current = self::$_controller->action->id != $active_rules['action'];
                }
            }
        }
        return $current;
    }

}
