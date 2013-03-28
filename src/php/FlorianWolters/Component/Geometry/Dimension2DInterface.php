<?php
namespace FlorianWolters\Component\Geometry;

use FlorianWolters\Component\Core\DebugPrintInterface;
use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\ImmutableInterface;

/**
 * The interface {@see Dimension2DInterface} allows to create a *Test Double*
 * for the *Immutable Class* {@see Dimension2D}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Geometry
 * @since     Interface available since Release 0.1.0
 */
interface Dimension2DInterface extends
     DebugPrintInterface,
     EqualityInterface,
     ImmutableInterface
{
    /**
     * Returns the width of this dimension.
     *
     * @return integer The width.
     */
    public function getWidth();

    /**
     * Returns the height of this dimension.
     *
     * @return integer The height.
     */
    public function getHeight();
}
