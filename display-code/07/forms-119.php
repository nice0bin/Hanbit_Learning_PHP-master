<form method="POST" action="eat.php">
<select name="lunch[]" multiple>
<option value= "�ٺ�ť �������">�ٺ�ť ������� ��</option>
<option value= "�߰��">�߰�� ��</option>
<option value= "���ɾ�">���ɾ� ��</option>
<option value= "����">���� ��</option>
<option value= "������">������ ��</option>
</select>
<input type="submit" name="����">
</form>
���Ͻô� ���� �����ϼ���:
<br/>
<?php
if (isset($_POST['lunch'])) {
    foreach ($_POST['lunch'] as $choice) {
        print "$choice ���� ������ϴ�. <br/>";
    }
}
?>