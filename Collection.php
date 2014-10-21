<?php
/**
 * File of the feature toggle collection class
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Collection
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2012-2014 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle;

/**
 * Defines a collection of feature implementations
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Collection
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Collection implements \ArrayAccess, \IteratorAggregate
{
    private $store = array();

    /**
     * Builds an iterator for the instance
     *
     * @see IteratorAggregate::getIterator()
     *
     * @return \ArrayIterator The iterator of the instance
     */
    public function getIterator ()
    {
        return new ArrayIterator($this->store);
    }

    /**
     * @{inheritdoc}
     */
    public function offsetExists ($offset) {}

    /**
     * @{inheritdoc}
     */
    public function offsetGet ($offset) {}

    /**
     * @{inheritdoc}
     */
    public function offsetSet ($offset, $value) {}

    /**
     * @{inheritdoc}
     */
    public function offsetUnset ($offset) {}
}