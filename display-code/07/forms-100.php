if ('POST' == $_SERVER['REQUEST_METHOD']) {
    print $_POST['my_name']. "�� �ȳ��ϼ���";
} else {
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
�̸�: <input type="text" name="my_name" >
<br>
<input type="submit" value="�λ�">
</form>
_HTML_;
}
