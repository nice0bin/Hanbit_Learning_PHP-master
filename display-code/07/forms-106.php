$sweets = array('puff' => '���� ����',
                'square' => '���ڳ� ���� ����',
                'cake' => '�漳�� ����ũ',
                'ricemeat' => '���� ���');

function generate_options_with_value ($options) {
    $html = '';
    foreach ($options as $value => $option) {
        $html .= "<option value=\"$value\">$option</option>\n";
    }
    return $html;
}


// ���� ǥ���ϴ� �Լ�
function show_form( ) {
    $sweets = generate_options_with_value($GLOBALS['sweets']);
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
�޴� ����: <select name="order">
$sweets
</select>
<br/>
<input type="submit" value="�ֹ�">
</form>
_HTML_;
}