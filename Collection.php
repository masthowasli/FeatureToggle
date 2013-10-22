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
 * @copyright  2012-2013 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle;

/**
 * Defines a collection of feature implentations
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
     * @param offset
     */
    public function offsetExists ($offset) {}

    /**
     * @param offset
     */
    public function offsetGet ($offset) {}

    /**
     * @param offset
     * @param value
     */
    public function offsetSet ($offset, $value) {}

    /**
     * @param offset
     */
    public function offsetUnset ($offset) {}
}