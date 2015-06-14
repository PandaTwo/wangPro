<form id="tab" action="/equipment/updatePost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">修改设备</h1>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $updateModel['id']; ?>">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">

                            <div class="form-group">
                                <label>设备名称</label>
                                <input name="equipmentName" type="text" value="<?php echo $updateModel['equipmentName']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>厂家</label>
                                <input name="company" type="text" value="<?php echo $updateModel['company']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>价格</label>
                                <input name="price" type="text" value="<?php echo $updateModel['price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>型号</label>
                                <input name="model" type="text" value="<?php echo $updateModel['model']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>状态(启用 or 停用)</label>
                                <input name="status" type="checkbox" value="1" <?php echo $updateModel['status'] == '1' ? 'checked' : ''; ?>>
                            </div>

                        </div>

                    </div>

                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 保存修改</button>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>