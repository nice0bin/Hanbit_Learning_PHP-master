$dinner = '����¡�� ī��';

function vegetarian_dinner() {
    global $dinner;
    print "���� �޴��� $dinner �����ϴٸ�, ������ ";
    $dinner = '�ϵν� ����';
    print $dinner;
    print "�Դϴ�.\n";
}

print "�Ϲ� ���� �޴��� $dinner �Դϴ�.\n";
vegetarian_dinner();
print "�Ϲ� ���� �޴��� $dinner �Դϴ�.";