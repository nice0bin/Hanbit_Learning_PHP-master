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
    global $db;

    // �켱�õǴ� �⺻������ $form ��ü ����
    $form = new FormHelper();

    // �޴� ����� �����ͺ��̽����� ��������
    $sql = 'SELECT dish_id, dish_name FROM dishes ORDER BY dish_name';
    $stmt = $db->query($sql);
    $dishes = array();
    while ($row = $stmt->fetch()) {
        $dishes[$row->dish_id] = $row->dish_name;
    }

    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'dish-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // dish_id ���� ����Ǹ� �ϴ� �������� �Ǵ��Ѵ�.
    // �ش��ϴ� dish_id�� �����ͺ��̽��� ������
    // process_form()�� ���� dish_id �Է� ��û �޽����� ����Ѵ�.
    if (isset($_POST['dish_id'])) {
        $input['dish_id'] = $_POST['dish_id'];
    } else {
        $errors[] = '�޴��� �����ϼ���.';
    }
    return array($errors, $input);
}

function process_form($input) {
    // �Լ� ���ο��� ���� ���� $db�� �����ϱ� ���� global�� �����Ѵ�.
    global $db;

// ���� ����
    $sql = 'SELECT dish_id, dish_name, price, is_spicy FROM dishes WHERE
            dish_id = ?';

    // �����ͺ��̽� ���α׷��� ������ �����ϰ� ��� �����ޱ�
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['dish_id']));
    $dish = $stmt->fetch();

    if (count($dish) == 0) {
        print '�߰ߵ� �޴��� �����ϴ�.';
    } else {
        print '<table>';
        print '<tr><th>ID</th><th>�޴���</th><th>����</th>';
        print '<th>�ʱ�</th></tr>';
        if ($dish->is_spicy == 1) {
            $spicy = 'Yes';
        } else {
            $spicy = 'No';
        }
        printf('<tr><td>%d</td><td>%s</td><td>$%.02f</td><td>%s</td></tr>',
               $dish->dish_id,
               htmlentities($dish->dish_name), $dish->price, $spicy);
        print '</table>';
    }
}
?>