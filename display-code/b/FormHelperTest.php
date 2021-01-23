include 'FormHelper.php';

class FormHelperTest extends PHPUnit_Framework_TestCase {

    public $products = [ 'cu&ke' => '��ģ <�ٴ�> �ػ�',
                         'stomach' => '"����"',
                         'tripe' => '���� �ҽ� ���â',
                         'taro' => '������� �����',
                         'giblets' => '��â �ұ� ����',
                         'abalone' => '���� ȣ�� ����'];
    public $stooges = ['Larry','Moe','Curly','Shemp'];

    // �� �ڵ�� �� �׽�Ʈ ���� �����Ѵ�.
    // �� �׽�Ʈ �޼��忡�� �ݺ��ϴ� �ͺ���
    // setUp() �޼��尡 �� ��Ȯ�ϴ�.
    public function setUp() {
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }

    public function testAssociativeOptions() {
        $form = new FormHelper();
        $html = $form->select($this->products);
        $this->assertEquals($html,<<<_HTML_
<select ><option value="cu&amp;ke">��ģ &lt;�ٴ�&gt; �ػ�</option><option value="stomach">"����"</option><option value="tripe">���� �ҽ� ���â</option><option value="taro">������� �����</option><option value="giblets">��â �ұ� ����</option><option value="abalone">���� ȣ�� ����</option></select>
_HTML_
        );
    }

    public function testNumericOptions() {
        $form = new FormHelper();
        $html = $form->select($this->stooges);
        $this->assertEquals($html,<<<_HTML_
<select ><option value="0">Larry</option><option value="1">Moe</option><option value="2">Curly</option><option value="3">Shemp</option></select>
_HTML_
        );
    }

    public function testNoOptions() {
        $form = new FormHelper();
        $html = $form->select([]);
        $this->assertEquals('<select ></select>', $html);
    }

    public function testBooleanTrueAttributes() {
        $form = new FormHelper();
        $html = $form->select([],['np' => true]);
        $this->assertEquals('<select np></select>', $html);

    }

    public function testBooleanFalseAttributes() {
        $form = new FormHelper();
        $html = $form->select([],['np' => false, 'onion' => 'red']);
        $this->assertEquals('<select onion="red"></select>', $html);
    }

    public function testNonBooleanAttributes() {
        $form = new FormHelper();
        $html = $form->select([],['spaceship'=>'<=>']);
        $this->assertEquals('<select spaceship="&lt;=&gt;"></select>', $html);
    }

    public function testMultipleAttribute() {
        $form = new FormHelper();
        $html = $form->select([],["name" => "menu",
                                  "q" => 1, "multiple" => true]);
        $this->assertEquals('<select name="menu[]" q="1" multiple></select>', $html);
    }
}