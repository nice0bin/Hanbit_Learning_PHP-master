function exceptionHandler($ex) {
    // ���� ������ ���� �α׿� ����Ѵ�.
    error_log("ERROR: " . $ex->getMessage());
    // �Ϲ����� �޽����� ����ڿ��� �����ְ� ���α׷��� �����Ѵ�.
    die("<p>�˼��մϴ�. ������ ������ϴ�.</p>");
}
set_exception_handler('exceptionHandler');