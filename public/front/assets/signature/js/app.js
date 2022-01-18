var wrapper = document.getElementById("signature-pad");
var clearButton = wrapper.querySelector("[data-action=clear]");
var changeColorButton = wrapper.querySelector("[data-action=change-color]");
var undoButton = wrapper.querySelector("[data-action=undo]");
var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {
  backgroundColor: 'rgb(255, 255, 255)'
});

function resizeCanvas() {
  var ratio =  Math.max(window.devicePixelRatio || 1, 1);
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);
  signaturePad.clear();
}
window.onresize = resizeCanvas;
resizeCanvas();
clearButton.addEventListener("click", function (event) {
  signaturePad.clear();
});

undoButton.addEventListener("click", function (event) {
  var data = signaturePad.toData();
  if (data) {
    data.pop(); // remove the last dot or line
    signaturePad.fromData(data);
  }
});

changeColorButton.addEventListener("click", function (event) {
  var r = Math.round(Math.random() * 255);
  var g = Math.round(Math.random() * 255);
  var b = Math.round(Math.random() * 255);
  var color = "rgb(" + r + "," + g + "," + b +")";
  signaturePad.penColor = color;
});
function ImagePNG() {
  if (signaturePad.isEmpty()) {
      return false;
  } else {
    var dataURL = signaturePad.toDataURL("image/png");
    var block = dataURL.split(";");
    var mimeType = block[0].split(":")[1];
    var realData = block[1].split(",")[1];
    html = '<input type="hidden" name="Signatur_Data" value="' + realData.replace(/^.*,/, '') + '" >';
    html += '<input type="hidden" name="Signatur_Type" value="'+ mimeType +'" >';
    html += '<input type="hidden" name="Signature" value="Signatur.png" >';
    $("#Signatur").empty().append(html);
  }
}