<?php
// $_SESSION �� �����Ӱ� ����ϱ� ���� ������ Ȱ��ȭ�Ѵ�.
session_start();
?>
<html>
  <head><title>���� ����</title></head>
  <body style="background-color:<?= $_SESSION['background_color'] ?>">
    <p>� ������ ���̳���?</p>
  </body>
</html>