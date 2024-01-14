<style>
        .modal {
        /* text-align: center; */
        display: none;
        position: fixed;
        z-index: 99;
        right: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: right;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 20% auto;
        padding: 10px;
        border: 1px solid #888;
        width: 50%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<div >
    <p class="fs-3 text-center pb-3">選單管理</p>
    <form class="form-control" method="post" action="./api/edit.php"> <!-- ?表示是當前的檔案 -->
        <table class="table text-center align-middle" width="100%">
            <tbody>
                <tr >
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <!-- 將資料顯示在畫面上 -->
                <?php
                $rows = $DB->all(['menu_id'=>0]);
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="text[]" value="<?= $row['text']; ?>">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="href[]" value="<?= $row['href']; ?>">
                        </td>
                        <td>
                            <?=$Menu->count(['menu_id'=>$row['id']]);?>
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input class="btn btn-secondary edit-btn" type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?= $do; ?>&id=<?=$row['id']; ?>')">
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    <td width="200px">
                        <input class="btn btn-primary btn-lg add-btn" type="button" data-table="<?= $do; ?>" value="新增主選單">
                </td>
                    <td class="cent">
                        <input class="btn btn-dark btn-lg" type="submit" value="修改確定">
                        <input class="btn btn-dark btn-lg" type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div id="myModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-body"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
    $(".edit-btn").on("click", function() {
        let id = $(this).data('id');
        let table = $(this).data('table');

        // 加載 upload.php 的內容到模態視窗中
        $("#modal-body").load(`./modal/submenu.php?table=${table}&id=${id}`, function() {
            // 顯示模態視窗
            $("#myModal").show();
        });
    });

    $(".add-btn").on("click", function() {
        let id = $(this).data('id');
        let table = $(this).data('table');

        // 加載 upload.php 的內容到模態視窗中
        $("#modal-body").load(`./modal/${table}.php?table=${table}`, function() {

            // 顯示模態視窗
            $("#myModal").show();
        });
    });



    // 關閉視窗
    $(".close").click(function() {
        $("#myModal").hide();
    });

    // 點擊視窗外部時關閉視窗
    $(window).click(function(event) {
        if ($(event.target).is("#myModal")) {
            $("#myModal").hide();
        }
    });
});

</script>