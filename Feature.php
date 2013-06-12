<?php
/**
 * File of the Feature class
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

namespace Masthowasli\Component\FeatureToggle;

/**
 * Feature class
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Feature
{
    const FEATURE_DISABLED = 0;
    const FEATURE_ENABLED  = 1;

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