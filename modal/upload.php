<?php
switch ($_GET['table']) {
    case "title":
        echo "<h3>更新網站標題圖片</h3>";
        break;
    case "mvim":
        echo "<h3>更換動畫圖片</h3>";
        break;
    case "image":
        echo "<h3>更新校園映像區圖片</h3>";
        break;
}
?>

<hr>
<form class="form-control" action="./api/update.php" method="post" enctype="multipart/form-data">
    <table class="table text-center align-middle">
        <tr class="fs-5">
            <?php 
            switch ($_GET['table']) {
                case "title":
                    echo "<td>標題區圖片</td>";
                    break;
                case "mvim":
                    echo "<td>動畫圖片</td>";
                    break;
                case "image":
                    echo "<h3>校園映像圖片</h3>";
                    break;
            }
            ?>
            <td><input class="form-control" type="file" name="img" id=""></td>
        </tr>
        <tr>
            <?php
            switch ($_GET['table']) {
                case "title":
                    echo "<td class='fs-5'>標題區替代文字</td>";
                    echo "<td>";
                    echo "<input class='form-control' type='text' name='text' id=''>";
                    echo "</td>";
                    break;
            }
            ?>
        </tr>

    </table>

    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input class="btn btn-dark btn-lg" type="submit" value="更新">
        <input class="btn btn-dark btn-lg" type="reset" value="重置">
    </div>
</form>