<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
    <?php if ($errors) { ?>
        <tr>
            <td>���� �׸��� �������ּ���.:</td>
            <td><ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= $form->encode($error) ?></li>
                <?php } ?>
            </ul></td>
    <?php }  ?>

    <tr><td>ù ��° ��:</td><td><?= $form->input('text', ['name' => 'num1']) ?></td></tr>
    <tr><td>������:</td>
        <td><?= $form->select($GLOBALS['ops'], ['name' => 'op']) ?></td>
    </tr>
    <tr><td>�� ��° ��:</td><td><?= $form->input('text', ['name' => 'num2']) ?></td></tr>

    <tr><td colspan="2" align="center"><?= $form->input('submit', ['value' => '����ϱ�']) ?>
    </td></tr>

</table>
</form>