<?php
require 'FormHelper.php';

session_start( );

$main_dishes = array('cuke' => '��ģ �ػ�',
                     'stomach' => "����",
                     'tripe' => '���� �ҽ� ���â',
                     'taro' => '������� �����',
                     'giblets' => '��â �ұ� ����',
                     'abalone' => '���� ȣ�� ����');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}

function show_form($errors = array()) {
    // ó������ �ƹ��� ���� �����Ƿ�
    // FormHelper �����ڿ� �ƹ��͵� �������� �ʴ´�.
    $form = new FormHelper();

    // ���߿� ����� ���� ��� HTML ����
    if ($errors) {
        $errorHtml = '<ul><li>';
        $errorHtml .= implode('</li><li>',$errors);
        $errorHtml .= '</li></ul>';
    } else {
        $errorHtml = '';
    }


    // ������ ���̹Ƿ�, ��� ������Ʈ�� ���⿡�� �ٷ� ����Ѵ�.
print <<<_FORM_
<form method="POST" action="{$form->encode($_SERVER['PHP_SELF'])}">
  $errorHtml
  �޴�: {$form->select($GLOBALS['main_dishes'],['name' => 'dish'])} <br/>

  ����: {$form->input('text',['name' => 'quantity'])} <br/>

  {$form->input('submit',['value' => '�ֹ��ϱ�'])}
</form>
_FORM_;
}

function validate_form() {
    $input = array();
    $errors = array();
    // ���õ� �޴��� �ùٸ� �޴����� Ȯ��
    $input['dish'] = $_POST['dish'] ?? '';
    if (! array_key_exists($input['dish'], $GLOBALS['main_dishes'])) {
        $errors[] = '�ùٸ� �޴��� �������ּ���.';
    }

    $input['quantity'] = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT,
                                      array('options' => array('min_range' => 1)));
    if (($input['quantity'] === false) || ($input['quantity'] === null)) {
        $errors[] = '������ �Է����ּ���.';
    }
    return array($errors, $input);
}

function process_form($input) {
    $_SESSION['order'][] = array('dish'     => $input['dish'],
                                 'quantity' => $input['quantity']);

    print '�ֹ��� �Ϸ�Ǿ����ϴ�.';
}
?>