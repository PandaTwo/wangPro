<form id="tab" action="/packages/updatePost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">修改套餐</h1>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                        <input name="id" value="<?php echo $updateModel['id']; ?>" type="hidden">
                            <div class="form-group">
                                <label>套餐名称</label>
                                <input name="PackagesName" type="text" value="<?php echo $updateModel['PackagesName']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>速率</label>
                                <input name="Speed" type="text" value="<?php echo $updateModel['Speed']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>价格</label>
                                <input name="Price" type="text" value="<?php echo $updateModel['Price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>时长</label>
                                <select name="times" class="form-control">
                                    <option <?php echo $updateModel['times'] == '年度' ? 'selected' :''  ?> value="年度">年度</option>
                                    <option <?php echo $updateModel['times'] == '季度' ? 'selected' :''  ?> value="季度">季度</option>
                                    <option <?php echo $updateModel['times'] == '月度' ? 'selected' :''  ?> value="月度">月度</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>状态(启用 or 停用)</label>
                                <?php
                                 $status = $updateModel['status'];
                                ?>
                                <input name="status" type="checkbox" <?php echo $status == "1" ? 'checked' : ''?> >
                            </div>

                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 提交修改</button>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>