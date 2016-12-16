(function(){

    function promptRegister() {
        swal({
          title: "订阅 Laravel 资讯",
          text: "请前往「Laravel China 社区」注册账号，即可自动订阅「Laravel 资讯」。",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#21BA45",
          confirmButtonText: "前往注册",
          cancelButtonText: "已注册",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                window.location = 'https://laravel-china.org/login-required';
            } else {
                swal.close();
                // fixing body wont scroll
                document.body.style.overflow = "scroll";
            }
        });
    }
    // 订阅按钮点击
    $('#subscrib-btn').click(function() {
        promptRegister();
    });

    $('#subscribe-input').focus(function() {
        promptRegister();
    });

})();
