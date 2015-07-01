<script src="/static/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function () {
        $('.demo-cancel-click').click(function () {
            return false;
        });
    });
</script>
</body>
</html>
<script>
    $(function(){
        $("#showmenu").click(function(){
            $(".sidebar-nav").toggle("slow",function(){
                if($('.sidebar-nav').css('display') == 'none'){
                    $('.content').css('margin-left','0');
                } else {
                    $('.content').css('margin-left','125px');
                }
            });

        })
    });
</script>