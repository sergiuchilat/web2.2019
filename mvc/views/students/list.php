Students list

<table border="1">
    <tr>
        <td>Name</td>
        <td>Phone</td>
    </tr>
    <? foreach ($data as $item) {?>
        <tr>
            <td><?=$item['name']?></td>
            <td><?=$item['phone']?></td>
        </tr>
    <?}?>
</table>
