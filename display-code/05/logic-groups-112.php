$dinner = '����¡�� ī��';

function vegetarian_dinner() {
    print "���� �޴��� $dinner, �Ǵ� ";
    $dinner = '�ϵν� ����';
    print $dinner;
    print "�Դϴ�.\n";
}

function kosher_dinner() {
    print "���� �޴��� $dinner, �Ǵ� ";
    $dinner = '�ú�����';
    print $dinner;
    print "�Դϴ�.\n";
}

print "ä�����ǽ� ";
vegetarian_dinner();
print "�����ν� ";
kosher_dinner();
print "�Ϲ� ���� �޴��� $dinner �Դϴ�.";