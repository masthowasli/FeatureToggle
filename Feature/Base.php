<?php
/**
 * File of the Feature class
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
 * @copyright  2013-2014 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Feature;

use Masthowasli\Component\FeatureToggle\Requirement\Collection as Requirements;

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
abstract class Base implements FeatureInterface
{
    /**
     * The feature name
     *
     * @var string The feature name
     */
    protected $name = '';

    /**
     * @var FeatureState
     */
    protected $state;

    /**
     * The feature's requirements
     *
     * @var Requirements
     */
    protected  $requirements = null;

    public function __construct($name)
    {
        $this->name = $name;
        $this->requirements = new Requirements(array());
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
}
