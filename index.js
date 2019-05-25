"use strict";

$(".key").click(function(EO) {
  var previousValue =
    $("#inputValue").val() === "0" ? "" : $("#inputValue").val();
  const operatorArr = ["+", "-", "/", "*"];
  const isOperation = operatorArr.some(item => item === $(this).val());
  const isLastElOperation = operatorArr.some(
    item => item === previousValue[previousValue.length - 1]
  );
  var currentValue = null;
  if (isOperation) {
    currentValue = isLastElOperation
      ? previousValue.slice(0, -1) + $(this).val()
      : previousValue + $(this).val();
  } else {
    currentValue = previousValue + $(this).val();
  }
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
