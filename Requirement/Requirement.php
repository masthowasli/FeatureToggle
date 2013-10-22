<?php
/**
 * File of feature requirement class
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Requirement
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2012-2013 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Requirement;

use Masthowasli\Component\FeatureToggle\Feature\FeatureInterface;
use Masthowasli\Component\FeatureToggle\Exception\Requirement as RequirementException;

/**
 * Requirement class to express the inclusion and or exclusion of a Feature
 *
 * The class represents the required state of a Feature. Per default a
 * requirement has to be enabled. This behaviour can be changed during
 * construction time or by setter.
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Requirement
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Requirement
{
    const FEATURE_DISABLED = 0;
    const FEATURE_ENABLED  = 1;

    private $requiredState = null;

    private $feature = null;

    private $allowedStates = array(
        'FEATURE_DISABLED' => 0,
        'FEATURE_ENABLED'  => 1
    );

    /**
     * Instantiates a new feature requirement
     *
     * The required feature has to be given in the instanciation process. If no
     * required state is given, the call defaults to Requirement::FEATURE_ENABLED,
     * whcih means the required feature has to be enabled so that the requirement
     * is fullfilled.
     *
     *
     * @param Feature $feature       The feature to require
     * @param integer $requiredState The required state of the feature
     */
    public function __construct(
            FeatureInterface $feature,
            $requiredState = self::FEATURE_ENABLED
    ) {
        $this->feature = $feature;

        $this->setRequiredState($requiredState);
    }

    /**
     * Sets the required state of a required feature
     *
     * The allowed values are one of Requirement::FEATURE_DISABLED or
     * Requirement::FEATURE_ENABLED
     *
     * @param integer $state The feature state to set
     *
     * @throws RequirementException
     *
     * @return Requirement This instance
     */
    public function setRequiredState($state)
    {
        if (!is_integer($state) && in_array($state, $this->allowedStates)) {
            throw new RequirementException(
                sprintf(
                    'Unknown state "%s", expected one of "%s"',
                    $state,
                    implode('" or "', array_keys($this->allowedStates))
                )
            );
        }

        $this->requiredState = $state;

        return $this;
    }

    public function getRequiredState()
    {
        return $this->requiredState;
    }
}