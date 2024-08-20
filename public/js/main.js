
// var BaseUrl = "http://localhost/ecnu/public";
var BaseUrl = "http://127.0.0.1:8000";
var StoreDataAPI = BaseUrl+"/api/save/data/details";
var UpdateDataAPI = BaseUrl+"/api/update/data/details";



function showCustomAlert(message) {
    var alertBox = document.getElementById("custom-alert");
    var messageSpan = document.querySelector(".custom-alert-message");
    messageSpan.innerHTML = message;
    alertBox.style.display = "block";
}

function closeCustomAlert() {
    var alertBox = document.getElementById("custom-alert");
    alertBox.style.display = "none";
}

function printReceipt ()
{

	var contentOfDiv = document.getElementById("receipt-print-area").innerHTML;
	var newWin = window.open('', '');
	newWin.document.write('');
	newWin.document.write(contentOfDiv);
	newWin.document.write('');
	newWin.document.close();
	newWin.print();
}