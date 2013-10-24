<?php
/**
 * File of the php loader implementation
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

use Masthowasli\Component\FeatureToggle\Feature\Collection;
/**
 * Raw php implementation of the LoaderInterface
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Loader
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Php implements LoaderInterface
{
    protected $file;

    public function __construct(\SplFileObject $file)
    {
        $this->file = $file;
    }

    /**
     * @inheritdoc
     */
    public function load()
    {
        require_once $this->file->getPathname();

        if (!isset($featureToggleDefinition)) {
            $featureToggleDefinition = array();
        }

        return new Collection($featureToggleDefinition);
    }
}
