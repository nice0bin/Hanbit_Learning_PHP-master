$fmtfavs = new MessageFormatter('en_GB', $messages['en_GB']['FAVORITE_FOODS']);
$fmtcookie = new MessageFormatter('en_GB', $messages['en_GB']['COOKIE']);

// "biscuit"�� ��ȯ�Ѵ�.
$cookie = $fmtcookie->format(array());

// "biscuit"�� ���Ե� ������ ����Ѵ�.
print $fmtfavs->format(array($cookie));
