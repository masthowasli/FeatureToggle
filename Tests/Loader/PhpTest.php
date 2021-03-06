<?php
/**
 * File of th Feature Tests
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
 * @copyright  2012-2014 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Tests\Loader;

use Masthowasli\Component\FeatureToggle\Loader\Php;

/**
 * Test class for Feature.
 * Generated by PHPUnit on 2013-04-04 at 16:27:27.
 */
class PhpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \SplFileObject
     */
    protected $fixture;

    /**
     * @var Php
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * Prepares the Loader Object with the given feature
     *
     * @param \SplFileObject $fixtureFile The file to load as fixture
     *
     * @return void
     */
    protected function prepareObject(\SplFileObject $fixtureFile)
    {
        $this->object = new Php($fixtureFile);
    }

    protected function getPassingFixture()
    {
        return new \SplFileObject(
            __DIR__ . '/fixture/php.fixture'
        );
    }

    protected function getEmptyFixture()
    {
        return new \SplFileObject(
            __DIR__ . '/fixture/php.empty.fixture'
        );
    }

    protected function getStructureFaultyFixture()
    {
        return new \SplFileObject(
            __DIR__ . '/fixture/php.faulty.fixture'
        );
    }

    protected function getCyclicFixture()
    {
        return new \SplFileObject(
            __DIR__ . '/fixture/php.cyclic.fixture'
        );
    }

    /**
     * Tests initial state of a new feature
     *
     * @covers \Masthowasli\Component\FeatureToggle\Loader\Php::__construct()
     */
    public function testConstructor()
    {
        $this->prepareObject($this->getPassingFixture());
        $this->assertInstanceOf(
            '\Masthowasli\Component\FeatureToggle\Loader\Php',
            $this->object
        );
        $this->assertObjectHasAttribute('file', $this->object);

        $prop = new \ReflectionProperty(
            '\Masthowasli\Component\FeatureToggle\Loader\Php',
            'file'
        );
        $prop->setAccessible(true);

        $this->assertInstanceOf(
            '\SplFileObject',
            $prop->getValue($this->object)
        );
    }

    /**
     * Tests the load method
     *
     * @return void
     */
    public function testLoad()
    {
        $this->prepareObject($this->getEmptyFixture());
        $this->assertInstanceOf(
            '\Masthowasli\Component\FeatureToggle\Feature\Collection',
            $this->object->load()
        );
        $this->assertEquals(0, count($this->object->load()));
        $this->prepareObject($this->getPassingFixture());
        $this->assertEquals(2, count($this->object->load()));
    }

    /**
     * Test for the load parsing exception
     *
     * @return void
     */
    public function testLoadParseExeception()
    {
        $this->prepareObject($this->getStructureFaultyFixture());
        $this->setExpectedException(
            'Masthowasli\Component\FeatureToggle\Exception\Loader'
        );
        $this->object->load();
    }

    /**
     * Test for the requirement parsing exception
     *
     * @return void
     */
    public function testRequirementParseException()
    {

    }
}
