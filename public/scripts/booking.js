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

const bookBtn = document.querySelector(".book__btn");

bookBtn.addEventListener("click", () => {
  var team1 = $("#team1").val();
  var team2 = $("#team2").val();

  if (team1 == "" || team2 == "") {
    toastr.warning("Fill in the Team Details", "Missing Info");

    if (team2 == "") $("#team2").trigger("focus");
    if (team1 == "") $("#team1").trigger("focus");
    return;
  }
});

const hamburger = document.querySelector(".hamburger");
const navList = document.querySelector(".nav__list");
var modal = document.getElementById("myModal");

const openModal = () => {
  modal.style.display = "block";
  //   if (!hamburger.className.includes("is-active")) {
  hamburger.classList.remove("is-active");
  navList.classList.remove("nav-visible");
  //   }
};
const closeModal = () => (modal.style.display = "none");

const ModalMenu = () => {
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
};

document.querySelector(".nav__link--btn").addEventListener("click", openModal);
document.querySelector("#cancelBtn").addEventListener("click", closeModal);

function SetMinDate() {
  var now = new Date();

  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);

  var today = now.getFullYear() + "-" + month + "-" + day;

  $("#game-date").val(today);
  $("#game-date").attr("min", today);
}

// $(document).ready(() => SetMinDate());

jQuery(() => SetMinDate());
