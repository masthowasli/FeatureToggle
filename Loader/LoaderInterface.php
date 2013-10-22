<?php
/**
 * File of the feature toggle loader interface
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Loader
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2012-2013 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Loader;

use Masthowasli\Component\FeatureToggle\Collection;

/**
 * Interface defining the loader API for feature toggles
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Loader
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
interface LoaderInterface
{
    /**
     * Loads the defined features
     *
     * @return Collection The loaded features
     */
    public function load();
}