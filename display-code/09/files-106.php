$template_file = 'page-template.html';
if (is_readable($template_file)) {
    $template = file_get_contents($template_file);
} else {
    print "���ø� ������ ���� �� �����ϴ�.";
}