function niceExceptionHandler($ex) {
    // ����� ģȭ���� �޽��� ���
    print "�˼��մϴ�. ��� �� �ٽ� �õ����ּ���.";
    // �ý��� �����ڿ��� ������ �ڼ��� ���� ���
    error_log("{$ex->getMessage()} in {$ex->getFile()} @ {$ex->getLine()}");
    error_log($ex->getTraceAsString());
}

set_exception_handler('niceExceptionHandler');

print "�����ͺ��̽� ���� ���� ��Ȳ�� �����մϴ�.\n";

// PDO �����ڷ� ���޵� DSN�� �ùٸ� �����ͺ��̽��� ���� �Ű������� �����Ƿ�
// �����ڰ� ���ܸ� ����Ų��.
$db = new PDO('garbage:this is obviously not going to work!');

print "�� �޽����� ��µ��� ���� ���Դϴ�.";
