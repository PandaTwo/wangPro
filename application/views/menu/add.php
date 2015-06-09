<form id="tab" action="/adminmenu/addpost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">添加菜单</h1>
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
                                <label>菜单名称</label>
                                <input name="menuName" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>上级菜单</label>
                                <select name="parentId" class="form-control">
                                    <option value="0">一级菜单</option>
                                    <?php foreach($root_menu as $rows): ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['menuName']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input name="URL" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>排序（数字）</label>
                                <input name="sort" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>状态(启用 or 停用)</label>
                                <input name="isshow" type="checkbox" value="1" checked>
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