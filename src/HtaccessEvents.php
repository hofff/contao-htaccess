<?php

/**
 * htaccess editor extension for the Contao Open Source CMS
 *
 * Copyright (C) 2013,2014 bit3 UG <http://bit3.de>
 *
 * @copyright (C) 2013,2014 bit3 UG
 * @author        Tristan Lins <tristan.lins@bit3.de>
 * @package       bit3/contao-htaccess
 * @license       LGPL-3.0+
 * @link          http://bit3.de
 */

namespace Bit3\Contao\Htaccess;

/**
 * Class HtaccessEvents
 */
class HtaccessEvents
{
	/**
	 * The GENERATE event occurs when a htaccess file will be generated.
	 *
	 * This event allows you to generate code into the .htaccess file. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateHtaccessEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE = 'htaccess.generate';

	/**
	 * The GENERATE_AUTH event occurs when the auth part will be generated.
	 *
	 * This event allows you to generate code into the auth part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateAuthEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_AUTH = 'htaccess.generate-auth';

	/**
	 * The GENERATE_CUSTOM event occurs when the mid-part will be generated.
	 *
	 * This event allows you to generate code into the mid-part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateCustomEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_CUSTOM = 'htaccess.generate-custom';

	/**
	 * The GENERATE_DEFLATE event occurs when the deflate part will be generated.
	 *
	 * This event allows you to generate code into the deflate part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateDeflateEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_DEFLATE = 'htaccess.generate-deflate';

	/**
	 * The GENERATE_EXPIRES event occurs when the expires part will be generated.
	 *
	 * This event allows you to generate code into the expires part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateExpiresEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_EXPIRES = 'htaccess.generate-expires';

	/**
	 * The GENERATE_HEADERS event occurs when the headers part will be generated.
	 *
	 * This event allows you to generate code into the headers part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateHeadersEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_HEADERS = 'htaccess.generate-header';

	/**
	 * The GENERATE_MIME event occurs when the mime part will be generated.
	 *
	 * This event allows you to generate code into the mime part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateMimeEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_MIME = 'htaccess.generate-mime';

	/**
	 * The GENERATE_REWRITES event occurs when the rewrite part will be generated.
	 *
	 * This event allows you to generate code into the rewrite part. The event listener
	 * method receives a Bit3\Contao\Htaccess\Event\GenerateRewriteEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const GENERATE_REWRITES = 'htaccess.generate-rewrites';
}
