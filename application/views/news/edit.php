<link rel="stylesheet" href="/static/ueditor/themes/default/css/umeditor.css" type="text/css" />
<script type="text/javascript" src="/static/ueditor/umeditor.config.js"></script>
<script type="text/javascript" src="/static/ueditor/umeditor.js"></script>
<form id="tab" action="/news/updatepost" method="post">
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
                            <input name="id" id="id" type="hidden" value="<?php echo $model['id'] ?>">
                            <div class="form-group">
                                <label>公告标题</label>
                                <input name="newstitle" type="text" value="<?php echo $model['newstitle'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>公告类别</label>
                                <select name="newstype" class="form-control">
                                    <option <?php echo $model['newstype'] == '1' ? 'selected' : '' ?> value="1">公告</option>
                                    <option <?php echo $model['newstype'] == '2' ? 'selected' : '' ?> value="2">活动</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>状态</label>
                                <select name="opterStatus" class="form-control">
                                    <option <?php echo getStatus($model) == '普通' ? 'selected' : '' ?> value="0">普通</option>
                                    <option <?php echo getStatus($model) == '推荐' ? 'selected' : '' ?> value="1">推荐</option>
                                    <option <?php echo getStatus($model) == '置顶' ? 'selected' : '' ?> value="2">置顶</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>发布日期</label>
                                <input name="addtime" type="text" value="<?php echo date('Y-m-d',intval($model['addtime'])) ?>" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>公告内容</label>
                                <textarea style="width: 800px" id="myEditor" name="myEditor"><?php echo $model['newscontent'] ?></textarea>
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

<?php
function getStatus($row)
{
    if(!isset($row['isrecommend']) && !isset($row['istop']))
    {
        return '普通';
    }
    if(isset($row['isrecommend']))
    {
        return '推荐';
    }
    if(isset($row['istop']))
    {
        return '置顶';
    }
}
?>