<?php

require_once "src/autoload.php";
require_once "vendor/autoload.php";

require_once "config.php";

use \Rapd\Database;

Database::$pdo->query("
CREATE UNIQUE INDEX idx_user_shop_list ON user_shop_list (user_id, shop_list_id);
");
