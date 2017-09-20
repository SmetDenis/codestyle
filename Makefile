#
# Unilead | Codestyle
#
# This file is part of the Unilead Service Package.
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @package      Codestyle
# @license      Proprietary
# @copyright    Copyright (C) Unilead Network, All rights reserved.
# @link         https://www.unileadnetwork.com
#

.PHONY: build test

update:
	@echo "\033[0;33m>>> >>> >>> >>> >>> >>> >>> >>> \033[0;30;46m Update composer (DEV) \033[0m"
	@composer update --no-progress
	@echo ""

test-all:
	@make test-phpunit
	@make test-phpmd
	@make test-phpcs

test-phpunit:
	@echo "\033[0;33m>>> >>> >>> >>> >>> >>> >>> >>> \033[0;30;46m Unit tests \033[0m"
	@php ./vendor/phpunit/phpunit/phpunit
	@echo ""

test-phpmd:
	@echo "\033[0;33m>>> >>> >>> >>> >>> >>> >>> >>> \033[0;30;46m Check by PHPmd \033[0m"
	@php ./vendor/phpmd/phpmd/src/bin/phpmd ./src text      \
         ./src/phpmd/unilead.xml --verbose

test-phpcs:
	@echo "\033[0;33m>>> >>> >>> >>> >>> >>> >>> >>> \033[0;30;46m Check PHP Code Style \033[0m"
	@php ./vendor/squizlabs/php_codesniffer/bin/phpcs           \
        --extensions=php,phtml                                  \
        --standard=./src/phpcs/Unilead/ruleset.xml              \
        --report=full                                           \
        --report-width=180                                      \
        --tab-width=4                                           \
        --report=full                                           \
        ./src
	@echo ""