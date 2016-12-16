(function(){

    function promptRegister() {
        swal({
          title: "订阅 Laravel 资讯",
          text: "请前往「Laravel China 社区」注册账号，即可自动订阅「Laravel 资讯」。",
          type: "info",
          showCancelButton: true,
          confirmButtonColor: "#21BA45",
          confirmButtonText: "前往注册",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(){
            window.location = 'https://laravel-china.org/login-required';
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
