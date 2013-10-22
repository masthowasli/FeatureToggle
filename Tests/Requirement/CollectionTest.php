<?php
/**
 * File of the requirement Collection tests
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

namespace Masthowasli\Component\FeatureToggle\Tests\Requirement;

use Masthowasli\Component\FeatureToggle\Requirement\Collection;
use Masthowasli\Component\FeatureToggle\Requirement\Requirement;
use Masthowasli\Component\FeatureToggle\Feature;

/**
 * Test class for Collection.
 * Generated by PHPUnit on 2013-04-05 at 14:27:17.
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Collection(array());
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::__construct
     */
    public function testConstructor()
    {
        $this->setExpectedException('\Masthowasli\Component\FeatureToggle\Exception\Requirement');
        $coll = new Collection(array(1, 2, 3));

        $coll = new Collection(
            array(
                new Feature('foo'),
                new Feature('bar')
            )
        );

        $this->assertEquals(2, $coll->count());
    }

    /**
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::offsetSet
     */
    public function testOffsetSetFail()
    {
        $this->setExpectedException('\Masthowasli\Component\FeatureToggle\Exception\Requirement');
        $this->object->offsetSet(0, 'foo');
    }

    /**
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::offsetSet
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::testForFeatureInstance
     */
    public function testOffsetSet()
    {
        $requirement = new Requirement(new Feature\Toggled('bar'));
        $this->object->offsetSet(0, $requirement);

        $this->assertEquals(1, $this->object->count());
        $this->assertEquals($requirement, $this->object[0]);
    }

    /**
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::append
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::testForFeatureInstance
     */
    public function testAppendFail()
    {
        $this->setExpectedException('\Masthowasli\Component\FeatureToggle\Exception\Requirement');
        $this->object->offsetSet(0, 'foo');
    }

    /**
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::append
     * @covers Masthowasli\Component\FeatureToggle\Requirement\Collection::testForFeatureInstance
     */
    public function testAppend()
    {
        $requirement = new Requirement(new Feature\Toggled('bar'));
        $this->object->append($requirement);

        $this->assertEquals(1, $this->object->count());
        $this->assertEquals($requirement, $this->object->current());
    }
}
