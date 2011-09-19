<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');

/**
*  @package    Kohana/Image
 * @category   Test
 * @author     Kohana Team
 * @copyright  (c) 2009-2011 Kohana Team
 * @license    http://http://kohanaframework.org/license
 */

class Kohana_ImageTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the Image::save() method for files that don't have extensions
	 *
	 * @return  void
	 */
	public function test_save_without_extension()
	{
		$image = Image::factory(MODPATH.'image/tests/test_data/test_image');
		$this->assertTrue($image->save(Kohana::$cache_dir.'/test_image'));

		unlink(Kohana::$cache_dir.'/test_image');
	}

} // End Kohana_ImageTest