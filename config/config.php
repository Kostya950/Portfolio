<?php
/**
 * Created by PhpStorm.
 * User: kito
 * Date: 22.05.16
 * Time: 15:51
 */

Config::set('site_name','Fresh-design');

Config::set('languages', array('en','fr'));

// Routes. Route name => method prefix

Config::set('routes', array (
    'default' => '',
    'admin' => 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');
Config::set('db.host', 'mysql.hostinger.com.ua');
Config::set('db.user', 'u989276726_fresh');
Config::set('db.password', '111111');
Config::set('db.db_name', 'u989276726_fresh');

