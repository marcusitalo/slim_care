$(document).ready(function () {
  var feedback = $("#alert-feedback span").text();
  if (feedback != "") {
    var informacao = feedback.split("|");
    var status = informacao[0];
    var color = "";
    switch (status) {
      case "0":
        class_ = "alert-danger";
        break;
      case "1":
        class_ = "alert-info";
        break;
      default:
        class_ = "alert-success";
        break;
    }
    $("#alert-feedback").removeClass("alert-success");
    $("#alert-feedback").removeClass("alert-danger");
    $("#alert-feedback").removeClass("alert-info");

    $("#alert-feedback").addClass(class_);

    $("#alert-feedback span").text(informacao[1]);
    $("#alert-feedback")
      .fadeIn(1000)
      .delay(3000)
      .fadeOut(2000, function () {
        $("#alert-feedback span").html("");
      });
  }
  // document.querySelector("body > div:last-of-type").remove();
});
