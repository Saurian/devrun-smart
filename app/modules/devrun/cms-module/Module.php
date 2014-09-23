<?php

/**
 * This file is part of the Devrun:CMS
 *
 * Copyright (c) 2014, Pavel Paulík (http://www.pavelpaulik.cz)
 *
 */

namespace CmsModule;

use Devrun\Module\ComposerModule;

/**
 * @author Pavel Paulík <pavel.paulik1@gmail.com>
 */
class Module extends ComposerModule
{

	public function getRequire()
	{
		return parent::getRequire() + array(
			'ajax' => '2.0.x',
		);
	}
}
