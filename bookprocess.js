//VALIDATE STRING LENGTH!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1

function getData()
{
	// validate data
  form = document.forms["inputForm"];
	var name = form["name"].value;
	var phone = form["phone"].value;
	var unit = form["unit"].value;
	var streetnum = form["streetnum"].value;
	var street = form["street"].value;
	var suburb = form["suburb"].value;
	var date = form["date"].value;
	var time = form["time"].value;
	var dropoff = form["dropoff"].value;

	var valid = true;
	console.log("name:" + name + "phone:" + phone);

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	var h = today.getHours();
	var m = today.getMinutes();
	 if(dd<10){
					dd='0'+dd
			}
			if(mm<10){
					mm='0'+mm
			}


if (h < 10) {
		h ='0'+ h
}
	if (m <10){
		m = '0'+m
	}

	today = yyyy+'-'+mm+'-'+dd;
	var now = h+':'+ m;
///////////////////////////////////////////////////////////

	if(name == "")
	{
		console.log('dropoff');
		valid = false;
	}

/////////////////////////////////////////////////////////////

	if(phone == "")
	{
		console.log('dropoff i');
		valid = false;
	}
	/*
	else {
		var expression = /[0-9]/;
		var validExpression = expression.exec(phone);

		if(validExpression)
		{
			// phone is valid
		}
		else
		{
			// phone is not valid
		}
	}
	*/
//////////////////////////////////////////////////////////////////
	if(streetnum == "" )
	{
		console.log('dropoff in');
		valid = false;
	}

////////////////////////////////////////////////////////////////////////
	if(street == "")
  {
		console.log('dropoff inv');
		valid = false;
	}

///////////////////////////////////////////////////////////
	if(suburb == "")
	{
		console.log('dropoff inva');
		valid = false;
	}

	/////////////////////////////////////////////////////////
	if (date < today)
	{
		console.log('dropoff inval');
		valid = false;
	}

	////////////////////////////////////////////////////////////
	if (date == today && time < now)
	{
		console.log('dropoff invali');
		valid = false;
	}
	/////////////////////////////////////////////////////////////////
	if(dropoff == "")
	{
		console.log('dropoff invalid');
		valid = false;
	}



	if(valid)
	{
	   	sendData();
	}
	else
	{
		// data is invlaid, dont process anything
		alert("Bad input :(");

	}


function sendData()
{
	var xhr = createRequest();
	var dataSource = 'dataprocess.php';
	console.log("are we getting hit");
	if(xhr)
	{
			console.log("inside xhr request");
			var requestbody = "name=" +encodeURIComponent(name)
			 + "&phone=" +encodeURIComponent(phone)
			 + "&unit=" +encodeURIComponent(unit)
			 + "&streetnum=" +encodeURIComponent(streetnum)
			 + "&street=" +encodeURIComponent(street)
			 + "&suburb=" +encodeURIComponent(suburb)
			 + "&date=" +encodeURIComponent(date)
			 + "&time=" +encodeURIComponent(time)
			 + "&dropoff=" +encodeURIComponent(dropoff) ;
			xhr.open("POST", dataSource, true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function()
			{
				 if (xhr.readyState == 4 && xhr.status == 200)
				 {
					 // the server gave us a response.
					 var response = xhr.response;
					 console.log(response);
				 }
			}
			xhr.send(requestbody);
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
} // end function createRequest()
}
