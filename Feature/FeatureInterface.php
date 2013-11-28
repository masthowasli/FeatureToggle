<?php
/**
 * File of the feature interface
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     bytepark GmbH <code@bytepark.de>
 * @copyright  2012 - bytepark GmbH
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
     * Whether the feature is enabled
     *
     * @return boolean Whether the feature is enabled
     */
    public function isEnabled();
}
