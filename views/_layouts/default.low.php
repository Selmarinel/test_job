<h1> DATA For <?= $data[0]['varName']?> From <?= $data[0]['varAddress']?></h1>

<table width="80%" border="" style="margin: 0 auto; display:block;">
    <tr>
    <th>id</th>
    <th>sum</th>
    <th>text</th>
    </tr>
<?php foreach($data as $item) : ?>
<tr>
    <td><?= $item['intPaymentId']?></td>
    <td><?= $item['varSum']?></td>
    <td><?= $item['varPaymentText']?></td>
</tr>
<?php endforeach?>
</table>
