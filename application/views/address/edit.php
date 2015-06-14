<form id="tab" action="/address/editPost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">修改地址</h1>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">edit</a></li>
            </ul>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <input type="hidden" name="class_id" value="<?php echo $model['class_id']; ?>">
                            <input type="hidden" name="class_type" value="<?php echo $model['class_type']; ?>">
                            <input type="hidden" name="class_parent_id" value="<?php echo $model['class_parent_id']; ?>">
                            <div class="form-group">
                                <label>城市名称</label>
                                <input name="class_name" type="text" value="<?php echo $model['class_name']; ?>" class="form-control">
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