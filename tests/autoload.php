<?php
/**
 * Unilead | Codestyle
 *
 * This file is part of the Unilead Service Package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package     Codestyle
 * @license     Proprietary
 * @copyright   Copyright (C) Unilead Network, All rights reserved.
 * @link        https://www.unileadnetwork.com
 */

use JBZoo\Utils\Cli;

// Main autoload
if ($autoload = realpath('./vendor/autoload.php')) {
    require_once $autoload;

} else {
    Cli::err('Please execute "composer update" !');
    exit(1);
}
