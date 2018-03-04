<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class StringTest extends TestCase {
	
	private $string;
 
    protected function setUp()
    {
        //$this->string = new BerrySlug\Slug();
    }
 
    protected function tearDown()
    {
        //$this->string = NULL;
    }
 
    public function testLength()
    {
        $string = new BerryString\BString('Hello World!');
        
        $this->assertEquals(12, $string->length());
        
        // Slugs
        $string->slug();
        $this->assertEquals('hello-world', (string) $string);
        
        // Length without "!" character (hello-world)
        $this->assertEquals(11, $string->length());
        
        // To upper
        $string->upper();
        $this->assertEquals('HELLO-WORLD', (string) $string);
        
        
        // Replace (-) with space ( )
        $string->replaceChar('-', ' ');
        
        $this->assertEquals('HELLO WORLD', (string) $string);
        
        // substr(0, 5)
        $string->substr(0, 5);
        $this->assertEquals('HELLO', (string) $string);
        
        // copy BString instance
        $copy = $string->getClone()->lower();
        
        
        $this->assertEquals(true, $string->isSameLength($copy));
        
        $this->assertEquals(true, $string->isSameLength('cinco'));
        $this->assertEquals(true, $string->isSameLength('😀😀😀😀😀'));
        
        
        $copy->append('!');
        $this->assertEquals('hello!', (string) $copy);
        
        
        $copy->prepend('¡');
        $this->assertEquals('¡hello!', (string) $copy);
        
    }
}