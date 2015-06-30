<div class="content">
    <div class="header">
        <h1 class="page-title">公告管理</h1>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">公告管理</li>
        </ul>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/news/add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新公告</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>状态</th>
                <th>公告类别</th>
                <th>标题</th>
                <th>发布日期
                <th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo getStatus($row); ?></td>
                    <td><?php echo $row['newstype'] == '1' ? '公告': '活动' ?></td>
                    <td><?php echo $row['newstitle'] ?></td>
                    <td><?php echo date('Y-m-d',intval($row['addtime']))  ?></td>
                    <td>
                        <a href="/news/edit?id=<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                        <a href="/news/deletebyid?id=<?php echo $row['id'] ?>" onclick="return confirm('Are sure del this?');"
                           role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $html; ?>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>
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