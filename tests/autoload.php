<?php
/**
 * Item8 | Codestyle
 *
 * This file is part of the Item8 Service Package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package     Codestyle
 * @license     Proprietary
 * @copyright   Copyright (C) Item8, All rights reserved.
 * @link        https://item8.io
 */

use JBZoo\Utils\Cli;

// Main autoload
if ($autoload = realpath('./vendor/autoload.php')) {
    require_once $autoload;

} else {
    Cli::err('Please execute "composer update" !');
    exit(1);
}
