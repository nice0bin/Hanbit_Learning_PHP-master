<?php
session_start( );
$main_dishes = array('cuke' => '��ģ �ػ�',
                     'stomach' => "����",
                     'tripe' => '���� �ҽ� ���â',
                     'taro' => '������� �����',
                     'giblets' => '��â �ұ� ����',
                     'abalone' => '���� ȣ�� ����');

if (isset($_SESSION['order']) && (count($_SESSION['order']) > 0)) {
    print '<ul>';
    foreach ($_SESSION['order'] as $order) {
        $dish_name = $main_dishes[ $order['dish'] ];
        print "<li> $dish_name : $order[quantity] �� </li>";
    } 
    print "</ul>";
} else {
    print "�ֹ� ������ �����ϴ�.";
}
?>