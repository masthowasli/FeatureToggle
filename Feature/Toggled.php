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
use Masthowasli\Component\FeatureToggle\Feature\FeatureState;

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
     * Whether this feature is enabled
     *
     * @return boolean Whether the feature is enabled
     */
    public function isEnabled()
    {
        return $this->state->on();
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
