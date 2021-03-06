<?php
namespace FluidTYPO3\Flux\ViewHelpers\Form;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Claus Due <claus@wildside.dk>
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
 *****************************************************************/

use FluidTYPO3\Flux\Form\Container\Section;
use FluidTYPO3\Flux\ViewHelpers\AbstractFormViewHelper;

/**
 * FlexForm field section object ViewHelper
 *
 * Use this inside flux:form.section to name and divide the fields
 * into individual objects that can be inserted into the section.
 *
 * @package Flux
 * @subpackage ViewHelpers/Form
 */
class ObjectViewHelper extends AbstractFormViewHelper {

	/**
	 * Initialize
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerArgument('name', 'string', 'Name of the section object, FlexForm XML-valid tag name string', TRUE);
		$this->registerArgument('label', 'string', 'Label for section object, can be LLL: value. Optional - if not specified, ' .
			'Flux tries to detect an LLL label named "flux.fluxFormId.objects.foobar" based on object name, in scope of ' .
			'extension rendering the Flux form.', FALSE, NULL);
	}

	/**
	 * Render method
	 * @return void
	 */
	public function render() {
		/** @var Section $object */
		$object = $this->objectManager->get('FluidTYPO3\Flux\Form\Container\Object');
		$object->setName($this->arguments['name']);
		$object->setLabel($this->arguments['label']);
		$container = $this->getContainer();
		$container->add($object);
		$this->setContainer($object);
		$this->renderChildren();
		$this->setContainer($container);
	}

}
