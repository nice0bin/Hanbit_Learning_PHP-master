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

// �ʱ� ���� ��
$spicy_choices = array('no','yes','either');

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
    // �⺻�� ����
    $defaults = array('min_price' => '5.00',
                      'max_price' => '25.00');

    // �켱�õǴ� �⺻������ $form ��ü ����
    $form = new FormHelper($defaults);

    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'retrieve-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // �޴� �̸� ���۰� ���� ȭ��Ʈ�����̽� ����
    $input['dish_name'] = trim($_POST['dish_name'] ?? '');

    // ���� ������ �ùٸ� �ε��Ҽ��� ������ �Ѵ�.
    $input['min_price'] = filter_input(INPUT_POST,'min_price',
                                       FILTER_VALIDATE_FLOAT);
    if ($input['min_price'] === null || $input['min_price'] === false) {
        $errors[] = '���� ������ �ùٸ��� �Է����ּ���.';
    }

    // �ִ� ������ �ùٸ� �ε��Ҽ��� ������ �Ѵ�.
    $input['max_price'] = filter_input(INPUT_POST,'max_price',
                                       FILTER_VALIDATE_FLOAT);
    
    if ($input['max_price'] === null || $input['max_price'] === false) {
        $errors[] = '�ִ� ������ �ùٸ��� �Է����ּ���.';
    }

// ���� ������ �ִ� ���ݺ��� ���ƾ� �Ѵ�.
    if ($input['min_price'] >= $input['max_price']) {
        $errors[] = '�ּ� ������ �ִ� ���ݺ��� ���ƾ� �մϴ�.';
    }

    $input['is_spicy'] = $_POST['is_spicy'] ?? '';
    if (! array_key_exists($input['is_spicy'], $GLOBALS['spicy_choices'])) {
        $errors[] = '�ùٸ� "�ʱ�"�� �������ּ���.';
    }
    return array($errors, $input);
}

function process_form($input) {
    // �Լ� ���ο��� ���� ���� $db�� �����ϱ� ���� global�� �����Ѵ�.
    global $db;

    // ���� ����
    $sql = 'SELECT dish_name, price, is_spicy FROM dishes WHERE price >= ? AND price <= ?';

    // �޴����� ����Ǹ� WHERE ���� �߰��Ѵ�.
    // ����ڰ� �Է��� ���ϵ�ī�尡 ������ ������ ��ġ�� ���ϵ���
    if (strlen($input['dish_name'])) {
        $dish = $db->quote($input['dish_name']);
        $dish = strtr($dish, array('_' => '\_', '%' => '\%'));
        $sql .= " AND dish_name LIKE $dish";
    }

    // is_spicy�� "yes" �Ǵ� "no"�� �� SQL�� �߰�
    // ("either"�� ���� WHERE ���� is_spicy ������ �߰��� �ʿ� ����)
    $spicy_choice = $GLOBALS['spicy_choices'][ $input['is_spicy'] ];
    if ($spicy_choice == 'yes') {
        $sql .= ' AND is_spicy = 1';
    } elseif ($spicy_choice == 'no') {
        $sql .= ' AND is_spicy = 0';
    }

    // �����ͺ��̽� ���α׷��� ������ �����ϰ� ��� �����ޱ�
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['min_price'], $input['max_price']));
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
            printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>', htmlentities($dish->dish_name), $dish->price, $spicy);
        }
    }
}
?>