$now = new DateTime();
// �����ϸ� Ű = > �� �������� �����ϰ� ���� ǥ���Ѵ�.
$vars = array('title' => 'Man Bites Dog',
              'headline' => 'Man and Dog Trapped in Biting Fiasco',
              'byline' => 'Ireneo Funes',
              'article' => <<<_HTML_
<p>While walking in the park today, Bioy Casares took a big juicy
bite out of his dog, Santa's Little Helper. When asked why he did
it, Mr. Casares said, "I was hungry."</p>
_HTML_
              ,
              'date' => $now->format('l, F j, Y'));

// $vars�� Ű�� {}�� ���� ���ø� ������ �����ϵ���
// $template_vars�� �����Ѵ�.
$template_vars = array();
foreach ($vars as $k => $v) {
    $template_vars['{'.$k.'}'] = $v;
}
// ���ø� �ҷ�����
$template = file_get_contents('template.html');
if ($template === false) {
    die("Can't read template.html: $php_errormsg");
}
// ã�� ���ڿ��� ��ü�� ���ڿ��� �迭�� �����ϸ�
// str_replace()�� ������ ���� �ѹ��� ��ü�Ѵ�.
$html = str_replace(array_keys($template_vars),
                    array_values($template_vars),
                    $template);
// HTML ������ ����.
$result = file_put_contents('article.html', $html);
if ($result === false) {
    die("article.html ������ ������ �� �����ϴ�: $php_errormsg");
}