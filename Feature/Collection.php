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
 * @copyright  2013-2014 - Thomas Sliwa
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
     * Enforces the construction with an array consisting of FeatureInterface
     * implementations
     *
     * @param array $array The array to construct with
     */
    public function __construct(array $array = array())
    {
        foreach ($array as $element) {
            $this->guardIsFeatureInterfaceInstance($element);
        }

        parent::__construct($array);
    }

    /**
     * Enforces the insertion of Requirement instances
     *
     * @param string      $offset   The offset to set
     * @param Requirement $newValue The value to set
     *
     * @see \ArrayIterator::offsetSet()
     *
     * @return void
     */
    public function offsetSet($offset, $newValue)
    {
        $this->guardIsFeatureInterfaceInstance($newValue);

        parent::offsetSet($offset, $newValue);
    }

    /**
     * Enforces the insertion of Requirement instances
     *
     * @param \Masthowasli\Component\FeatureToggle\Requirement\Requirement $value The value to append
     *
     * @see \ArrayIterator::append()
     *
     * @return void
     */
    public function append($value)
    {
        $this->guardIsFeatureInterfaceInstance($value);

        parent::append($value);
    }

    private function guardIsFeatureInterfaceInstance($value)
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
