// 2�� ����� html_img2() �Լ��� html-img2.php ���Ͽ� �����ߴٰ� �����Ѵ�.
include "html-img2.php";

$image_path = '/images/';

print html_img2('puppy.png');
print html_img2('kitten.png','fuzzy');
print html_img2('dragon.png',null,640,480);