Products LIST
<hr>
<table border="1">
  <tr>
    <td>Name</td>
    <td>Phone</td>
  </tr>
    <? foreach ($data as $item) {?>
      <tr>
        <td><?=$item['name']?></td>
        <td><?=$item['price']?></td>
        <? if(User::getInstance()->isAuthorised()){?>
        <td><a href="cart/add/<?=$item['id']?>">+</a></td>
        <? }?>
      </tr>
    <?}?>
</table>
