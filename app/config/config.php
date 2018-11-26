<?php
define('CONTROLLER__DEFAULT', 'pages');
define('METHOD__DEFAULT', 'index');
define('PARAMETER', []);
//Layout 
define('HEAD__LAYOUT', 'Layouts/head.layout.php');
define('HEADER__LAYOUT', 'Layouts/header.layout.php');
define('FOOTER__LAYOUT', 'Layouts/footer.layout.php');
//Router
define('PATH__APP', dirname(dirname(__FILE__)));
define('PATH__URL', "http://".$_SERVER['HTTP_HOST']);
define('APP_NAME', 'miniframewordphp');
require_once PATH__APP. "/config/env.php";




