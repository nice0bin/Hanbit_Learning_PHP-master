$dinner = '����¡�� ī��';

function macrobiotic_dinner() {
    $dinner = "��� ä��";
    print "���� �޴��� $dinner �Դϴ�.";
// �ػ깰�� ��Ȥ�� �����ϰ� ������
    print " ������ ���� ";
    print $GLOBALS['dinner'];
    print "�� �԰ھ��.\n";
}

macrobiotic_dinner();
print "�Ϲ� ���� �޴�: $dinner";