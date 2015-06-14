<div class="content">
    <div class="header">
        <h1 class="page-title">公告管理</h1>
        <ul class="breadcrumb">
            <li><a href="/">Home</a> </li>
            <li class="active">公告管理</li>
        </ul>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/cabinets/add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新公告</a>
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
                <th>发布日期<th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href=""><i class="fa fa-pencil"></i></a>
                    <a href="/equipment/deletebyid?id=" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>