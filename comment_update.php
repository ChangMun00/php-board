<?php
require_once("dbconfig.php");

$id = $_POST["id"];
$writer = $_POST["writer"];
$password = $_POST["password"];
$content = $_POST["content"];

$sql = "insert into comment (id, postid, content, writer, password) values (null, " .$id. ", '" .$content. "', '" .$writer. "', password('" .$password. "') )";
$result = $db->query($sql);
$commentId = $db->insert_id;

$sql = 'update comment set depth = id where id = ' . $commentId;
$result = $db->query($sql);
if($result) {
    ?>
    <script>
        location.replace("./view.php?id=<?php echo $id?>");
    </script>
    <?php
}
?>


