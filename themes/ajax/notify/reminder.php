
<ul class="notification-body" id="notification-info">



    <!--	<li>
                    <span class="padding-10">
    
                            <em class="badge padding-5 no-border-radius bg-color-blue pull-left margin-right-5">
                                    <i class="fa fa-unlock fa-fw fa-2x"></i>
                            </em>
                            
                            <span>
                                New Registration of <strong>Company dito</strong> needs to be approved - <a href="javascript:void(0);" class="display-normal">Click here</a>
                                     <br>
                                     <span class="pull-right font-xs text-muted"><i>1 day ago...</i></span>
                            </span>
                            
                    </span>
            </li>
            <li>
                    <span class="padding-10">
    
                            <em class="badge padding-5 no-border-radius bg-color-green pull-left margin-right-5">
                                    <i class="fa fa-check fa-fw fa-2x"></i>
                            </em>
                            
                            <span>
                                New License Registration of <strong>Company dito</strong> needs to be approved - <a href="javascript:void(0);" class="display-normal">Click here</a>
                                     <br>
                                     <span class="pull-right font-xs text-muted"><i>1 day ago...</i></span>
                            </span>
                            
                    </span>
            </li>-->
    
    

</ul>

<script>
    
    $(document).ready(function () {
        $.ajax({
            //url: "http://sni.carsurin.com/sni/admin/getReminder",
            url: "http://localhost/ls-pro/admin/getReminder",
            type: "GET",
            success: function (data) {
                $('#notification-info').html(data);
            }
        });
    });
</script>