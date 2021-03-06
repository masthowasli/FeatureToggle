<?php
/**
 * File of the timed feature tests
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

namespace Masthowasli\Component\FeatureToggle\Tests\Feature;

use Masthowasli\Component\FeatureToggle\Feature\FeatureState;

/**
 * Test class for Feature.
 * Generated by PHPUnit on 2013-04-04 at 16:27:27.
 */
class FeatureStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FeatureState
     */
    protected $state;

    public function testCurrent()
    {
        $enabledFeature = new FeatureState(FeatureState::ENABLED);

        $this->assertTrue(
            $enabledFeature->on()
        );

        $this->assertFalse(
            $enabledFeature->off()
        );

        $disabledFeature = new FeatureState(FeatureState::DISABLED);

        $this->assertFalse(
            $disabledFeature->on()
        );

        $this->assertTrue(
            $disabledFeature->off()
        );
    }

    public function testGetComplementary()
    {
        $state = new FeatureState(FeatureState::ENABLED);
        $state = $state->getComplementary();

        $this->assertFalse($state->on());

        $state = $state->getComplementary();

        $this->assertTrue($state->on());
    }
}
