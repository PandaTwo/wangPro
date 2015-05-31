<div class="sidebar-nav">
    <ul>
        <?php
            foreach($menu as $rows){
                $tempid = $rows['id'];
                if($rows['parentId'] == "0") {
                    ?>
                    <li><a href="#" data-target=".dashboard-menu<?php echo $rows['id'] ?>" class="nav-header collapse collapsed"
                           data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> <?php echo $rows['menuName'] ?>
                            <i class="fa fa-collapse"></i></a></li>
                <?php
                }
              $arr=getTowMenu($tempid,$menu);
                if(count($arr)){
                    ?>
        <li><ul class="dashboard-menu<?php echo $rows['id'] ?> nav nav-list collapse in">
                <?php foreach($arr as $arrrows){?>
                <li><a href="<?php echo $arrrows['URL'] ?>"><span class="fa fa-caret-right"></span> <?php echo $arrrows['menuName'] ?></a></li>
                        <?php }?>
            </ul></li>
        <?php
                }
            }
        ?>
    </ul>
</div>

<?php
    function getTowMenu($id,$menu)
    {
        $towMenuArr = array();
        foreach($menu as $rows)
        {
            if($rows['parentId'] == $id)
            {
                array_push($towMenuArr,$rows);
            }
        }
        return $towMenuArr;
    }
?>