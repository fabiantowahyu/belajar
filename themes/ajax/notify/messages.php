<ul class="notification-body" id="notification-info">
	

</ul>

<script>
    $(document).ready(function () {
        $.ajax({
           // url: "http://sni.carsurin.com/sni/admin/getNotification",
            url: "http://localhost/ls-pro/admin/getNotificationMessages",
            type: "GET",
            success: function (data) {
                $('#notification-info').html(data);
            }
        });
    });
</script>