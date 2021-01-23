<?php
// RUNNER STUB START
include 'ValidatingFormHelper.php';

class ButtonValidationTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }
// RUNNER STUB END
    public function testButtonNoTypeOK() {
        $form = new FormHelper();
        $html = $form->tag('button');
        $this->assertEquals('<button  />',$html);
    }
    public function testButtonTypeSubmitOK() {
        $form = new FormHelper();
        $html = $form->tag('button',['type'=>'submit']);
        $this->assertEquals('<button type="submit" />',$html);
    }
    public function testButtonTypeResetOK() {
        $form = new FormHelper();
        $html = $form->tag('button',['type'=>'reset']);
        $this->assertEquals('<button type="reset" />',$html);
    }
    public function testButtonTypeButtonOK() {
        $form = new FormHelper();
        $html = $form->tag('button',['type'=>'button']);
        $this->assertEquals('<button type="button" />',$html);
    }
    public function testButtonTypeOtherFails() {
        $form = new FormHelper();
        // FormHelper에 잘못된 속성이 입력되면
        // InvalidArgumentException가 발생되어야 한다.
        $this->setExpectedException('InvalidArgumentException');
        $html = $form->tag('button',['type'=>'other']);
    }
// RUNNER STUB START
}
// RUNNER STUB END
