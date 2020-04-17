<?php
    require('head.php'); 
  ?> <br><br><br>
    <?php
$xml=simplexml_load_file("data.xml")
?>
    <div class="col-lg-8 mx-auto">
<p class="sub_text"><b><font class="drag"><?php echo $xml->title. ""?></font></p></b>
      <p class="text-muted small mb-4 mb-lg-0"><?php echo $xml->subtitle. ""?></p><hr>

<?php
require_once("dbconfig.php");

$id = $_GET["id"];

$isHit = !empty($id) && empty($_COOKIE["board_" . $id]);
if ($isHit) {
    $sql = "update board set hit = hit+1 where id =" . $id;
    $result = $db->query($sql);
    if (empty($result)) {
    ?>
        <script>
            alert("some problem");
            history.go(-1);
        </script>
    <?php
    } else {
        setcookie('board_' . $id, TRUE, time() + (60 * 60 * 24), '/');
    }
}

$sql = "select id, title, content, date, hit, writer, password from board where id=" . $id;
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>

<body>
<article class="boardArticle">
    <div id="boardView">
        <h3 id="boardTitle"><b><?php echo $row['title']?></b></h3>
        <div id="boardInfo" class="text-muted small mb-4 mb-lg-0">
            <span id="boardID">작성자 : <?php echo $row["writer"]?></span>&nbsp;&nbsp;
            <span id="boardDate">날짜 : <?php echo $row["date"]?></span>&nbsp;&nbsp;
            <span id="boardHit">조회수 : <?php echo $row["hit"]?></span>&nbsp;&nbsp;
        </div><br>
        <div id="boardContent"><?php echo $row["content"]?></div>
    </div><br>
    <div class="btnSet">
        <a href="./write.php?id=<?php echo $id?>">수정</a>
        <a href="./delete.php?id=<?php echo $id?>">삭제</a>
        <a href="./">목록</a>
    </div>
    <hr>
    <div id="boardComment">
        <?php require_once('./comment.php')?>
    </div>
</article>
</body>
<?php
    require('footer.php'); 
?>
</html>

