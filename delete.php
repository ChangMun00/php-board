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

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<body>
<article class="boardArticle">
    <h3><b>글 삭제</b></h3>
    <?php
    if (isset($id)) {
        $sql ="select count(id) as cnt from board where id = '$id'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        if (empty($row["cnt"])) {
        ?>
        <script>
            alert("Do not exist");
            history.go(-1);
        </script>
        <?php
        exit;
        }

        $sql = "select title from board where id = '$id'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <div id="boardDelete">
        <form action="./delete_update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            
                    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">제목</span>
  </div>
  <input type="text" class="form-control" value="<?php echo $row['title']?>" name="text" id="text" aria-describedby="basic-addon1" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">비밀번호</span>
  </div>
  <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-describedby="basic-addon1">
</div>
            <div class="btnSet">
                <button type="submit" class="btnSubmit btn">삭제</button>
                <a href="./index.php" class="btnList btn">뒤로가기</a>
            </div>
        </form>
    </div>
    <?php
    //if (isset($id)) {
    } else {
    ?>
        <script>
            alert('정상적인 경로를 이용해주세요.');
            history.go(-1);
        </script>
        <?php
        exit;
    }
    ?>
</article>
</body>
<?php
    require('footer.php'); 
?>
</html>
