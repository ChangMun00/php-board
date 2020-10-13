<?php
require_once("dbconfig.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $id = htmlspecialchars($id);
} else {
    $writer = $_POST["writer"];
    $writer = htmlspecialchars($writer);
    $date = date("Y-m-d H:i:s");
}

$password = $_POST["password"];
$title = $_POST["title"];
$title = htmlspecialchars($title);
$content = $_POST["content"];

if (isset($id)) {
    $sql = "select count(password) as cnt from board where password = password('$password') and id = '$id'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    if ($row["cnt"]) {
        $sql = " title = '$title', content = '$content' where id = '$id'";
        $msgState = "수정";
    } else {
        $msg = "비밀번호가 틀렸습니다";
        ?>
        <script>
            alert("<?php echo $msg?>");
            history.go(-1);
        </script>
        <?php
        exit;
    }
} else {
    $sql = "insert into board (id, title, content, date, hit, writer, password) 
    values(null, '$title', '$content', '$date', 0, '$writer', password('$password'))";
    $msgState = "create";
}

if (empty($msg)) {
    $result = $db->query($sql);

    if ($result) {
        $msg = $msgState. "d";
        if (empty($id)) {
            $id = $db->insert_id;
        }
        $replaceURL = 'view.php?id=' . $id;
    } else {
        $msg = $msgState . " 실패";
        ?>
        <script>
            alert("<?php echo $msg?>");
            history.go(-1);
        </script>
        <?php
        exit;
    }
}
?>

<script>
    location.replace("<?php echo $replaceURL?>");
</script>
