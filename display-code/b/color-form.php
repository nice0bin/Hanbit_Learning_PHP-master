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
    <tr>
        <td>������ ��� ������ ������:</td>
        <td><?= $form->select($colors,['name' => 'color']) ?></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <?= $form->input('submit', ['name' => 'set',
                                        'value' => '���� ����']) ?></td>
    </tr>
</table>
</form>