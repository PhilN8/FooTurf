toastr.options = { positionClass: "toastr-top-right", closeButton: true };

function MatchDetails() {
  var id = new URL(window.location.href).searchParams.get("id");

  $.ajax({
    url: "/redirect",
    data: {
      game_id: id,
    },
    method: "POST",
    success: (result) => {
      //   console.log(result, parseInt(result.game_end.slice(0, 2)));

      var cost =
        (parseInt(result.game_end.slice(0, 2)) -
          parseInt(result.game_start.slice(0, 2))) *
        2000;

      $("#match").text(`${result.team1} vs ${result.team2}`);
      $("#time").text(`${result.game_start} - ${result.game_end}hrs`);
      $("#date").text(`${result.game_date}`);
      $("#booked").text(`${result.created_at}`);
      $("#cost").text(`${cost}`);

      $(".info__table").show();
    },
    error: () => toastr.error("Something Went Wrong...", "No Match Info"),
  });
}

jQuery(() => MatchDetails());
