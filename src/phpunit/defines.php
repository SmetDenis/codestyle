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
 *
 * @codingStandardsIgnoreFile
 */

use JBZoo\Utils\Env;

if (!defined('BM_FILE_LINE_ENDING')) {
    !defined('CRLF') && define('CRLF', "\r\n");
    !defined('LF') && define('LF', "\n");
    !defined('CR') && define('CR', "\r");

    $lineEnding = Env::get('BM_FILE_LINE_ENDING', PHP_EOL);
    $lineEnding = defined($lineEnding) ? constant($lineEnding) : PHP_EOL;
    define('BM_FILE_LINE_ENDING', $lineEnding);
}
