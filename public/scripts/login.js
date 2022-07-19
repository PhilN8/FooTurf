toastr.options = {
  closeButton: true,
  debug: false,
  newestOnTop: false,
  progressBar: false,
  positionClass: "toast-bottom-right",
  preventDuplicates: true,
  onclick: null,
  showDuration: "300",
  hideDuration: "1000",
  timeOut: "5000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};

$("#loginForm").on("submit", (evt) => {
  evt.preventDefault();

  var username = $("#username").val();
  var password = $("#password").val();

  if (username == "" || password == "") {
    toastr.warning("Fill in the required details", "Missing Info");

    if (password == "") $("#password").trigger("focus");
    if (username == "") $("#username").trigger("focus");
    return;
  }

  $.ajax({
    url: `http://localhost:8080/login`,
    type: "POST",
    data: {
      username: username,
      password: password,
    },
    success: (result) => {
      console.log(result);
      if (result.message == 1) {
        toastr.info("Login Successful");
        window.location.href = "http://localhost:8080/admin";
      }

      if (result.message == 2 || result.message == 3)
        toastr.error("Incorrect Username or Password", "Invalid Credentials");
    },
    error: (data) => {
      toastr.error("Something went wrong");
      console.error(data.responseText);
    },
  });
});
