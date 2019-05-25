"use strict";

const operatorArr = ["+", "-", "/", "*"];

$(".key").click(function(EO) {
  const currentElementIsOperator = operatorArr.some(
    item => item === $(this).val()
  );
  let previousValue =
    $("#inputValue").val() === "0" ? "" : $("#inputValue").val();
  const isOperation = operatorArr.some(item => item === $(this).val());
  const isLastElOperation = operatorArr.some(
    item => item === previousValue[previousValue.length - 1]
  );
  let currentValue = null;
  if (isOperation) {
    currentValue = isLastElOperation
      ? previousValue.slice(0, -1) + $(this).val()
      : previousValue + $(this).val();
  } else {
    currentValue = previousValue + $(this).val();
  }
  $("#inputValue").val(currentValue);
});

function valueValidation(value) {
  let currentValue = value;
  const lastElementIsOperator = operatorArr.some(
    item => item === currentValue[currentValue.length - 1]
  );
  const firstElementIsOperator = ["*", "/"].some(
    item => item === currentValue[0]
  );
  if (lastElementIsOperator) {
    currentValue = currentValue.slice(0, -1);
  }
  if (firstElementIsOperator) {
    currentValue = currentValue.slice(1);
  }
  if (value.length === 1 && lastElementIsOperator) {
    currentValue = 0;
  }
  return currentValue;
}

$("#countButton").click(function() {
  let currentValue = $("#inputValue").val();
  const finalValue = valueValidation(currentValue);
  $.ajax({
    type: "POST",
    url: "analytics.php",
    data: { value: finalValue },
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
  const currentValue = 0;
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
