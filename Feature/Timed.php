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

use Masthowasli\Component\FeatureToggle\Feature\Base as Feature;
use Masthowasli\Component\FeatureToggle\Feature\Timed\Period;

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
    private $period = null;

    public function __construct($name, Period $period)
    {
        parent::__construct($name);
        $this->period = $period;

        $now = new \DateTime();
        $this->state = $this->period->isWithin($now)
            ? new FeatureState(FeatureState::ENABLED)
            : new FeatureState(FeatureState::DISABLED);
    }

    public function on() {
        return $this->state->on();
    }

    public function off() {
        return $this->state->off();
    }
}
