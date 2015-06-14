<form id="tab" action="/address/addpost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">添加地址</h1>
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
                            <input type="hidden" name="class_type" value="<?php echo $model['class_type']; ?>">
                            <div class="form-group">
                                <label>上级城市名称：</label>
                                <?php echo $model['class_name']; ?>  ----------------  层级为:<?php echo $model['class_type']; ?>
                            </div>
                            <div class="form-group">
                                <label>城市街道名称</label>
                                <input name="class_name" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>父id(请不要修改)</label>
                                <input name="class_parent_id"  type="text" value="<?php echo $model['class_id']; ?>" class="form-control">
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