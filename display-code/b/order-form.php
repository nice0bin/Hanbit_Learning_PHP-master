<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
    <?php if ($errors) { ?>
        <tr>
        <td>���� �׸��� �������ּ���:</td>
            <td><ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= $form->encode($error) ?></li>
                <?php } ?>
            </ul></td>
    <?php }  ?>

    <tr><th>�޴�</th><td>����</td></tr>
<?php foreach ($products as $code => $name) { ?>
    <tr><td><?= htmlentities($name) ?>:</td>
        <td><?= $form->input('text', ['name' => "quantity_$code"]) ?></td></tr>
<?php } ?>
    <tr><td colspan="2" align="center"><?= $form->input('submit', ['value' => '�ֹ��ϱ�']) ?>
    </td></tr>

</table>
</form>