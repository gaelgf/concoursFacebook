<?php
if(getenv("BASE_URL")) {
	define("BASE_URL", getenv("BASE_URL"));
} else {
	define("BASE_URL","http://localhost/facebook_mvc/");
}
define("IMG_DIRECTORY_URL", BASE_URL . "assets/img/");
define("JS_DIRECTORY_URL", BASE_URL . "assets/js/");
define("CSS_DIRECTORY_URL", BASE_URL . "assets/css/");
define("DATA_BASE_URL", "postgres://tauvgqlesbneeb:DnzA-_DbOYgyatP6UAppmXXzq6@ec2-54-83-55-214.compute-1.amazonaws.com:5432/dcsd5vvlobm9dj");
$url = parse_url(DATA_BASE_URL);
define("HOST", $url["host"]);
define("USERNAME", $url["user"]);
define("PASSWORD", $url["pass"]);
define("DATABASE", ltrim($url["path"],'/'));