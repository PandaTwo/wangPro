<link rel="stylesheet" href="/static/ueditor/themes/default/css/umeditor.css" type="text/css" />
<script type="text/javascript" src="/static/ueditor/umeditor.config.js"></script>
<script type="text/javascript" src="/static/ueditor/umeditor.js"></script>
<form id="tab" action="/news/addpost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">添加公告</h1>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">

                            <div class="form-group">
                                <label>公告标题</label>
                                <input name="newstitle" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>公告类别</label>
                                <select name="newstype" class="form-control">
                                    <option value="1">公告</option>
                                    <option value="2">活动</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>状态</label>
                                <select name="opterStatus" class="form-control">
                                    <option value="0">普通</option>
                                    <option value="1">推荐</option>
                                    <option value="2">置顶</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>发布日期</label>
                                <input name="addtime" type="text" value="<?php echo date('Y-m-d') ?>" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>公告内容</label>
                                <textarea style="width: 800px" id="myEditor" name="myEditor"></textarea>
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
<script type="text/javascript">
    var um = UM.getEditor('myEditor');
</script>