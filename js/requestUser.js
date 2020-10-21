// JavaScript Document
$(function () {
  $("#btnLogin").click(function () {
    $("#btnLogin").hide();
    $("#loginMessage").html("<img src='../images/loading.gif' class='center'>");

    var username = $("#username").val();
    var password = $("#password").val();

    $.post("XuLyDangNhap.php", {
        username: username,
        password: password
      })
      .done(function (data) {
        if (data == "success") {
          $("#loginMessage").html("<img src='../images/loginSuccess.gif' class='center'>");
          window.setTimeout(function(){ window.location = "TrangChu.php" }, 100);       
        } else {
          $("#loginMessage").text("Tên người dùng hoặc mật khẩu không tồn tại!");
          $("#btnLogin").show();
        }
      });
  });

});
