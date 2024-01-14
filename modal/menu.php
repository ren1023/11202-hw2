<h3 class="text-center align-middle">新增主選單
    <!-- <?=$_GET['table'];?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form class="form-control" action="./api/add.php" method="post" enctype="multipart/form-data">
    <table  class="table text-center align-middle">
        <tr class="fs-5">
            <td>主選單名稱：</td>
            <td>
                <input class="form-control" type="text" name="text" id="">
            </td>
        </tr>
        <tr class="fs-5">
            <td>選單連結網址：</td>
            <td>
                <input class="form-control" type="text" name="href" id="">
            </td>
        </tr>
    </table>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input class="btn btn-dark btn-lg" type="submit" value="新增">
        <input class="btn btn-dark btn-lg" type="reset" value="重置">
    </div>
</form>