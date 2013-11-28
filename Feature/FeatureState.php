<?php
/**
 * File of the feature state
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
 * Feature state representation
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class FeatureState {
    /*
     * Disabled feature constant
     */
    const DISABLED = 0;

    /*
     * Enabled feature constant
     */
    const ENABLED  = 1;

    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function on()
    {
        return self::ENABLED === $this->state;
    }

    public function off()
    {
        return !$this->on();
    }

    public function getComplementary()
    {
        $newState = self::ENABLED === $this->state
            ? self::DISABLED
            : self::ENABLED;

        return new FeatureState($newState);
    }
}
