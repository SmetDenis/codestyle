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

namespace JBZoo\PHPUnit;

use Symfony\Component\Finder\Finder;

/**
 * Class Item8CodeStyleTest
 *
 * @package JBZoo\PHPUnit
 */
abstract class Item8CodeStyleTest extends Codestyle
{
    protected $_packageVendor    = 'Item8 Ltd';
    protected $_packageLink      = 'https://item8.io';
    protected $_packageLicense   = 'Proprietary';
    protected $_packageCopyright = 'Copyright (C) _VENDOR_, All rights reserved.';
    protected $_packageDesc      = [
        'This file is part of the _VENDOR_ Service Package.',
        'For the full copyright and license information, please view the LICENSE',
        'file that was distributed with this source code.',
    ];

    protected $_le = I8_FILE_LINE_ENDING;

    /**
     * Ignore list for
     *
     * @var array
     */
    protected $_excludePaths = [
        '.git',
        '.idea',
        'bin',
        'bower_components',
        'build',
        'fonts',
        'cache',
        'bower',
        'logs',
        'node_modules',
        'resources',
        'vendor',
        'temp',
        'tools',
        'tmp',
    ];
    /**
     * Valid header for PHP files
     *
     * @var array
     */
    protected $_validHeaderPHP = [
        '<?php',
        '/**',
        ' * _VENDOR_ | _PACKAGE_',
        ' *',
        ' * _DESCRIPTION_PHP_',
        ' *',
        ' * @package     _PACKAGE_',
        ' * @license     _LICENSE_',
        ' * @copyright   _COPYRIGHTS_',
        ' * @link        _LINK_',
    ];

    protected $_validDirs = [
        PROJECT_ROOT . '/src',
        PROJECT_ROOT . '/tests',
    ];

    /**
     * Valid header for JavaScript files
     *
     * @var array
     */
    protected $_validHeaderJS = [
        '/**',
        ' * _VENDOR_ | _PACKAGE_',
        ' *',
        ' * _DESCRIPTION_JS_',
        ' *',
        ' * @package     _PACKAGE_',
        ' * @license     _LICENSE_',
        ' * @copyright   _COPYRIGHTS_',
        ' * @link        _LINK_',
        ' */',
        '',
    ];


    /**
     * Valid header for CSS files (if not mimified)
     *
     * @var array
     */
    protected $_validHeaderCSS = [
        '/**',
        ' * _VENDOR_ | _PACKAGE_',
        ' *',
        ' * _DESCRIPTION_CSS_',
        ' *',
        ' * @package     _PACKAGE_',
        ' * @license     _LICENSE_',
        ' * @copyright   _COPYRIGHTS_',
        ' * @link        _LINK_',
        ' */',
        '',
    ];

    /**
     * Valid header for LESS files
     *
     * @var array
     */
    protected $_validHeaderLESS = [
        '//',
        '// _VENDOR_ | _PACKAGE_',
        '//',
        '// _DESCRIPTION_LESS_',
        '//',
        '// @package     _PACKAGE_',
        '// @license     _LICENSE_',
        '// @copyright   _COPYRIGHTS_',
        '// @link        _LINK_',
        '//',
    ];

    /**
     * Valid header for XML files
     *
     * @var array
     */
    protected $_validHeaderXML = [
        '<?xml version="1.0" encoding="UTF-8" ?>',
        '<!--',
        '    _VENDOR_ | _PACKAGE_',
        '',
        '    _DESCRIPTION_XML_',
        '',
        '    @package    _PACKAGE_',
        '    @license    _LICENSE_',
        '    @copyright  _COPYRIGHTS_',
        '    @link       _LINK_',
        '-->',
    ];

    /**
     * Valid header for INI files
     *
     * @var array
     */
    protected $_validHeaderINI = [
        ';',
        '; _VENDOR_ | _PACKAGE_',
        ';',
        '; _DESCRIPTION_INI_',
        ';',
        '; @package    _PACKAGE_',
        '; @license    _LICENSE_',
        '; @copyright  _COPYRIGHTS_',
        '; @link       _LINK_',
        ';',
        '; Note: All ini files need to be saved as UTF-8 (no BOM)',
        ';',
    ];

    /**
     * Valid header for SH scripts
     *
     * @var array
     */
    protected $_validHeaderSH = [
        '#!/usr/bin/env sh',
        '',
        '#',
        '# _VENDOR_ | _PACKAGE_',
        '#',
        '# _DESCRIPTION_SH_',
        '#',
        '# @package   _PACKAGE_',
        '# @license   _LICENSE_',
        '# @copyright _COPYRIGHTS_',
        '# @link      _LINK_',
        '#',
        '',
    ];

    /**
     * Valid header for SQL scripts
     *
     * @var array
     */
    protected $_validHeaderSQL = [
        '--',
        '-- _VENDOR_ | _PACKAGE_',
        '--',
        '-- _DESCRIPTION_SQL_',
        '--',
        '-- @package     _PACKAGE_',
        '-- @license     _LICENSE_',
        '-- @copyright   _COPYRIGHTS_',
        '-- @link        _LINK_',
        '--',
        '',
    ];

    /**
     * Valid header for .htaccess scripts
     *
     * @var array
     */
    protected $_validHeaderHtaccess = [
        '#',
        '# _VENDOR_ | _PACKAGE_',
        '#',
        '# _DESCRIPTION_HTACCESS_',
        '#',
        '# @package      _PACKAGE_',
        '# @license      _LICENSE_',
        '# @copyright    _COPYRIGHTS_',
        '# @link         _LINK_',
        '#',
        '',
    ];

    public function setUp()
    {
        // skip('TODO: Fix all code style!');
        parent::setUp();
    }

    /**
     * Test copyright headers of JS files (not minified)
     */
    public function testHeadersJS()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderJS, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in($this->_validDirs)
            ->exclude($this->_excludePaths)
            ->name('*.js');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of LESS files (not minified)
     */
    public function testHeadersLESS()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderLESS, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in($this->_validDirs)
            ->exclude($this->_excludePaths)
            ->name('*.less');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of CSS files (not minified)
     */
    public function testHeadersCSS()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderCSS, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in($this->_validDirs)
            ->exclude($this->_excludePaths)
            ->name('*.css');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of XML files
     */
    public function testHeadersXML()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderXML, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in(PROJECT_ROOT)
            ->exclude($this->_excludePaths)
            ->name('*.xml')
            ->name('*.xml.dist');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of INI files
     */
    public function testHeadersINI()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderINI, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in(PROJECT_ROOT)
            ->exclude($this->_excludePaths)
            ->name('*.ini');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of SH files
     */
    public function testHeadersSH()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderSH, $this->_le));

        $excludePaths = $this->_excludePaths;
        $binIndex = array_search('bin', $excludePaths);
        if ($binIndex !== false) {
            unset($excludePaths[$binIndex]);
        }

        $finder = new Finder();
        $finder
            ->files()
            ->in(PROJECT_ROOT)
            ->exclude($excludePaths)
            ->name('*.sh');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of SQL files
     */
    public function testHeadersSQL()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderSQL, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in(PROJECT_ROOT)
            ->exclude($this->_excludePaths)
            ->name('*.sql')
            ->notName('dump.sql');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of Makefile
     */
    public function testHeadersMakefile()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderHtaccess, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in(PROJECT_ROOT)
            ->exclude($this->_excludePaths)
            ->ignoreDotFiles(false)
            ->name('Makefile');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of .htaccess files
     */
    public function testHeadersHtaccess()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderHtaccess, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in(PROJECT_ROOT)
            ->exclude($this->_excludePaths)
            ->ignoreDotFiles(false)
            ->name('/\.htaccess/')
            ->name('htaccess.*')
            ->name('.htaccess.*');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    /**
     * Test copyright headers of PHP files
     */
    public function testHeadersPHP()
    {
        $valid = $this->_prepareTemplate(implode($this->_validHeaderPHP, $this->_le));

        $finder = new Finder();
        $finder
            ->files()
            ->in($this->_validDirs)
            ->exclude($this->_excludePaths)
            ->notName('config.php')// Any data in config files
            ->name('*.php')
            ->name('*.phtml');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            isContain($valid, $content, false, 'File has no valid header: ' . $file);
        }

        isTrue(true); // One assert  is minimum for test
    }

    public function testFiles()
    {
        $finder = new Finder();
        $finder
            ->files()
            ->in($this->_validDirs)
            ->name('*.html')
            ->name('*.xml')
            ->name('*.js')
            ->name('*.jsx')
            ->name('*.css')
            ->name('*.less')
            ->name('*.php')
            ->name('*.phtml')
            ->name('*.ini')
            ->name('*.json')
            ->name('*.txt')
            ->name('*.md')
            ->ignoreDotFiles(false)
            ->exclude('Makefile')
            ->notName('*.css')
            ->notName('*.js')
            ->exclude($this->_excludePaths);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());
            if (strlen($content) > 0) {
                //isNotContain("\r", $content, false, 'File has \r symbol: ' . $file);
                isNotContain("\t", $content, false, 'File has \t symbol: ' . $file);
            }
        }

        isTrue(true); // One assert  is minimum for test
    }

    public function testCyrillic()
    {
        $finder = new Finder();
        $finder
            ->files()
            ->in($this->_validDirs)
            ->exclude($this->_excludePaths)
            ->exclude('tests')
            ->notPath(basename(__FILE__))
            ->ignoreDotFiles(false)
            ->notName('Helper.php')// It has function cyr2Lat ()
            ->notName('config.php')// Any data in config files
            ->notName('general.php')// Item8 Legals contains cyrillic symbols
            ->notName('MarketParser.php')
            // Some API Calls
            ->notName('CustomerContractsService.php')
            ->notName('VendorAgreementService.php')
            ->notName('CustomerAgreementService.php')
            ->notName('VendorContractsService.php')
            // Reqs for Docx
            ->notName('documents.php')
            ->notName('DocumentBaseService.php')
            // By types
            ->notName('*.css')
            ->notName('*.js')
            ->notName('*.volt')
            ->notName('*.docx')
            ->notName('*.html')
            ->notName('*.phtml');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $content = openFile($file->getPathname());

            if (preg_match('#[А-Яа-яЁё]#ius', $content)) {
                fail('File contains cyrilic symbols: ' . $file); // Short message in terminal
            } else {
                success();
            }
        }

        isTrue(true); // One assert  is minimum for test
    }
}
