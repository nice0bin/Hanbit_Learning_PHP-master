<?php

// �� ���ϰ� FormHelper.php ������
// ���� ���͸��� �־�� �Ѵ�.
require 'FormHelper.php';

// select �޴��� ���� �׸� �迭 ����
// �� �迭�� display_form(), validate_form(),process_form()���� ���ǹǷ�
// ���� ������ �����Ѵ�.
$sweets = array('puff' => '���� ����',
                'square' => '���ڳ� ���� ����',
                'cake' => '�漳�� ����ũ',
                'ricemeat' => '���� ���');

$main_dishes = array('cuke' => '��ģ �ػ�',
                     'stomach' => '����',
                     'tripe' => '���� �ҽ� ���â',
                     'taro' => '������� �����',
                     'giblets' => '��â �ұ� ����',
                     'abalone' => '���� ȣ�� ����');

// ���� ������ ����
// - ���� ����Ǹ�, ���� ������ ���� ó���ϰų� ���� �ٽ� ����ϰ�
// - ������� �ʾ����� ���� ����Ѵ�.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// validate_form()�� ���� �޽����� ��ȯ�ϸ� show_form()�� ����
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
// ���� �����Ͱ� ������ ����ϸ� ó���Ѵ�.
        process_form($input);
    }
} else {
// ���� ������� �ʾ����� ���� ����Ѵ�.
    show_form();
}

function show_form($errors = array()) {
    $defaults = array('delivery' => 'yes',
        'size' => 'medium');
    // �⺻���� �̿��� $form ��ü�� �����Ѵ�.
    $form = new FormHelper($defaults);

    // �� ��°� ���õ� ��� HTML�� ������ ���Ϸ� ������ �и��Ѵ�.
    include 'complete-form.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    // name�� �ʼ� �׸��̴�.
    $input['name'] = trim($_POST['name'] ?? '');
    if (! strlen($input['name'])) {
        $errors[] = "�̸��� �Է����ּ���.";
    }
    // size�� �ʼ� �׸��̴�.
    $input['size'] = $_POST['size'] ?? '';
    if (! in_array($input['size'], ['small','medium','large'])) {
        $errors[] = 'ũ�⸦ �������ּ���.';
    }
// sweet�� �ʼ� �׸��̴�.
    $input['sweet'] = $_POST['sweet'] ?? '';
    if (! array_key_exists($input['sweet'], $GLOBALS['sweets'])) {
        $errors[] = '����Ʈ�� �������ּ���.';
    }

    // ��Ȯ�� �� ������ �� �丮�� �����ؾ� �Ѵ�.
    $input['main_dish'] = $_POST['main_dish'] ?? array();
    if (count($input['main_dish']) != 2) {
        $errors[] = '�� �丮�� �� ���� �������ּ���.';
    } else {
    // �� �丮�� �� ���� ���õƴٸ�,
    // �� �丮�� ��� ��ȿ���� �˻��Ѵ�.
        if (! (array_key_exists($input['main_dish'][0], $GLOBALS['main_dishes']) &&
               array_key_exists($input['main_dish'][1], $GLOBALS['main_dishes']))) {
            $errors[] = '�� �丮�� �ΰ��� �������ּ���.';
        }
    }
    // delivery�� ���õ����� comments�� ������ �־�� �Ѵ�.
    $input['delivery'] = $_POST['delivery'] ?? 'no';
    $input['comments'] = trim($_POST['comments'] ?? '');
    if (($input['delivery'] == 'yes') && (! strlen($input['comments']))) {
        $errors[] = '��� �ּҸ� �Է����ּ���.';
    }

    return array($errors, $input);
}

function process_form($input) {
    // ����Ʈ�� �� �丮�� ��ü �̸���
    // $GLOBALS['sweets']�� $GLOBALS['main_dishes'] �迭���� ã�´�.
    $sweet = $GLOBALS['sweets'][ $input['sweet'] ];
    $main_dish_1 = $GLOBALS['main_dishes'][ $input['main_dish'][0] ];
    $main_dish_2 = $GLOBALS['main_dishes'][ $input['main_dish'][1] ];
    if (isset($input['delivery']) && ($input['delivery'] == 'yes')) {
        $delivery = '���';
    } else {
        $delivery = '���� �湮';
    }
    // �ֹ� �޽��� �ؽ�Ʈ ����
    $message=<<<_ORDER_
�ֹ��� �Ϸ�Ǿ����ϴ�, {$input['name']}��.
$sweet({$input['size']}), $main_dish_1, $main_dish_2 �� �ֹ��ϼ̽��ϴ�.
��� ����: $delivery
_ORDER_;
    if (strlen(trim($input['comments']))) {
        $message .= '����� �޸�: '.$input['comments'];
    }

    // �ֹ��忡�� �޽��� ������
    mail('chef@restaurant.example.com', 'New Order', $message);
    // HTML ��ƼƼ ���ڵ� �� �޽����� ����ϰ�
    // �� �ٲ��� <br/> �±׷� �����Ѵ�.
    print nl2br(htmlentities($message, ENT_HTML5));
}
?>
