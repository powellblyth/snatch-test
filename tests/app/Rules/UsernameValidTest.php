<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Command
 */
final class UsernameValidTest extends TestCase {

    public function providergetWords() {
        return [
            [['cat'], 'Cat'],
            [['cat'], 'cat'],
            [['d','o','g'], 'dOG'],
            [['horseface'], 'Horseface'],
            [['cat','attack'], 'CatAttack'],
            [['scatter'],'Scatter']
        ];
    }

    /**
     * @dataProvider providergetWords
     * @param bool $expected
     * @param string $options
     * @param array $longOptions
     */
    public function testgetWords($expected, $username) {
        $sut = $this->getMockBuilder('\\App\\Rules\\UsernameValid')
            ->setMethods(array('fileHandleIsValid', 'getCSV'))
            ->disableOriginalConstructor()
            ->getMock();

        $class = new \ReflectionClass($sut);
        $method = $class->getMethod('getWords');
        $method->setAccessible(true);
        $results = $method->invokeArgs($sut, [$username]);
        $this->assertEquals($expected, $results);
    }
}
