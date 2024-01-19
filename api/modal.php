<!-- 模態視窗 -->
<div id="myModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-body"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        
        // 統一處理按鈕點擊事件
        function handleButtonClick(isEdit) {
            let id = $(this).data('id');
            let table = $(this).data('table');
            let url = isEdit ? `./modal/upload.php?table=${table}&id=${id}` : `./modal/${table}.php?table=${table}`;

            $("#modal-body").load(url, function(response, status) {
                if (status === "error") {
                    // 處理錯誤情況，例如顯示錯誤信息
                    console.log("Error loading content");
                } else {
                    $("#myModal").show();
                }
            });
        }

        $(".edit-btn").on("click", function() {
            handleButtonClick.call(this, true);
        });

        $(".add-btn").on("click", function() {
            handleButtonClick.call(this, false);
        });

        // 關閉視窗
        $(".close, #myModal").click(function(event) {
            if ($(event.target).is(".close") || $(event.target).is("#myModal")) {
                $("#myModal").hide();
            }
        });
    });
</script>