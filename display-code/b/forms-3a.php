<?php

// �� ���ϰ� FormHelper.php ������
// ���� ���͸��� �־�� �Ѵ�.
require 'FormHelper.php';

// select �޴��� ���� �׸� �迭 ����
// �� �迭�� display_form(), validate_form(),process_form()���� ���ǹǷ�
// ���� ������ �����Ѵ�.
$ops = array('+','-','*','/');

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
        // ���� ����� �Է¹��� ���� ����Ѵ�.
        show_form();
    }
} else {
    // ���� ������� �ʾ����� ���� ����Ѵ�.
    show_form();
}

function show_form($errors = array()) {
    $defaults = array('num1' => 2,
                      'op' => 2, // the index of '*' in $ops
                      'num2' => 8);
    // �⺻���� �̿��� $form ��ü�� �����Ѵ�.
    $form = new FormHelper($defaults);

    // �� ��°� ���õ� ��� HTML�� ������ ���Ϸ� ������ �и��Ѵ�.
    include 'math-form.php';
}

function validate_form( ) {
    $input = array();
    $errors = array( );

    // op�� �ʼ� �׸��̴�.
    $input['op'] = $GLOBALS['ops'][$_POST['op']] ?? '';
    if (! in_array($input['op'], $GLOBALS['ops'])) {
        $errors[] = '�����ڸ� �����ϼ���.';
    }
// num1�� num2�� ���ڿ��� �Ѵ�.
    $input['num1'] = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num1']) || ($input['num1'] === false)) {
        $errors[] = 'ù ��° ���� �Է��ϼ���.';
    }

    $input['num2'] = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num2']) || ($input['num2'] === false)) {
        $errors[] = '�� ��° ���� �Է��ϼ���.';
    }

    // 0���� ���� �� ����.
    if (($input['op'] == '/') && ($input['num2'] == 0)) {
        $errors[] = '0���� ���� �� �����ϴ�.';
    }

    return array($errors, $input);
}

function process_form($input) {
    $result = 0;
    if ($input['op'] == '+') {
        $result = $input['num1'] + $input['num2'];
    }
    else if ($input['op'] == '-') {
        $result = $input['num1'] - $input['num2'];
    }
    else if ($input['op'] == '*') {
        $result = $input['num1'] * $input['num2'];
    }
    else if ($input['op'] == '/') {
        $result = $input['num1'] / $input['num2'];
    }
    $message = "{$input['num1']} {$input['op']} {$input['num2']} = $result";

    print "<h3>$message</h3>";
}
?>