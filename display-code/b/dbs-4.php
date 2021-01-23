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
// DB ���� ���� ����
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ��ü ������� ��������
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// �޴� ID�� �̸��� show_form()�� validate_form()���� ����ؾ� �ϹǷ�
// ���� �迭�� �����Ѵ�.
$dishes = array();
$sql = 'SELECT dish_id, dish_name FROM dishes ORDER BY dish_name';
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
    $dishes[$row->dish_id] = $row->dish_name;
}

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
    global $db, $dishes;

    // �켱�õǴ� �⺻������ $form ��ü ����
    $form = new FormHelper();

    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'customer-form.php';
}

function validate_form() {
    global $dishes;
    $input = array();
    $errors = array();

    // ����� dish_id�� $dishes�� ���Եƴ��� Ȯ���Ѵ�.
    // dish_id ���� ����Ǹ� �ϴ� �������� �Ǵ��Ѵ�.
    // �ش��ϴ� dish_id�� �����ͺ��̽��� ������
    // process_form()�� ���� dish_id �Է� ��û �޽����� ����Ѵ�.
    $input['dish_id'] = $_POST['dish_id'] ?? '';
    if (! array_key_exists($input['dish_id'], $dishes)) {
        $errors[] = '�ùٸ� �޴��� �����ϼ���.';
    }

    // �̸��� �ʼ� �׸��̴�.
    $input['name'] = trim($_POST['name'] ?? '');
    if (0 == strlen($input['name'])) {
        $errors[] = '�̸��� �Է��ϼ���.';
    }

    // ��ȭ��ȣ�� �ʼ� �׸��̴�.
    $input['phone'] = trim($_POST['phone'] ?? '');
    if (0 == strlen($input['phone'])) {
        $errors[] = '��ȭ��ȣ�� �Է��ϼ���.';
    } else {
        // ��ȭ��ȣ�� �ּ���9 �ڸ� �̻��̴�
        // �� ���ڿ�c type_digit()�� �����ϴ� ����� ȿ�������� ��������
        // �������� �������̰�,
        // ���Խ��� �� �ʿ䰡 ���
        // ������ ���� ����̴�.
        $digits = 0;
        for ($i = 0; $i < strlen($input['phone']); $i++) {
            if (ctype_digit($input['phone'][$i])) {
                $digits++;
            }
        }
        if ($digits < 9) {
            $errors[] = '��ȭ��ȣ�� �ּ��� 9�ڸ� �̻� �Է����ּ���.';
        }
    }

    return array($errors, $input);
}

function process_form($input) {
    // �Լ� ���ο��� ���� ���� $db�� �����ϱ� ���� global�� �����Ѵ�.
    global $db;

    // �����ͺ��̽��� �ڵ����� ���ϰ��� �����ϹǷ�,
    // ������ ������ �� Ư���� customer_id�� ������ �ʿ䰡 ����.
    $sql = 'INSERT INTO customers (name,phone,favorite_dish_id) ' .
           'VALUES (?,?,?)';

    // �����ͺ��̽� ���α׷��� ������ �����ϰ� ��� �����ޱ�
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute(array($input['name'],$input['phone'],$input['dish_id']));
        print '<p>�ű� �� ���.</p>';
    } catch (Exception $e) {
        print "<p>���� ����� �� �����ϴ�: {$e->getMessage()}.</p>";
    }
}
?>