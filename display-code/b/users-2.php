$view_count = 1 + ($_COOKIE['view_count'] ?? 0);

if ($view_count == 20) {
    // setcookie()�� ���� ������ ��Ű�� �����ȴ�.
    setcookie('view_count', '');
    $msg = "<p>���� ȸ���� �ʱ�ȭ�˴ϴ�.</p>";
} else {
    setcookie('view_count', $view_count);
    $msg = "<p>���� ȸ��: $view_count.</p>";
    if ($view_count == 5) {
        $msg .= "<p>5��° �湮�ϼ̽��ϴ�.</p>";
    } elseif ($view_count == 10) {
        $msg .= "<p>10��° �湮�ϼ̽��ϴ�. �� �������� �����Ͻô±���.</p>";
    } elseif ($view_count == 15) {
        $msg .= "<p>15��° �湮�ϼ̽��ϴ�. " .
            "�ٸ� �������� �ִٴ°� �𸣽ô°� �ƴ���?</p>";
    }
}
print $msg;