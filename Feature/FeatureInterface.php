<?php
/**
 * FIle of the feature interface
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
 * @author     bytepark Gmbh <code@bytepark.de>
 * @license    http://www.bytepark.de proprietary
 * @link       http://www.bytepark.de
 */
interface FeatureInterface
{
    /*
     * Disabled feature constant
     */
    const FEATURE_DISABLED = 0;

    /*
     * Enabled feature constant
     */
    const FEATURE_ENABLED  = 1;

    /**
     * Access to the feature's name
     *
     * @return string The feature's name
     */
    public function getName();

    /**
     * Access to the feature's state
     *
     * @return integer The feature's state
     */
    public function getState();
}