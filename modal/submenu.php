<?php include_once "../api/db.php";?>
<h3 class="text-center align-middle">編輯次選單
    <!-- <?=$_GET['table'];?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form class="form-control" action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table class="table text-center align-middle" id="sub">
        <tr class="fs-5">
            <td>次選單名稱：</td>
            <td>次選單連結網址：</td>
            <td>刪除</td>
        </tr>
        <?php
        $subs=$Menu->all(['menu_id'=>$_GET['id']]);
        foreach($subs as $sub){
        ?>
        <tr class="fs-5">
            <td><input class="form-control" type="text" name="text[]" value="<?=$sub['text'];?>"></td>
            <td><input class="form-control" type="text" name="href[]" value="<?=$sub['href'];?>"></td>
            <td><input class="form-check-input" type="checkbox" name="del[]" value="<?=$sub['id'];?>"></td>
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
        </tr>
        <?php
        }
        ?>

    </table>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="menu_id" value="<?=$_GET['id'];?>">
        <input class="btn btn-dark btn-lg" type="submit" value="修改確定">
        <input class="btn btn-dark btn-lg" type="reset" value="重置">
        <input class="btn btn-dark btn-lg" type="button" value="更多次選單" onclick="more()">   <!-- 當點下去後，新增次選單欄位出來給使用者填 -->
    </div>
</form>
<script>
function more(){
    let item=`<tr>
            <td><input class="form-control" type="text" name="add_text[]" id=""></td>
            <td><input class="form-control" type="text" name="add_href[]" id=""></td>
        </tr>`
    $("#sub").append(item); //當id=sub時，就去執行 let item，新增 td的欄位給使用者填，新增次選單的內容

}
</script>