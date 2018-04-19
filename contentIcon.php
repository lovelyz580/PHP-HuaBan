<?php
     //分类
     $sql="select * from classify";
     $classify = executeQuery($sql);
?>

<div class="content_icon clearBox">
                <?php
                foreach ($classify as $key => $value){
                    echo "<a href='list.php?cid={$value['id']}'><div style='background-image:url({$value['image']})'>{$value['name']}</div></a>";
                }
                ?>
            </div>