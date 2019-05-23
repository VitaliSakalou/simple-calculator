"use strict";

$(".key").click(function(EO) {
  var previousValue =
    $("#inputValue").val() === "0" ? "" : $("#inputValue").val();
  var currentValue = previousValue + $(this).val();
  $("#inputValue").val(currentValue);
});
