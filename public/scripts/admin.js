const menuToggle = document.querySelector(".menu-toggle");
const aside = document.querySelector("aside");

menuToggle.addEventListener("click", () => {
  menuToggle.classList.toggle("is-active");
  aside.classList.toggle("is-active");
});

const openSection = (section) => {
  var x = document.getElementsByClassName("admin-section");
  for (i = 0; i < x.length; i++) x[i].style.display = "none";

  menuToggle.classList.remove("is-active");
  aside.classList.remove("is-active");

  document.getElementById(section).style.display = "block";
};

function editTeam(id) {
  openSection("edit");
  $("#team-id").val(id);
  $("#captain").val("").trigger("focus");
}

function editTeamInfo() {
  var team_id = $("#team-id").val();
  var captain = $("#captain").val();
  var contact = $("#contact").val();

  if (captain == "") {
    toastr.error("Enter Captain Name");
    $("#captain").trigger("focus");
    return;
  }

  $.ajax({
    url: "admin/editTeam",
    method: "POST",
    data: {
      team_id: team_id,
      captain: captain,
      contact: contact,
    },
    success: () => {
      toastr.info("Team Info Updated");
      $(`#captain${team_id}`).text(`${captain}`);
      $(`#contact${team_id}`).text(`${contact}`);
      openSection("teams");
      $("#captain").val("");
      $("#contact").val("");
    },
    error: () => toastr.error("Something Went Wrong"),
  });
}

function editScores(game, team1, team2) {
  openSection("scores");
  $("#team1-name").text(`${team1}`);
  $("#team2-name").text(`${team2}`);
  $("#game-id").val(game);
  $("#score1").val("").trigger("focus");
}

function addScores() {
  var score1 = parseInt($("#score1").val().trim());
  var score2 = parseInt($("#score2").val().trim());

  if (score1 === null || score2 === null) {
    toastr.warning("Enter Scores for the Respective Teams");

    if (score2 === null) $("#score2").trigger("focus");
    if (score1 === null) $("#score1").trigger("focus");
    return;
  }

  $.ajax({
    url: "admin/addScores",
    method: "POST",
    data: {
      score1: score1,
      score2: score2,
      game_id: $("#game-id").val(),
    },
    success: (result) => {
      toastr.success("Scores Updated Successfully");

      $("#scores-table tbody").empty();
      $("#games-table tbody").empty();

      if (result.games.length === 0) $(".admin__msg").show();
      else {
        result.games.forEach((game) => {
          $("#games-table tbody").append(
            `<tr><td>${game.game_id}</td><td>${game.team1_name} vs ${game.team2_name}</td><td>None</td><td><button class="admin__btn--edit" onclick="editScores(${game.game_id}, ${game.team1_id}, ${game.team2_id})">Add Scores</button></td></tr>`
          );
        });
      }

      result.scores.forEach((score) => {
        $("#scores-table tbody").append(
          `<tr><td>${score.game_id}</td><td>${score.team1_name} vs ${score.team2_name}</td><td>${score.team1_score} - ${score.team2_score}</td><td>${score.game_date}</td></tr>`
        );
      });

      openSection("games");
      $("#score1").val("");
      $("#score1").val("");
    },
    error: () => toastr.error("Something went wrong"),
  });
}
