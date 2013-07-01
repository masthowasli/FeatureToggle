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

use \Masthowasli\Component\FeatureToggle\Feature\FeatureInterface;

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
class Toggled implements FeatureInterface
{
    /**
     * The feature name
     *
     * @var string The feature name
     */
    private $name = '';

    private $state = self::FEATURE_DISABLED;

    /**
     * The feature's requirements
     *
     * @var \Masthowasli\Component\FeatureToggle\Requirement\Collection
     */
    private $requirements = null;

    public function __construct($name, $state = self::FEATURE_DISABLED)
    {
        $this->name = $name;
        $this->state = $state;
        $this->requirements = new \Masthowasli\Component\FeatureToggle\Requirement\Collection(array());
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

    /**
     * Feature name getter
     *
     * @return string The feature's name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Feature state getter
     *
     * @return integer The feature's state
     */
    public function getState()
    {
        return $this->state;
    }
}