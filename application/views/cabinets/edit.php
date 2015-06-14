<form id="tab" action="/cabinets/updatePost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">修改机柜</h1>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">add</a></li>
            </ul>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $updateModel['id'] ?>">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>机柜编号</label>
                                <input name="cabinetsNumber" type="text" value="<?php echo $updateModel['cabinetsNumber'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>机柜地址</label>
                                <input name="address" type="text" value="<?php echo $updateModel['address'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>备注</label>
                                <input name="remark" type="text" value="<?php echo $updateModel['remark'] ?>" class="form-control">
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