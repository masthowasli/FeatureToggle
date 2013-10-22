<?php
/**
 * File of a collection class of features
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

use Masthowasli\Component\FeatureToggle\Exception\Feature as FeatureException;

/**
 * Collection class for features
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Feature
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Collection extends \ArrayIterator
{
    /**
     * Enforces the insertion of Requirement instances
     *
     * @param string      $offset The offset to set
     * @param Requirement $newval The value to set
     *
     * @see \ArrayIterator::offsetSet()
     *
     * @return void
     */
    public function offsetSet($offset, $newvalue)
    {
        $this->testForFeatureInstance($newvalue);

        parent::offsetSet($offset, $newvalue);
    }

    /**
     * Enforces the insertion of Requirement instances
     *
     * @param Requirement $newval The value to set
     *
     * @see \ArrayIterator::append()
     *
     * @return void
     */
    public function append($value)
    {
        $this->testForFeatureInstance($value);

        parent::append($value);
    }

    private function testForFeatureInstance($value)
    {
        if (!$value instanceof FeatureInterface) {
            throw new FeatureException(
                sprintf(
                    'Value is of type "%s". Instance of interface '
                    . 'FeatureInterface expected.',
                    is_object($value) ? get_class($value) : gettype($value)
                )
            );
        }
    }
}
