// ��� ������ ����æ��.
ob_start( );
// ���ó�� var_dump() ȣ���Ѵ�.
var_dump($_POST);
// ob_start()�� ȣ���� �� ��µ� ������ $output�� �����Ѵ�.
$output = ob_get_contents( );
// �Ϲ����� ������� �ǵ�����.
ob_end_clean( );
// $output�� ���� �α׷� ������.
error_log($output);