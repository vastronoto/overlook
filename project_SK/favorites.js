// send item ID to php with AJAX and update buttons
var xhr;
if (window.ActiveXObject){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
}

var curr_button;

function callServer(bttn){
    curr_button = bttn;
    var ITEM_ID = bttn.getAttribute('class');

    // build URL to connect to
    var url = "/cs329e-mitra/vaa546/final_project/saveFavorites.php?item_id=" +escape(ITEM_ID);
    
    // create the name-value pairs that will be sent as data 
    var params = "item_id=ITEM_ID";
    
    // Open a connection to the server
    xhr.open("POST", url, true);
    
    // create the proper headers to send with the request
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // setup a function for the server to run when it is done
    xhr.onreadystatechange = updatePage;

    // send the request 
    xhr.send(params); 
}

function updatePage(){
    // send window alert if username exists
    if ((xhr.readyState == 4) && (xhr.status == 200)){
        var response = xhr.responseText;
	if (response == "not logged in"){
	  window.alert('You must log in to add this item to your favorites.');
      curr_button.innerHTML = "Add to Favorites";
	  curr_button.style.background = "#ffffff";
	  curr_button.style.color = "black";
	  curr_button.disabled = false;
	   }
	//else if (response == "taken"){
	//  window.alert('This item is already in your favorites.');
    }
	else if (response != "taken" && response != ""){
	  curr_button.innerHTML = "Added!";
	  curr_button.style.background = "#f48983";
	  curr_button.style.color = "white";
	  curr_button.disabled = true;
	  //document.getElementsByClassName(response).setAttribute("onclick", "javascript: Remove();");
    }
}