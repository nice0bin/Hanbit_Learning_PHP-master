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
    // �켱�õǴ� �⺻������ $form ��ü ����
    $form = new FormHelper();
    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'price-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // ���� ������ �ùٸ� �ε��Ҽ��� ������ �Ѵ�.
    $input['min_price'] = filter_input(INPUT_POST,'min_price', FILTER_VALIDATE_FLOAT);
    if ($input['min_price'] === null || $input['min_price'] === false) {
        $errors[] = '���� ������ �ùٸ��� �Է����ּ���.';    
    }
    return array($errors, $input);
}

function process_form($input) {
    // �Լ� ���ο��� ���� ���� $db�� �����ϱ� ���� global�� �����Ѵ�.
    global $db;

    // ���� ����
    $sql = 'SELECT dish_name, price, is_spicy FROM dishes WHERE
            price >= ?';

    // �����ͺ��̽� ���α׷��� ������ �����ϰ� ��� �����ޱ�
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['min_price']));
    $dishes = $stmt->fetchAll();

    if (count($dishes) == 0) {
        print '�߰ߵ� �޴��� �����ϴ�.';
    } else {
        print '<table>';
        print '<tr><th>�޴���</th><th>Price</th><th>�ʱ�</th></tr>';
        foreach ($dishes as $dish) {
            if ($dish->is_spicy == 1) {
                $spicy = 'Yes';
            } else {
                $spicy = 'No';
            }
            printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>',
                   htmlentities($dish->dish_name), $dish->price, $spicy);
        }
        print '</table>';
    }
}
?>