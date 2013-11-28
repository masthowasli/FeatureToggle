<?php
/**
 * File of the toggled feature tests
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Tests
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2012-2013 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Tests\Feature;

use Masthowasli\Component\FeatureToggle\Feature\Toggled;
use Masthowasli\Component\FeatureToggle\Feature\FeatureInterface;

/**
 * Test class for Feature.
 * Generated by PHPUnit on 2013-04-04 at 16:27:27.
 */
class ToggledTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $defaultName = 'test-toggle-feature';

    /**
     * @var Toggled
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Toggled($this->defaultName);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * Tests initial state of a new feature
     *
     * @covers \Masthowasli\Component\FeatureToggle\Feature\Toggled::__construct()
     */
    public function testConstructor()
    {
        $this->assertEquals($this->defaultName, $this->object->getName());
        $this->assertAttributeNotEquals(null, 'requirements', $this->object);
        $this->assertAttributeInstanceOf(
            '\Masthowasli\Component\FeatureToggle\Requirement\Collection',
            'requirements',
            $this->object
        );
        $stateProperty = new \ReflectionProperty(
            'Masthowasli\Component\FeatureToggle\Feature\Toggled',
            'state'
        );
        $stateProperty->setAccessible(true);

        $this->assertInstanceOf(
            'Masthowasli\Component\FeatureToggle\Feature\FeatureState',
            $stateProperty->getValue($this->object)
        );
    }

    public function testIsEnabled()
    {
        $this->assertFalse($this->object->isEnabled());

        $this->object->toggle();

        $this->assertTrue($this->object->isEnabled());

        $this->object->toggle();

        $this->assertFalse($this->object->isEnabled());
    }

    public function testName()
    {
        $this->assertEquals($this->defaultName, $this->object->getName());
    }
}
