/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.details ={
dep_airport: null,
dep_city:null,
dep_country:null,
dep_date:null,
adult:null,
children:null,
duration:null
}

function generateHash(string) {
    var hash = 0;
    if (string.length == 0)
        return hash;
    for (let i = 0; i < string.length; i++) {
        var charCode = string.charCodeAt(i);
        hash = ((hash << 7) - hash) + charCode;
        hash = hash & hash;
    }
    localStorage.setItem('token',hash);

    console.log(hash);
    return hash;
}


$(document).ready(function(){
    
    $('#cBook').click(function(){
      details.dep_airport =    $('#dep_airport').val();
      details.dep_city =    $('#dep_city').val();
      details.dep_country =    $('#dep_country').val();
     details.dep_date =    $('#date-range0').val();
     details.adult =    $('#adult').val();
     details.children =    $('#children').val();
     alert(details.children);
      details.duration =    $('#duration').val();
      localStorage.setItem('adultcount',details.adult);
       localStorage.setItem('childrencount',details.children);
        if (details.dep_date == '') {
            errorMessage()
            
            return false;
        }
        else{
          confirmCBook()  
        }


    
    
    
    });


})
 
function sendData(){
    	$.ajax({
            type: "POST",
            url: "backend/tempUserCreator.php",
            data: {
                dep_airport: details.dep_airport,
                dep_city: details.dep_city,
                dep_country: details.dep_country,
                dep_date: details.dep_date,
                adult: details.adult,
                children: details.children,
                duration: details.duration
                
            },
            cache: false,
            success: function (data) {
                
                 window.location.href="hotel-booking.html";
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
} 
 
 
 
    function confirmCBook(){
         Swal.fire({
            title: 'Are you sure?',
            text: "Continue bookings",
            icon: 'Successful',
            showCancelButton: true,
            confirmButtonColor: '#ec5f0c!',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Continue!'
        }).then((result) => {
            if (result.isConfirmed) {
                
                sendData()
        
            }
        })
   
        
    }

function errorMessage(){
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Your form is not complete',
 
})    
}

$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();
		if(name!="" && email!="" && phone!="" && city!=""){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					name: name,
					email: email,
					phone: phone,
					city: city				
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
//						$("#butsave").removeAttr("disabled");
//						$('#fupForm').find('input:text').val('');
//						$("#success").show();
//						$('#success').html('Data added successfully !'); 	
  
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
