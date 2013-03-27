<?php
namespace FlorianWolters\Component\Geometry;

use \ReflectionClass;

/**
 * Test class for {@see Dimension2D}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Geometry
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Geometry\Dimension2D
 */
class Dimension2DTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The {@see Dimension2D} under test.
     *
     * @var Dimension2D
     */
    private $dimension2d;

    /**
     * @var ReflectionClass
     */
    private $reflectedClass;

    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->dimension2d = new Dimension2D(1024, 768);

        $className = __NAMESPACE__ . '\Dimension2D';
        $this->reflectedClass = new ReflectionClass($className);
    }

    /**
     * @return void
     *
     * @group specification
     * @test
     */
    public function testIsClassFinal()
    {
        $this->assertTrue($this->reflectedClass->isFinal());
    }

    /**
     * @return void
     *
     * @group specification
     * @test
     */
    public function testIsClassNotCloneable()
    {
        $this->assertTrue($this->reflectedClass->isCloneable());
    }

    /**
     * @return void
     *
     * @expectedException FlorianWolters\Component\Core\ImmutableException
     * @test
     */
    public function testConstructThrowsImmutableException()
    {
        $this->dimension2d->__construct(1024, 768);
    }

    /**
     * @return void
     *
     * @expectedException FlorianWolters\Component\Core\ImmutableException
     * @test
     */
    public function testPropertyAssignmentThrowsImmutableException()
    {
        $this->dimension2d->width = 768;
    }

    /**
     * @return mixed[]
     */
    public static function providerInvalidArgument()
    {
        return [
            [null],
            [new \stdClass],
            [''],
            [.1],
            ['1024'],
            [-1]
        ];
    }

    /**
     * @return void
     *
     * @coversDefaultClass __construct
     * @dataProvider providerInvalidArgument
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testConstructorWithInvalidWidth($width)
    {
        new Dimension2D($width, 768);
    }

    /**
     * @return void
     *
     * @coversDefaultClass __construct
     * @dataProvider providerInvalidArgument
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testConstructorWithInvalidHeight($height)
    {
        new Dimension2D(1024, $height);
    }

    /**
     * @return void
     *
     * @coversDefaultClass getWidth
     * @test
     */
    public function testGetWidth()
    {
        $expected = 1024;
        $actual = $this->dimension2d->getWidth();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass getWidth
     * @test
     */
    public function testGetHeight()
    {
        $expected = 768;
        $actual = $this->dimension2d->getHeight();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass __toString
     * @test
     */
    public function testMagicMethodToString()
    {
        $expected = '[1024, 768]';
        $actual = $this->dimension2d->__toString();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerEquals()
    {
        return [
            [true, new Dimension2D(1024, 768)],
            [false, new Dimension2D(0, 0)],
            [false, new Dimension2D(1024, 0)],
            [false, new Dimension2D(0, 768)], [
                false,
                \PHPUnit_Framework_MockObject_Generator::getMock(
                    'FlorianWolters\Component\Core\EqualityInterface'
                )
            ]
        ];
    }

    /**
     * @return void
     *
     * @coversDefaultClass equals
     * @dataProvider providerEquals
     * @test
     */
    public function testEquals($expected, $other)
    {
        $actual = $this->dimension2d->equals($other);
        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected, $other->equals($this->dimension2d));
    }

    /**
     * @return void
     *
     * @coversDefaultClass equals
     * @test
     */
    public function testEqualsWithNullArgument()
    {
        $actual = $this->dimension2d->equals(null);

        $this->assertFalse($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass equals
     * @test
     */
    public function testEqualsWithIdenticalObject()
    {
        $actual = $this->dimension2d->equals($this->dimension2d);

        $this->assertTrue($actual);
    }
}
