<?php

// �� ���� Ŭ���� �ҷ�����
require 'FormHelper.php';

// �����ͺ��̽� ����
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (PDOException $e) {
    print "������ �� �����ϴ�: " . $e->getMessage();
    exit();
}
// DB ������ ���� ����
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    // �⺻�� ����. ������ $5
    $defaults = array('price' => '5.00');

    // �켱�õǴ� �⺻������ $form ��ü ����
    $form = new FormHelper($defaults);

    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'insert-form.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    // dish_name �� �ʼ����̴�.
    $input['dish_name'] = trim($_POST['dish_name'] ?? '');
    if (! strlen($input['dish_name'])) {
        $errors[] = '�޴��� �̸��� �Է����ּ���.';
    }

    // ������ �ùٸ� �ε��Ҽ��� ������ �ϸ� 0���� Ŀ�� �Ѵ�.
    $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($input['price'] <= 0) {
        $errors[] = '�ùٸ� ������ �Է����ּ���.';
    }

    // is_spicy�� �⺻����'no'��.
    $input['is_spicy'] = $_POST['is_spicy'] ?? 'no';

    return array($errors, $input);
}

function process_form($input) {
    // �Լ� ���ο��� ���� ���� $db�� �����ϱ� ���� global�� �����Ѵ�.
    global $db;

    // $is_spicy�� ���� checkbox ���ð��� ���� �����Ѵ�.
    if ($input['is_spicy'] == 'yes') {
        $is_spicy = 1;
    } else {
        $is_spicy = 0;
    }

    // �ű� �޴��� ���̺� �߰�
    try {
        $stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy)
                              VALUES (?,?,?)');
        $stmt->execute(array($input['dish_name'], $input['price'],$is_spicy));
        // ����ڿ��� �޴��� �߰������� �˸�
        print htmlentities($input['dish_name']) . ' �޴��� �����ͺ��̽��� �߰��Ǿ����ϴ�.';
    } catch (PDOException $e) {
        print "�����ͺ��̽��� �޴��� �߰��� �� �����ϴ�.";
    }
}

?>