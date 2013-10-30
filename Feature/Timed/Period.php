<?php
/**
 * File of the class for a time based feature period
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

namespace Masthowasli\Component\FeatureToggle\Feature\Timed;

use Masthowasli\Component\FeatureToggle\Exception\Period as PeriodException;

/**
 * Time based feature period class
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Period
{
    private $activeFrom = null;

    private $activeTo = null;

    public function __construct(\DateTime $activeFrom, \DateTime $activeTo)
    {
        if ($activeFrom >= $activeTo) {
            throw new PeriodException();
        }

        $this->activeFrom = $activeFrom;
        $this->activeTo = $activeTo;
    }

    public function isWithin(\DateTime $needle)
    {
        return $this->activeFrom <= $needle && $needle <= $this->activeTo;
    }
}