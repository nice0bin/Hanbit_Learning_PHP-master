<?php

// �� ���ϰ� FormHelper.php ������
// ���� ���͸��� �־�� �Ѵ�.
require 'FormHelper.php';

// select �޴��� ���� �׸� �迭 ����
// �� �迭�� display_form(), validate_form(),process_form()���� ���ǹǷ�
// ���� ������ �����Ѵ�.
$states = [ '����Ư����','��õ������','�λ걤����','���ֱ�����','����������',
'�뱸������','��걤����','����Ư����ġ��','����Ư����ġ��','��⵵','������',
'���ϵ�','��󳲵�','��û�ϵ�','��û����','����ϵ�','���󳲵�'];

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
    }
} else {
    // ���� ������� �ʾ����� ���� ����Ѵ�.
    show_form();
}

function show_form($errors = array()) {
    // �⺻���� �̿��� $form ��ü�� �����Ѵ�.
    $form = new FormHelper();

    // �� ��°� ���õ� ��� HTML�� ������ ���Ϸ� ������ �и��Ѵ�.
    include 'shipping-form.php';
}

function validate_form( ) {
    $input = array();
    $errors = array( );

    foreach (['from','to'] as $addr) {
    // �ʼ� �׸��� �˻��Ѵ�.
        foreach (['Name' => 'name', 'Address 1' => 'address1',
                  'State' => 'state'] as $label => $field){
            $input[$addr.'_'.$field] = $_POST[$addr.'_'.$field] ?? '';
            if (strlen($input[$addr.'_'.$field]) == 0) {
                $errors[] = "$addr , $label ���� �Է��ϼ���.";
            }
        }
        /// �����õ� Ȯ��
        $input[$addr.'_state'] =
            $GLOBALS['states'][$input[$addr.'_state']] ?? '';
        if (! in_array($input[$addr.'_state'], $GLOBALS['states'])) {
            $errors[] = "$addr �����õ��� �����ϼ���.";
        }
        // �캯��ȣ �˻�
        $input[$addr.'_zip'] = filter_input(INPUT_POST, $addr.'_zip',
                                            FILTER_VALIDATE_INT,
                                            ['options' => ['min_range'=>10000,
                                                          'max_range'=>99999]]);
        if (is_null($input[$addr.'_zip']) || ($input[$addr.'_zip']===false)) {
            $errors[] = "�ùٸ� $addr �����ȣ�� �Է��ϼ��� ";
        }
        // �߰� �ּҵ� ���� ����!
        $input[$addr.'_address2'] = $_POST[$addr.'_address2'] ?? '';
   }

    // ����, ����, ����, ���Դ� 0���� ũ��.
    foreach(['height','width','depth','weight'] as $field) {
        $input[$field] =filter_input(INPUT_POST, $field, FILTER_VALIDATE_FLOAT);
        // 0�� �� �� ���� �׸��̸�
        // null�̳� false�� �� �� ����.
        if (! ($input[$field] && ($input[$field] > 0))) {
            $errors[] = "$field ���� �ùٸ��� �Է����ּ���.";
        }
    }
    // ���� �˻�
    if ($input['weight'] > 150) {
        $errors[] = "ȭ���� ���Դ� 150 ���Ͽ��� �մϴ�.";
    }
    // ���� �˻�
    foreach(['height','width','depth'] as $dim) {
        if ($input[$dim] > 36) {
            $errors[] = "ȭ���� $dim ���� 36 ���Ͽ��� �մϴ�.";
        }
    }

    return array($errors, $input);
}

function process_form($input) {
    // ��� ���ø� ����.
    $tpl=<<<HTML
<p>ȭ�� ũ��: {height}" x {width}" x {depth}", ����: {weight} lbs.</p>

<p>�����:</p>
<pre>
{from_name}
{from_address}
{from_state} {from_zip}
</pre>

<p>�����:</p>
<pre>
{to_name}
{to_address}
{to_state} {to_zip}
</pre>
HTML;

    // $input �迭�� �ּҸ� ���� ���� �����Ѵ�.
    foreach(['from','to'] as $addr) {
        $input[$addr.'_address'] = $input[$addr.'_address1'];
        if (strlen($input[$addr.'_address2'])) {
            $input[$addr.'_address'] .= "\n" . $input[$addr.'_address2'];
        }
    }

    // ���ø��� �� ��ҿ� �ش��ϴ� ����
    // $input �迭���� ã�Ƽ� ��ü�Ѵ�.
    $html = $tpl;
    foreach($input as $k => $v) {
        $html = str_replace('{'.$k.'}', $v, $html);
    }

    // ȭ�� ���� ���
    print $html;
}
?>