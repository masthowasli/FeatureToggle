<?php
/**
 * File of the feature toggle manager
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Manager
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2012-2013 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace \Masthowasli\Component\FeatureToggle;

use Masthowasli\Component\FeatureToggle\Loader\LoaderInterface;

/**
 * Class to manage all defined features
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Manager
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Manager
{
    private $loader = null;

    private $featureCollection = null;

    /**
     * Instantiates the manager with the given loader
     *
     * @param Loader $loader The loader to get the features from
     */
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;

        $this->featureCollection = $this->loader->load();
    }
}