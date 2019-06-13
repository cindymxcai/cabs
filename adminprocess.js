//Cindy Cai 16938610 Admin page functions

//takes admin php delete function that will remove from the table when assigned

function deleteBookings()
{
  var bookingref = document.getElementById("input").value;
var xhr = createRequest();

var dataSource = 'adminDelete.php?number='+bookingref;
if (xhr)
{

  xhr.open("GET", dataSource, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function(){

    if (xhr.readyState == 4 && xhr.status == 200)
    {
      var response = xhr.response;
      var target = document.getElementById("test");
      target.innerHTML = response;
      console.log(response);
      getBookings();
    }
  };

  xhr.send(null);
  }
}

//displays table of bookings

function getBookings()
{
  var xhr = createRequest();
  var dataSource = 'adminprocess.php';

  if (xhr)
  {

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
//starts xml request

function createRequest() {
	 var xhr = false;
	 if (window.XMLHttpRequest) {
			 xhr = new XMLHttpRequest();
	 }
	 else if (window.ActiveXObject) {
			 xhr = new ActiveXObject("Microsoft.XMLHTTP");
	 }
	 return xhr;
} 
