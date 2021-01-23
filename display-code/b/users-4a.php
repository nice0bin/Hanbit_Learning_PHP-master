session_start();

// �� ���ϰ� FormHelper.php ������ ���� ���͸��� �־�� �Ѵ�.
require 'FormHelper.php';

// select �޴��� ���� �׸� �迭 ����
// �� �迭�� display_form(), validate_form(),process_form()���� ���ǹǷ�
// ���� ������ �����Ѵ�.
$products = [ 'cuke' => '��ģ �ػ�',
              'stomach' => '"����"',
              'tripe' => '���� �ҽ� ���â',
              'taro' => '������� �����',
              'giblets' => '��â �ұ� ����',
              'abalone' => '���� ȣ�� ����'];

// �������� �� ����:
// - ���� ����Ǹ�, ���� ������ �����ϰ� ��ǥ���Ѵ�.
// - ������� �ʾ����� ���� ǥ���Ѵ�.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate_form()�� ������ ��ȯ�ϸ� show_form()���� �����Ѵ�.
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        // ����� �����Ͱ� �ùٸ���, ó���Ѵ�.
        process_form($input);
    }
} else {
    // ���� ������� �ʾ����� ���� ǥ���Ѵ�.
    show_form();
}

function show_form($errors = array()) {
    global $products;
    $defaults = array();
    // �⺻���� 0���� �����Ѵ�.
    foreach ($products as $code => $label) {
        $defaults["quantity_$code"] = 0;
    }
    // ���ǿ� ������ ����Ǿ������� ����� ���� ����Ѵ�.
    if (isset($_SESSION['quantities'])) {
        foreach ($_SESSION['quantities'] as $field => $quantity) {
            $defaults[$field] = $quantity;
        }
    }
    $form = new FormHelper($defaults);
    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'order-form.php';
}

function validate_form( ) {
    global $products;

    $input = array();
    $errors = array( );

    // ��� ������ 0 �̻��̾�� �Ѵ�.
    foreach ($products as $code => $name) {
        $field = "quantity_$code";
        $input[$field] = filter_input(INPUT_POST, $field,
                                      FILTER_VALIDATE_INT,
                                      ['options' => ['min_range'=>0]]);
        if (is_null($input[$field]) || ($input[$field] === false)) {
            $errors[] = "$name �� ������ �ùٸ��� �Է����ּ���.";
        }
    }

    return array($errors, $input);
}

function process_form($input) {
    $_SESSION['quantities'] = $input;
    print "�ֹ����ּż� �����մϴ�.";
}
