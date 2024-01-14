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
    background-color: rgba(0,0,0,0.4);
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
    <p class="fs-3 text-center pb-3">網站標題管理</p>
    <form class="form-control" method="post" action="./api/edit.php">  <!-- ?表示是當前的檔案 -->
        <table class="table text-center align-middle" width="100%" >
            <tbody >
                <tr >
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <!-- 將資料顯示在畫面上 -->
                <?php
                // $DB=${ucfirst($do)};
                $rows = $DB->all();
                foreach ($rows as $row) {
                ?>
                    <tr class="text-center">
                        <td width="45%">
                            <img src="./img/<?= $row['img']; ?>" style="width:300px;height:200px;">
                        </td>
                        <td width="23%">
                            <input class="form-control" type="text" name="text[]" style="width: 90%;" value="<?= $row['text'];?>">
                            <input class="form-control" type="hidden" name="id[]" value="<?=$row['id'];?>">
                        </td>
                        <td width="7%">
                            <input class="form-check-input"  type="radio" name="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td width="7%">
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?=$row['id']; ?>">
                        </td>
                        <td>
                            <!-- <input class="btn btn-secondary" type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?=$row['id']; ?>')" value="更新圖片"> -->
                            <input class="btn btn-secondary edit-btn" type="button" data-table="<?= $do; ?>" data-id="<?= $row['id']; ?>" value="更新圖片">
                        </td>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr >
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    <td class="text-center" >
                        <input class="btn btn-primary btn-lg" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增網站標題圖片"></td>
                    <td class="text-center">
                        <input class="btn btn-dark btn-lg " type="submit" value="修改確定">
                        <input class="btn btn-dark btn-lg" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>

</div>

    <!-- 模態視窗 -->
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
        $("#modal-body").load(`./modal/upload.php?table=${table}&id=${id}`, function() {
            // 顯示模態視窗
            $("#myModal").show();
        });
    });

    // 關閉模態視窗
    $(".close").click(function() {
        $("#myModal").hide();
    });

    // 點擊模態視窗外部時關閉視窗
    $(window).click(function(event) {
        if ($(event.target).is("#myModal")) {
            $("#myModal").hide();
        }
    });
});

</script>

