<?php
/**
 * File of the class for a time based feature
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
 * Time based feature class
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Timed extends Feature
{
    private $activeFrom = null;

    private $activeTo = null;

    public function __construct($name, \DateTime $activeFrom, \DateTime $activeTo)
    {
        parent::__construct($name);
        $this->activeFrom = $activeFrom;
        $this->activeTo = $activeTo;

        $now = new \DateTime();
        if ($this->activeFrom <= $now && $this->activeTo >= $now) {
            $this->state = self::FEATURE_ENABLED;
        }
    }
}