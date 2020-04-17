<?php
$sql = "select id, postid, depth, content, writer, password from comment 
        where id = depth and postid = " . $id;
$result = $db->query($sql);
?>
<div id="commentView">
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
   
        
   <div class="card">
  <div class="card-body">
        <?php echo $row["content"]?>
        <p class="text-muted small mb-4 mb-lg-0">-<?php echo $row["writer"]?></p>
  </div>
</div><br>
                
            <?php
            $subSql = "select id, postid, depth, content, writer, password from comment
                       where id != depth and depth = " . $row["id"];
            $subResult = $db->query($subSql);
            while ($subRow = $subResult->fetch_assoc()) {
                ?>
                <ul class="twoDepth">
                    <li>
                        <div>
                            <span>작성자 : <?php echo $subRow["writer"] ?></span>
                            <p><?php echo $subRow["content"] ?></p>
                            
                        </div>
                    
                
                <?php
            }
            ?>
        
  
    <?php }?>
</div>
<form action="comment_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id?>">

                <input type="text" class="form-control" placeholder="닉네임" name="writer" id="writer" value="<?php
// Sets user IP address
$ip =  $_SERVER['REMOTE_ADDR'];
// Sets user IP address with last subnet replaced by 'x'
$ip = preg_replace('~(\d+)\.(\d+)\.(\d+)\.(\d+)~', "$1.$2.$3.XXX", $ip);
// Displays user IP address as altered.
echo $ip;
?>" aria-describedby="basic-addon1">

                <textarea class="form-control" name="content" id="content" rows="3" placeholder="내용"></textarea>

    <div class="btnSet">
        <input type="submit" class="btn btn-link" value="작성">
    </div>
</form>
