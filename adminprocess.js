function getBookings()
{
  var xhr = createRequest();
  var dataSource = 'adminprocess.php';

  if (xhr)
  {
    console.log('here?');
    xhr.open("GET", dataSource, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function(){

      if (xhr.readyState == 4 && xhr.status == 200)
      {

        var response = xhr.response;
        var target = document.getElementById("target");
        target.innerHTML = response;
        console.log(response);
      }
    };

    xhr.send(null);
    }
}


function createRequest() {
	 var xhr = false;
	 if (window.XMLHttpRequest) {
			 xhr = new XMLHttpRequest();
	 }
	 else if (window.ActiveXObject) {
			 xhr = new ActiveXObject("Microsoft.XMLHTTP");
	 }
	 return xhr;
} // en
