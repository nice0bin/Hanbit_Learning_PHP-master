<?php

// �� ���� Ŭ���� �ҷ�����
require 'FormHelper.php';

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
    include 'filename-form.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    // ���ϸ��� �ùٸ��� Ȯ���Ѵ�.
    $input['file'] = trim($_POST['file'] ?? '');
    if (0 == strlen($input['file'])) {
        $errors[] = '���ϸ��� �Է����ּ���.';
    } else {
        // ��ü ���� ��ΰ�
        // �� ������ ���� ��Ʈ ������ �ִ��� Ȯ���Ѵ�.
        $full = $_SERVER['DOCUMENT_ROOT'] . '/' . $input['file'];
        // realpath() �� �̿��� .. ���ڿ��̳�
        // �ɺ��� ��ũ�� ��ȯ�Ѵ�.
        $full = realpath($full);
        if ($full === false) {
            $errors[] = "�ùٸ� ���ϸ��� �Է����ּ���.";
        } else {
            // f$ull ���� ���� ��Ʈ ���͸��� �����ϴ��� �˻��Ѵ�.
            $docroot_len = strlen($_SERVER['DOCUMENT_ROOT']);
            if (substr($full, 0, $docroot_len) != $_SERVER['DOCUMENT_ROOT']) {
                $errors[] = '���� ��Ʈ �ȿ� �ִ� ������ �Է����ּ���.';
            } else {
                // �̻� ������i n$put�� ��ü ��θ�
                // process_form()�� �����Ѵ�.
                $input['full'] = $full;
            }
        }
    }

    return array($errors, $input);
}

    function process_form($input) {
    if (is_readable($input['full'])) {
        print htmlentities(file_get_contents($input['full']));
    } else {
        print "{$input['file']}�� ���� �� �����ϴ�.";
    }
}
?>