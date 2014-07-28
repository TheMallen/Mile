<?php

namespace test;

class MileTest extends \PHPUnit_Framework_TestCase {

    public function testPut()
    {
        $mile = new \themallen\mile\Mile(array('baseDir'=>dirname(__FILE__)));
        $temp = $mile->put('/test/output/path','test test test');
        $this->assertEquals(file_get_contents(dirname(__FILE__).'/test/output/path'),'test test test');
    }
}
