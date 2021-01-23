<?php
require 'FormHelper.php';
session_start( );

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


// ������ ���̹Ƿ�, ������Ʈ�� �и����� �ʰ� ���⿡�� �ٷ� ����Ѵ�.
print <<<_FORM_
<form method="POST" action="{$form->encode($_SERVER['PHP_SELF'])}">
  $errorHtml
  ����ڸ�: {$form->input('text', ['name' => 'username'])} <br/>
  ��й�ȣ: {$form->input('password', ['name' => 'password'])} <br/>
  {$form->input('submit', ['value' => '�α���'])}
</form>
_FORM_;
}

function validate_form( ) {
    $input = array();
    $errors = array();

    // ���� ����ڸ�� ��й�ȣ
    $users = array('alice'   => 'dog123',
                   'bob'     => 'my^pwd',
                   'charlie' => '**fun**');

    // ����ڸ��� �����ϴ��� Ȯ��
    $input['username'] = $_POST['username'] ?? '';
    if (! array_key_exists($input['username'], $users)) {
        $errors[] = '�ùٸ� ����ڸ�� ��й�ȣ�� �Է����ּ���.';
    }
    // else ���Ĵ� ����ڸ��� ������ ��쿡�� ����ǰ�
    // �׷��� ������ ������� �ʴ´�.
    else {
    // ��й�ȣ�� ��ġ�ϴ��� Ȯ��
        $saved_password = $users[ $input['username'] ];
        $submitted_password = $_POST['password'] ?? '';
        if ($saved_password != $submitted_password) {
            $errors[] = '�ùٸ� ����ڸ�� ��й�ȣ�� �Է����ּ���.';
        }
    }
    return array($errors, $input);
}


function process_form($input) {
// ����ڸ��� ���ǿ� �ֱ�
    $_SESSION['username'] = $input['username'];

    print "�ȳ��ϼ���, $_SESSION[username]";
}
?>