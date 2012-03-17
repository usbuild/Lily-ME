<?php
    require_once 'header.php';
    $result = query("http://usbuild.sinaapp.com/lily/getTop10.php");
    $obj = json_decode($result);
?>
<div data-role="page">
<div data-role="header">
<h1>全站十大</h1>
</div>
<div data-role="content">
<ul data-role="listview" data-inset="true">
<?php
    foreach($obj->items as $item) {
?>
<li>
<a href="<?="viewarticle.php?file=".$item->file."&board=".$item->board."&back=index.php"?>">
    <h3><?=$item->title;?></h3>
<p> <?="<strong>版区: </strong>".$item->board."&nbsp;&nbsp;<strong>作者: </strong>".$item->author?> </p>
<span class="ui-li-count">
<?=$item->reply; ?>
</span>
    </a>
</li>
<?php
    }
?>
</ul>

</div>

<?php
    require_once 'footer.php'
?>
