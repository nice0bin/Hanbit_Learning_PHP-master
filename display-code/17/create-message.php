$message = Swift_Message::newInstance();
$message->setFrom('julia@example.com');
$message->setTo(array('james@example.com' => 'James Beard'));
$message->setSubject('�ǰ��� ���� ������');
$message->setBody(<<<_TEXT_
�Ƶ�,

������ ���� �̷��� �غ���. �߰����� 1�κа� �ƽ��Ķ�Ž� �� ����
�ͼ��⿡ �ְ� �Բ� ���Ƽ� ���ó�� ��ģ ���� �ޱ��� �������ҿ� �ְ� ������
�Ǹ��� �丮�� �ȴܴ�. �������ž�!

����� ���,
������.
_TEXT_
);