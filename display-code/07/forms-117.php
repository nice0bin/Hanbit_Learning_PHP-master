<form method="POST" action="catalog.php">
<input type="text" name="product_id">
<select name="category">
<option value="ovenmitt">�����ħ</option>
<option value="fryingpan">��������</option>
<option value="torch">�ֹ���ġ</option>
</select>
<input type="submit" name= "����">
</form>
����� ���� ������ �����ϴ�:

product_id: <?php print $_POST['product_id'] ?? '' ?>
<br/>
category: <?php print $_POST['category'] ?? '' ?>