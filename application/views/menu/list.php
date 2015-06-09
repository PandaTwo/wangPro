<div class="content">
    <div class="header">
        <h1 class="page-title">菜单列表</h1>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/adminmenu/add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新菜单</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>一级菜单</th>
                <th>二级菜单</th>
                <th>url</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($menu as $rows){
                $tempid = $rows['id'];
                if($rows['parentId'] == "0") {
                    ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['menuName'] ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>
                            <a href="/packages/deletebyid?id=<?php echo $rows['id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php
                }
                $arr=getTowMenu($tempid,$menu);
                if(count($arr)){
                    ?>
                    <?php foreach($arr as $arrrows){?>
                    <tr>
                        <td><?php echo $arrrows['id'] ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo $arrrows['menuName'] ?></td>
                        <td><?php echo $arrrows['URL'] ?></td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>
                            <a href="/adminmenu/deletebyid?id=<?php echo $arrrows['id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                <?php
                }
            }
            ?>
            </tbody>
        </table>

        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>