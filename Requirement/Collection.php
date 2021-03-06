<?php
/**
 * File of a collection class of feture requirements
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5.3
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Requirement
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @copyright  2013-2014 - Thomas Sliwa
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */

namespace Masthowasli\Component\FeatureToggle\Requirement;

use Masthowasli\Component\FeatureToggle\Exception\Requirement as RequirementException;

/**
 * Collection class for feature requirements
 *
 * @category   Masthowasli
 * @package    FeatureToggle
 * @subpackage Requirement
 * @author     Thomas Sliwa <ts@unfinished.dyndns.org>
 * @license    http://opensource.org/licenses/MIT MIT
 * @link       https://github.com/masthowasli/FeatureToggle
 */
class Collection extends \ArrayIterator
{
    /**
     * Enforces the construction with an array consisting of Requirement instances
     *
     * @param array $array The array to construct with
     */
    public function __construct(array $array = array())
    {
        foreach ($array as $element) {
            $this->testForRequirementInstance($element);
        }

        parent::__construct($array);
    }

    /**
     * Enforces the insertion of Requirement instances
     *
     * @param string      $offset   The offset to set
     * @param Requirement $newvalue The value to set
     *
     * @see \ArrayIterator::offsetSet()
     *
     * @return void
     */
    public function offsetSet($offset, $newvalue)
    {
        $this->testForRequirementInstance($newvalue);

        parent::offsetSet($offset, $newvalue);
    }

    /**
     * Enforces the insertion of Requirement instances
     *
     * @param Requirement $value The value to append
     *
     * @see \ArrayIterator::append()
     *
     * @return void
     */
    public function append($value)
    {
        $this->testForRequirementInstance($value);

        parent::append($value);
    }

    private function testForRequirementInstance($value)
    {
        if (!$value instanceof Requirement) {
            throw new RequirementException(
                sprintf(
                    'Value is of type "%s". Instance of Requirement expected.',
                    is_object($value) ? get_class($value) : gettype($value)
                )
            );
        }
    }
}
