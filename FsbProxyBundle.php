<?php

namespace Fsb\Bundle\ProxyBundle;

use LogicException;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

use Fsb\Bundle\ProxyBundle\DependencyInjection\FsbProxyExtension;

/**
 * ProxyExtension
 *
 * @package   Fsb\Bundle\ProxyBundle
 * @author    Florent Schildknecht
 *
 * @version   0.1
 * @since     2015-06
 */
class FsbProxyBundle extends Bundle
{
	/**
	 * Overwrite getContainerExtension
	 *  - no naming convention of alias needed
	 *  - extension class can be moved easily now
	 *
	 * @see     getContainerExtension
	 *
	 * @author  Florent Schildknecht
	 * @version 0.1
	 * @since   2015-06
	 *
	 * @return  ExtensionInterface|null The container extension
	 * @throws  LogicException
	 */
	public function getContainerExtension() {
		if (is_null($this->extension)) {
			$extension = new FsbProxyExtension();

			if (!$extension instanceof ExtensionInterface) {
				$message = sprintf('%s is not a instance of ExtensionInterface', $extension->getClass());

				throw new LogicException($message);
			}

			$this->extension = $extension;
		}

		return $this->extension;
	}
}
