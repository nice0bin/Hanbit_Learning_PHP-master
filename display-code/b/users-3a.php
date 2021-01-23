<?php
// $_SESSION �� �����Ӱ� ����ϱ� ���� ������ Ȱ��ȭ�Ѵ�.
session_start();

// �� ���� Ŭ���� �ҷ�����
require 'FormHelper.php';

$colors = array('ff0000' => 'Red',
                'ffa500' => 'Orange',
                'ffffff' => 'Yellow',
                '008000' => 'Green',
                '0000ff' => 'Blue',
                '4b0082' => 'Indigo',
                '663399' => 'Rebecca Purple');

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
    global $colors;

    // �켱�õǴ� �⺻������ $form ��ü ����
    $form = new FormHelper();
    // ���� ǥ���ϴ� ��� HTML�� ��Ȯ���� ���� �и��� ���Ͽ� �д�.
    include 'color-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // color�� �ùٸ� �����̾�� �Ѵ�.
    $input['color'] = $_POST['color'] ?? '';
    if (! array_key_exists($input['color'], $GLOBALS['colors'])) {
        $errors[] = '�ùٸ� ������ �����ϼ���.';
    }

    return array($errors, $input);
}

function process_form($input) {
    global $colors;

    $_SESSION['background_color'] = $input['color'];
    print '<p>������ ������ ����ƽ��ϴ�.</p>';
}
?>