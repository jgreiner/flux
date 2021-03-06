<?php
namespace FluidTYPO3\Flux\ViewHelpers\Be\Link\Content;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Claus Due <claus@namelesscoder.net>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

use FluidTYPO3\Flux\Tests\Fixtures\Data\Records;
use FluidTYPO3\Flux\ViewHelpers\AbstractViewHelperTest;

/**
 * @package Flux
 */
class NewViewHelperTest extends AbstractViewHelperTest {

	/**
	 * Setup
	 */
	protected function setUp() {
		parent::setUp();
		$GLOBALS['TBE_STYLES']['spriteIconApi']['iconsAvailable'] = array();
	}

	/**
	 * @test
	 */
	public function canRenderWithRowAndArea() {
		$arguments = array(
			'area' => 'test',
			'row' => Records::$contentRecordWithoutParentAndWithoutChildren,
			'after' => Records::$contentRecordWithParentAndWithoutChildren['uid']
		);
		$this->executeViewHelper($arguments);
	}

	/**
	 * @test
	 */
	public function canRenderWithRowAndAreaAndNegativeRelativeUid() {
		$arguments = array(
			'area' => 'test',
			'row' => Records::$contentRecordWithoutParentAndWithoutChildren,
			'after' => 0 - intval(Records::$contentRecordWithParentAndWithoutChildren['uid'])
		);
		$this->executeViewHelper($arguments);
	}

}
