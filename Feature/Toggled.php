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

use \Masthowasli\Component\FeatureToggle\Feature\Base as Feature;

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
    public function __construct($name, $state = self::FEATURE_DISABLED)
    {
        parent::__construct($name);
        $this->state = $state;
    }

    public function setState($state)
    {
        if (!is_integer($state)) {
            throw new \InvalidArgumentException(
                "The feature state has to be an integer constant value."
            );
        }

        $this->state = $state;

        return $this;
    }
}