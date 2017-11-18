<?php
/**
 * Item8 Ltd | Codestyle
 *
 * This file is part of the _VENDOR_ Service Package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package     Codestyle
 * @license     Proprietary
 * @copyright   Copyright (C) Item8 Ltd, All rights reserved.
 * @link        https://item8.io
 *
 * @codingStandardsIgnoreFile
 */

use JBZoo\Utils\Env;

if (!defined('I8_FILE_LINE_ENDING')) {
    !defined('CRLF') && define('CRLF', "\r\n");
    !defined('LF') && define('LF', "\n");
    !defined('CR') && define('CR', "\r");

    $lineEnding = Env::get('I8_FILE_LINE_ENDING', PHP_EOL);
    $lineEnding = defined($lineEnding) ? constant($lineEnding) : PHP_EOL;
    define('I8_FILE_LINE_ENDING', $lineEnding);
}
