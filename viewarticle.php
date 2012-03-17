<?php
    require_once 'header.php';
    $url = "http://usbuild.sinaapp.com/lily/getArticle.php";
    $back = "";
    $fields = array(
        "board"=>$_GET['board'],
        "file"=>$_GET['file']
    );
    if(isset($_GET['back']))
        $back = $_GET['back'];

    if(isset($_GET['start']))
        $fields['start'] = $_GET['start'];
    else 
        $fields['start'] = "0";

    $result = query($url, $fields);
    $obj = json_decode($result);
    if($fields['start'] > 0)
    {
        array_shift($obj->items);
    }
?>
<div data-role="page">
<div data-role="header">
<?php
    if(isset($_GET['back'])) {
        echo "<a data-direction=\"reverse\" data-icon=\"back\" href=\"".$back."\">返回</a>";
    }
?>
<h1><?=$obj->title?></h1>
</div>
<div data-role="content">
<ul data-role="listview" data-inset="true">
<?php
    foreach($obj->items as $item) {
?>
<li>
<p>
<?=$item->text?>
</p>
</li>
<?php
    }
?>
</ul>
<?php
    if($obj->prev >= 0)
    {
        $href = "viewarticle.php?board=".$fields['board']."&file=".$fields['file']."&start=".$obj->prev;
        if($back != "")
            $href .= "&back=".$back;
        echo "<a data-role=\"button\" data-direction=\"reverse\" href=\"".$href."\">上一页</a>";
    }
    if($obj->next >= 0)
    {
        $href = "viewarticle.php?board=".$fields['board']."&file=".$fields['file']."&start=".$obj->next;
        if($back != "")
            $href .= "&back=".$back;
        echo "<a data-role=\"button\" href=\"".$href."\">下一页</a>";
        
    }

?>
</div>

<?php
    require_once 'footer.php'
?>
