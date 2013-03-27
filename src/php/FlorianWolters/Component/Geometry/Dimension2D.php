<?php
namespace FlorianWolters\Component\Geometry;

use \InvalidArgumentException;

use FlorianWolters\Component\Core\DebugPrintInterface;
use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\ImmutableInterface;
use FlorianWolters\Component\Core\ImmutableTrait;

/**
 * The class {@see Dimension2D} encapsulates the width and height of a component
 * (in integer precision) in a single object.
 *
 * This class implements the *Value Object* implementation pattern.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Geometry
 * @since     Class available since Release 0.1.0
 */
final class Dimension2D implements
     DebugPrintInterface,
     EqualityInterface,
     ImmutableInterface
{
    use ImmutableTrait
    {
        __construct as constructImmutableTrait;
    }

    /**
     * The width of this {@see Dimension2D}.
     *
     * @var integer
     */
    private $width;

    /**
     * The height of this {@see Dimension2D}.
     *
     * @var integer
     */
    private $height;

    /**
     * Constructs a {@see Dimension2D} and initializes it to the specified width
     * and the specified height.
     *
     * @param integer $width  The width of the {@see Dimension2D}.
     * @param integer $height The height of the {@see Dimension2D}.
     *
     * @throws InvalidArgumentException If `$width` is not an unsigned
     *                                  `integer`.
     * @throws InvalidArgumentException If `$height` is not an unsigned
     *                                  `integer`.
     */
    public function __construct($width, $height)
    {
        $this->constructImmutableTrait();
        $this->setSize($width, $height);
    }

    /**
     * Sets the size of this {@see Dimension2D} object to the specified width
     * and the specified height.
     *
     * @param integer $width  The width.
     * @param integer $height The height.
     *
     * @return void
     * @throws InvalidArgumentException If `$width` is not an unsigned
     *                                  `integer`.
     * @throws InvalidArgumentException If `$height` is not an unsigned
     *                                  `integer`.
     */
    private function setSize($width, $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * Sets the width of this {@see Dimension2D}.
     *
     * @param integer $width The width.
     *
     * @return void
     * @throws InvalidArgumentException If `$width` is not an unsigned
     *                                  `integer`.
     */
    private function setWidth($width)
    {
        $this->throwExceptionIfInvalidDimension($width);
        $this->width = $width;
    }

    /**
     * Throws an {@see InvalidArgumentException} if the specified value is not
     * an unsigned `integer`.
     *
     * @param mixed $value The value to check.
     *
     * @return void
     * @throws InvalidArgumentException If `$value` is not an unsigned
     *                                  `integer`.
     */
    private function throwExceptionIfInvalidDimension($value)
    {
        if (false === \is_int($value) || 0 > $value) {
            throw new InvalidArgumentException(
                'A dimension must be a positive integer.'
            );
        }
    }

    /**
     * Sets the height of this {@see Dimension2D}.
     *
     * @param integer $height The height.
     *
     * @return void
     * @throws InvalidArgumentException If `$height` is not an unsigned
     *                                  `integer`.
     */
    private function setHeight($height)
    {
        $this->throwExceptionIfInvalidDimension($height);
        $this->height = $height;
    }

    /**
     * Returns the width of this {@see Dimension2D}.
     *
     * @return integer The width.
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Returns the height of this {@see Dimension2D}.
     *
     * @return integer The height.
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Returns a string representation of this {@see Dimension2D} object.
     *
     * The string representation is in the form `[<Width>, <Height>]`.
     *
     * {@inheritdoc}
     *
     * @return string The string representation.
     */
    public function __toString()
    {
        return '[' . $this->width . ', ' . $this->height . ']';
    }

    /**
     * Indicates whether the specified object is "equal to" this object.
     *
     * @param EqualityInterface|null $other The reference object with which to
     *                                      compare.
     *
     * @return boolean `true` if this object is the same as the specified
     *                 object; `false` otherwise.
     */

    /**
     * Indicates whether the specified {@see Dimension2D} is equal to this {@see
     * Dimension2D}.
     *
     * Two {@see Dimension2D} objects are equal if both their width and height
     * are equal.
     *
     * @param EqualityInterface|null $other The {@see Dimension2D} object with
     *                                      which to compare.
     *
     * @return boolean `true` if this {@see Dimension2D} is equal to the
     *                 specified {@see Dimension2D}; `false` otherwise.
     */
    public function equals(EqualityInterface $other = null)
    {
        return ($this == $other);
    }
}
