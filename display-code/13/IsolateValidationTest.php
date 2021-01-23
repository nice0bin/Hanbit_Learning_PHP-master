// validate_form()�� ���ǵ� ����
include 'isolate-validation.php';

class IsolateValidationTest extends PHPUnit_Framework_TestCase {

    public function testDecimalAgeNotValid() {
        $submitted = array('age' => '6.7',
                           'price' => '100',
                           'name' => '�迵��');
        list($errors, $input) = validate_form($submitted);
        // ���̿� ���õ� ������ Ȯ���Ѵ�.
        $this->assertContains('���̸� ��Ȯ�ϰ� �Է����ּ���.', $errors);
        $this->assertCount(1, $errors);
    }

    public function testDollarSignPriceNotValid() {
        $submitted = array('age' => '6',
                           'price' => '$52',
                           'name' => '�迵��');
        list($errors, $input) = validate_form($submitted);
        // ���ݿ� ���õ� ������ Ȯ���Ѵ�.
        $this->assertContains('������ ��Ȯ�ϰ� �Է����ּ���.', $errors);
        $this->assertCount(1, $errors);
    }

    public function testValidDataOK() {
        $submitted = array('age' => '15',
                           'price' => '39.95',
        // �̸� �� ���� ȭ��Ʈ�����̽��� ������ ���ŵȴ�.
                           'name' => ' �迵�� ');
        list($errors, $input) = validate_form($submitted);
        // ������ ����� �Ѵ�.
        $this->assertCount(0, $errors);
        // $input �迭�� �� ���� ���� Ȯ���Ѵ�.
        $this->assertCount(3, $input);
        $this->assertSame(15, $input['age']);
        $this->assertSame(39.95, $input['price']);
        $this->assertSame('�迵��', $input['name']);
    }
}