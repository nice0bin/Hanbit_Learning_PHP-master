// 6���� ���� ��Ÿ���� DateTime ��ü ����
$range_start = new DateTime('6 months ago');
// ���縦 ��Ÿ���� DateTime ��ü ����
$range_end = new DateTime();

// $_POST['year']�� 1900���� 2100 ������ �������� �˻��Ѵ�.
// $_POST['month']�� 1���� 12 ������ ������ �˻��Ѵ�.
// $_POST['day']�� 1���� 31 ������ ������ �˻��Ѵ�.
$input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 1900,
                                                       'max_range' => 2100)));
$input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT,
                               array('options' => array('min_range' => 1,
                                                        'max_range' => 12)));
$input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT,
                             array('options' => array('min_range' => 1,
                                                      'max_range' => 31)));
// ����, ��, ���� 0�� �� �� �����Ƿ� �׵� ������(= = = )�� ����� �ʿ䰡 ����.
// Ư�� ���� �ش��ϴ� ���ڰ� �ùٸ��� Ȯ���ϰ��� checkdate() �Լ��� ����Ѵ�.
if ($input['year'] && $input['month'] && $input['day'] &&
    checkdate($input['month'], $input['day'], $input['year'])) {
    $submitted_date = new DateTime(strtotime($input['year'] . '-' .
                                             $input['month'] . '-' .
                                             $input['day']));
    if (($range_start > $submitted_date) || ($range_end < $submitted_date)) {
        $errors[] = '���� 6���� ���̿� ���ϴ� ��¥�� �Է����ּ���.';
    }
} else {
    // �� �κ��� ����, ��, �� �� �Ű����� �� �ϳ��� �����߰ų�
    // 2�� 31��ó�� �ùٸ��� ���� ��¥�� �Է����� �� ����ȴ�.
    $errors[] = '�ùٸ� ��¥�� �Է����ּ���.';
}
