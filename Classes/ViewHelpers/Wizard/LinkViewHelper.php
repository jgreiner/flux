<?php
namespace FluidTYPO3\Flux\ViewHelpers\Wizard;
/*****************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Claus Due <claus@namelesscoder.net>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 *****************************************************************/

use FluidTYPO3\Flux\Form\Wizard\Link;

/**
 * Field Wizard: Link
 *
 * @package Flux
 * @subpackage ViewHelpers/Wizard
 */
class LinkViewHelper extends AbstractWizardViewHelper {

	/**
	 * @var string
	 */
	protected $label = 'Select link';

	/**
	 * Initialize arguments
	 * @return void
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('activeTab', 'string', 'Active tab of the link popup', FALSE, 'file');
		$this->registerArgument('width', 'integer', 'Width of the popup window', FALSE, 500);
		$this->registerArgument('height', 'integer', 'height of the popup window', FALSE, 500);
		$this->registerArgument('allowedExtensions', 'string', 'Comma-separated list of extensions that are allowed to be selected. Default is all types.', FALSE, FALSE);
		$this->registerArgument('blindLinkOptions', 'string', 'Blind link options', FALSE, '');
		$this->registerArgument('blindLinkFields', 'string', 'Blind link fields', FALSE, '');
	}

	/**
	 * @return Link
	 */
	public function getComponent() {
		/** @var Link $component */
		$component = $this->getPreparedComponent('Link');
		$component->setActiveTab($this->arguments['activeTab']);
		$component->setWidth($this->arguments['width']);
		$component->setHeight($this->arguments['height']);
		$component->setAllowedExtensions($this->arguments['allowedExtensions']);
		$component->setBlindLinkOptions($this->arguments['blindLinkOptions']);
		$component->setBlindLinkFields($this->arguments['blindLinkFields']);
		return $component;
	}

}
