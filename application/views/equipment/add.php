<form id="tab" action="/equipment/addpost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">添加设备</h1>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">add</a></li>
            </ul>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">

                            <div class="form-group">
                                <label>设备名称</label>
                                <input name="equipmentName" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>厂家</label>
                                <input name="company" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>价格</label>
                                <input name="price" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>型号</label>
                                <input name="model" type="text" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>状态(启用 or 停用)</label>
                                <select name="status" class="form-control">
                                    <option  value="1">启用</option>
                                    <option  value="0">停用</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>