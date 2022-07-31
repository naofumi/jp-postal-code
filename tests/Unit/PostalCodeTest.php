<?php

namespace Tests\Unit;
use App\Models\PostalCode;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

class PostalCodeTest extends TestCase
{
    public function testFormattedPostalCodeCorrectlyFormatsFromStringWithoutHypen()
    {
        $postalCode = PostalCode::factory()->make(['postal_code' => '2140037']);
        $this->assertEquals('214-0037', $postalCode->formattedPostalCode());
    }

    public function testFormattedPostalCodeIgnoresStringWithHypens()
    {
        $postalCode = PostalCode::factory()->make(['postal_code' => '1-234']);
        $this->assertEquals('1-234', $postalCode->formattedPostalCode());
    }

    public function testNormalizePostalCodeFromZenkaku()
    {
        # We test the private method `normalizePostalCode()` because
        # the public interface is a scope and testing through that will
        # require hitting the database, which will slow down tests.
        $method = new ReflectionMethod('App\Models\PostalCode', 'normalizePostalCode');
        $method->setAccessible(true);

        $string = $method->invoke(null, '２１４００３７');
        $this->assertEquals('2140037', $string);
    }

    public function testNormalizePostalCodeRejectsNonNumbers()
    {
        $method = new ReflectionMethod('App\Models\PostalCode', 'normalizePostalCode');
        $method->setAccessible(true);

        $string = $method->invoke(null, '２１４アBちa');
        $this->assertEquals('214', $string);
    }
}
