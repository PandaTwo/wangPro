<div class="content">
    <div class="header">
        <h1 class="page-title">地址列表</h1>
        <ul class="breadcrumb">
            <li><a href="/">Home</a> </li>
            <li class="active">地址列表</li>
        </ul>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/cabinets/add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新机柜</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>机柜编号</th>
                <th>机柜地址</th>
                <th>备注</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    </td>
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