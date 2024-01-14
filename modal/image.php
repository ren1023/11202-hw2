<h3>新增校園映像圖片
    <!-- <?=$_GET['table'];?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form class="form-control" action="./api/add.php" method="post" enctype="multipart/form-data">
    <table class="table text-center align-middle">
        <tr class="fs-5">
            <td>校園映像圖片：</td>
            <td><input class="form-control" type="file" name="img" id=""></td>
        </tr>
      
       
    </table>

    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input class="btn btn-dark btn-lg" type="submit" value="新增">
        <input class="btn btn-dark btn-lg" type="reset" value="重置">
    </div>
</form>