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
const gameStart = document.querySelector("#game-start");
const gameCost = document.querySelector("#game-cost");
const hours = document.querySelector("#hours");
const gameEnd = document.querySelector("#game-end");

bookBtn.addEventListener("click", () => {
  var team1 = $("#team1").val().trim();
  var team2 = $("#team2").val().trim();
  var game_date = $("#game-date").val();
  var game_start = $("#game-start").val();
  var game_end = $("#game-end").val();
  var game_cost = $("#game-cost").val();
  var phone = $("#phone").val().trim();

  if (team1 == "" || team2 == "" || phone == "") {
    toastr.warning("Fill in the Team Details", "Missing Info");

    if (phone == "") $("#phone").trigger("focus");
    if (team2 == "") $("#team2").trigger("focus");
    if (team1 == "") $("#team1").trigger("focus");
    return;
  }

  var time = (gameEnd.value - gameStart.value) / 10000;
  toastr.info("One moment to finalize", "Transaction Ongoing");

  $.ajax({
    url: "/booking",
    method: "POST",
    data: {
      team1: team1,
      team2: team2,
      game_date: game_date,
      game_start: game_start,
      game_end: game_end,
      total_cost: game_cost * time,
      no_of_hours: time,
      phone: phone,
    },
    success: (result) => {
      if (result.message == 1)
        window.location.href = "redirect?id=" + result.game_id;

      if (result.message == 3)
        toastr.error("Game is Already Booked", "Time Unavailable");
    },
    error: (data) => {
      toastr.error("Something Went Wrong");
      console.error(data.responseText, data.responseJSON);
    },
  });
});

const hamburger = document.querySelector(".hamburger");
const navList = document.querySelector(".nav__list");
var modal = document.getElementById("myModal");

const openModal = () => {
  modal.style.display = "block";
  hamburger.classList.remove("is-active");
  navList.classList.remove("nav-visible");
};
const closeModal = () => (modal.style.display = "none");

const ModalMenu = () => {
  window.onclick = function (event) {
    if (event.target == modal) modal.style.display = "none";
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

function ChangeCost() {
  bookBtn.removeAttribute("disabled");
  if (gameEnd.value <= gameStart.value) {
    toastr.error("End Time must be at least 1 hr later");
    bookBtn.setAttribute("disabled", "true");
    return;
  }

  var time = (gameEnd.value - gameStart.value) / 10000;
  if (time > 3) {
    toastr.error("Max Number of Hrs is 3");
    bookBtn.setAttribute("disabled", "true");
    return;
  }

  hours.value = time;
  $("#total-cost").val(time * gameCost.value);
}

gameStart.addEventListener("change", ChangeCost);
gameEnd.addEventListener("change", ChangeCost);

jQuery(() => SetMinDate());
