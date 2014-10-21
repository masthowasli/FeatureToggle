<?php
/**
 * File of the feature interface
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2012-2014 - Thomas Sliwa
 * @license    http://www.bytepark.de proprietary
 * @link       http://www.bytepark.de
 */

namespace Masthowasli\Component\FeatureToggle\Feature;

/**
 * Interface defining a feature
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
interface FeatureInterface
{
    /**
     * Access to the feature's name
     *
     * @return string The feature's name
     */
    public function getName();

    /**
     * Whether the feature on
     *
     * On means the feature and all the requirements meet the
     * combined state true
     *
     * @return boolean Whether the feature on
     */
    public function on();

    /**
     * Whether the feature off
     *
     * Off means the feature or on of the requirements meet the
     * combined state false
     *
     * @return boolean Whether the feature off
     */
    public function off();
}
