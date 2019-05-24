"use strict";

$(".key").click(function(EO) {
  var previousValue =
    $("#inputValue").val() === "0" ? "" : $("#inputValue").val();
  var currentValue = previousValue + $(this).val();
  $("#inputValue").val(currentValue);
});

$("#countButton").click(function() {
  var currentValue = $("#inputValue").val();

  $.ajax({
    type: "POST",
    url: "analytics.php",
    data: { value: currentValue },
    success: function(result) {
      $("#inputValue").val(result);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(
        thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
      );
    }
  });
});

$("#resetButton").click(function() {
  var currentValue = 0;
  $.ajax({
    type: "POST",
    url: "analytics.php",
    data: { value: currentValue },
    success: function(result) {
      $("#inputValue").val(result);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(
        thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
      );
    }
  });
});
