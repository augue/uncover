function load() {
  
//	$("#loading").show();
var type = 0;
    $.ajax({
        url: "backend/roomList.php",
        type: "POST",
        dataType: "json",
        data: {
             type: type
//            start: limitStart
        },
        success: function(data) {
             $("#room_Type").empty();
               $.each(data, function(key,value) {
               
             $("#room_Type").append(`<option value="${value.typeNumber}"> ${value.typeNumber} - ${value.amount} </option>`);

               });
               
//             $("#loading").hide();    
        }
    });
};


   




function loadDep() {
  
//	$("#loading").show();
var type = 0;
    $.ajax({
        url: "backend/departureList.php",
        type: "POST",
        dataType: "json",
        data: {
             type: type
//            start: limitStart
        },
        success: function(data) {
             $(".dep_details").empty();
               $.each(data, function(key,value) {
               
           
 $(".dep_details").append(`<tbody><tr>
                                    <td>Departure airport</td>
                                    <td>${value.dep_airport}</td>
                                </tr>
                                <tr>
                                    <td>Departure country</td>
                                   <td>${value.dep_country}</td>
                                </tr>
 <tr>
                                    <td>Departure city</td>
                                  <td>${value.dep_airport}</td>
                                </tr>
 <tr>
                                    <td>Departure Date</td>
                                    <td>${value.dep_date}</td>
                                </tr>


                                <tr>
                                    <td>Adult</td>
                                   <td>${value.adult}</td>
                                </tr>
    <tr>
                                    <td>Children</td>
                                    <td>${value.children}</td>
                                </tr>
    <tr>
                                    <td>Duration</td>
                                   <td>${value.duration}</td>
                                </tr>
                            </tbody>`);

               });
               
//             $("#loading").hide();    
        }
    });
};
loadDep();