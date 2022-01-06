

//const serviceURL = `https://htms-web-67kxd.ondigitalocean.app/api/v1/`;

const serviceURL = `http://192.168.1.129/htms-beta/public/api/v1/`;


systemLogin = ()=>{


	var payload = {

		email:$("#email").val(),
		password:$("#password").val()
	};


    if(payload.email == "" || payload.email == null) {
      alert("Customer Title field is Empty");  
	}else if (payload.password == "" || payload.password == null) {
       alert("Customer First Name field is Empty");
	}else{

	  ajaxResquest('users/auth','POST',payload);
	}

}



registerUser = ()=>{


	var payload = {

		firstname:$("#firstName").val(),
		lastname:$("#lastName").val(),
		email:$("#userMail").val(),
		role:$("#userRole").val()
	};


    if(payload.firstname == "" || payload.firstname == null) {
      alert("User First Name field is Empty");  
	}else if (payload.lastname == "" || payload.lastname == null) {
       alert("User Last Name field is Empty");
	}else if (payload.email == "" || payload.email == null) {
       alert("User Mail field is Empty");
	}else if (payload.role == "" || payload.role == null) {
       alert("User Role field is Empty");
	}else{

	  ajaxResquestAuth('users','POST',payload);
	}

}

ajaxResquest = async (endpoint,method,payload)=>{
	try{
		const options = {
			method,
			headers:{
				'Content-Type':'application/json',
				'Authorization': `Bearer ${sessionStorage.getItem('token')}`
			},
			body:JSON.stringify(payload)
		}
		let response = await fetch(`${serviceURL}${endpoint}`, options);
		response = await response.json();

		if (response.status == 'success') {
            console.log(response.message);
            sessionStorage.setItem('user',JSON.stringify(response.user));
            sessionStorage.setItem('token',JSON.stringify(response.token));

            if ("token" in sessionStorage) {
                window.location.href = "dashboard.html";
			} else {
			    alert('no');
			}

		}else{
			console.log(response.message)
		}

		console.log(response)
	}catch(err){

	}
}


ajaxResquestAuth = async (endpoint,method,payload)=>{
	try{
		const options = {
			method,
			headers:{
				'Content-Type':'application/json',
				'Authorization': `Bearer ${sessionStorage.getItem('token')}`
			},
			body:JSON.stringify(payload)
		}
		let response = await fetch(`${serviceURL}${endpoint}`, options);
		response = await response.json();

		if (response.status == 'success') {
            console.log(response.message);
           

		}else{
			console.log(response.message)
		}

		console.log(response)
	}catch(err){
       console.log(err)
	}
}
