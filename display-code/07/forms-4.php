$input['order'] = $_POST['order'];
if (! in_array($input['order'], $GLOBALS['sweets'])) {
    $errors[] = '�ֹ� ������ �޴��� �ƴմϴ�.';
}
