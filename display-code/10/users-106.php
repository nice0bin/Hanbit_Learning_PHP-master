<?php
session_start( );

if (array_key_exists('username', $_SESSION)) {
    print "�ȳ��ϼ���, $_SESSION[username].";
} else {
    print '���� �� �̿��Ͻ� �� �ֽ��ϴ�.';
}
?>