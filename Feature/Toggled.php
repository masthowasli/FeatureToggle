<?php
/**
 * File of the class for a simple, on/off toggled feature
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2013 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Feature;

use Masthowasli\Component\FeatureToggle\Feature\Base as Feature;

/**
 * On/off feature class
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Toggled extends Feature
{
    public function __construct($name, FeatureState $state = null)
    {
        parent::__construct($name);

        if (null === $state) {
            $state = new FeatureState(FeatureState::DISABLED);
        }
        $this->state = $state;
    }

    /**
     * Whether this feature is on
     *
     * On means that the feature itself and all of the requirements
     * meet the boolean value true
     *
     * @return boolean Whether the feature is on
     */
    public function on()
    {
        return $this->state->on();
    }

    /**
     * Whether this feature is off
     *
     * Off means that the feature itself or one of the requirements
     * meet the boolean value false
     *
     * @return boolean Whether the feature is off
     */
    public function off()
    {
        return $this->state->off();
    }

    /**
     * Toggles the state of the feature
     *
     * @return void
     */
    public function toggle()
    {
        $this->state = $this->state->getComplementary();
    }
}
