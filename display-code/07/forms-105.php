$sweets = array('���� ����','���ڳ� ���� ����',
    '�漳�� ����ũ','���� ���');

function generate_options($options) {
    $html = '';
    foreach ($options as $option) {
        $html .= "<option>$option</option>\n";
    }
    return $html;
}

// ���� ǥ���ϴ� �Լ�
function show_form() {
    $sweets = generate_options($GLOBALS['sweets']);
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
�޴� ����: <select name="order">
$sweets
</select>
<br/>
<input type="submit" value= "�ֹ�">
</form>
_HTML_;
}