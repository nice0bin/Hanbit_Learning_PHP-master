// ��ü�� �����ϰ� $soup�� �Ҵ�
$soup = new Entree;
// $soup �Ӽ� ����
$soup->name = '�߰�� ����';
$soup->ingredients = array('�߰��', '��');

// �� �ٸ� �ν��Ͻ��� �����ϰ� $sandwich�� �Ҵ�
$sandwich = new Entree;
// $sandwich �Ӽ� ����
$sandwich->name = '�߰�� ������ġ';
$sandwich->ingredients = array('�߰��', '��');


foreach (['�߰��','����','��','��'] as $ing) {
    if ($soup->hasIngredient($ing)) {
        print "������ ���: $ing.\n";
    }
    if ($sandwich->hasIngredient($ing)) {
        print "������ġ�� ���: $ing.\n";
    }
}
