<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
    <?php if ($errors) { ?>
        <tr>
        <td>다음 항목을 수정해주세요:</td>
            <td><ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= $form->encode($error) ?></li>
                <?php } ?>
            </ul></td>
    <?php }  ?>

    <tr><td>파일명:</td><td><?= $form->input('text', ['name' => 'file']) ?></td></tr>
    <tr><td colspan="2" align="center"><?= $form->input('submit', ['value' => '출력']) ?>
    </td></tr>

</table>
</form>
