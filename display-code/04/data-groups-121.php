$flavors = array('Japanese' => array('hot' => '�ͻ��',
                                     'salty' => '���� �ҽ�'),
                 'Chinese' => array('hot' => '�ӽ��͵�',
                                    'pepper-salty' => '�����'));

// $culture�� Ű, $culture_flavors�� ��(�迭)�̴�
foreach ($flavors as $culture => $culture_flavors) {
// $flavor�� Ű, $example�� ���̴�
    foreach ($culture_flavors as $flavor => $example) {
        print "$culture $flavor �丮�� ���� $example �Դϴ�.\n";
    }
}