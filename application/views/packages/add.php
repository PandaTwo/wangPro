<form id="tab" action="/packages/addpost" method="post">
<div class="content">
    <div class="header">

        <h1 class="page-title">add 套餐</h1>
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li><a href="users.html">套餐</a> </li>
            <li class="active">add</li>
        </ul>

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
                                <label>套餐名称</label>
                                <input name="PackagesName" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>速率</label>
                                <input name="Speed" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>价格</label>
                                <input name="Price" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>时长</label>
                                <input name="times" type="text" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>状态(启用 or 停用)</label>
                                <input name="status" type="checkbox" value="1" checked>
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