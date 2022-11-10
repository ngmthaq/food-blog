<?php

// Directory
define('DIR_NAME', 'food-blog');
define("DIR_WEB_ROOT", str_replace("\\configs", "", __DIR__));
define("DIR_PAGE_ROOT", DIR_WEB_ROOT . "\\pages");
define("DIR_TEMPLATE_ROOT", DIR_WEB_ROOT . "\\templates");

// Database
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-blog');

// Routes
define('ROUTE_HOMEPAGE', '/');
define('ROUTE_DETAILS', '/details');
define('ROUTE_ADD_COMMENT', '/comment/add');
define('ROUTE_GET_POSTS', '/posts');
define('ROUTE_CREATE_POST', '/posts/create');
define('ROUTE_UPDATE_POST', '/posts/update');
define('ROUTE_DELETE_POST', '/posts');
define('ROUTE_ADMIN', '/admin/check');
