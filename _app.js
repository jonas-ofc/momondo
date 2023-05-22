let the_input = document.querySelector("#from_city");

let from_input = document.querySelector("#from_city").value;

let to_input = document.querySelector("#to-input");

function showFromResults() {
  console.log("xxx");
  if (the_input.value.length > 0) {
    document.querySelector("#from-results").style.display = "block";
    getCitiesFrom();
  } else {
    hideFromResults();
  }
}

function hideFromResults() {
  console.log("xxx");
  document.querySelector("#from-results").style.display = "none";
}

async function getCitiesFrom() {
  console.log(the_input.value);

  let conn = await fetch("api-get-cities-from?from_city=" + the_input.value);

  let data = await conn.json();
  console.log(data);

  const divCity = `
      <div class="from-city" onclick="selectFromCity()">
      <img src="img/#city_image#">

      <div class="city-info">
      <h4>#city_country#, #city_name#</h4>
      <p>#city_airport#</p>
      </div>
      
      <div>
      <p>#city_airport_abr#</p>
      </div>

    </div>`;

  let all_flights = "";
  data.forEach((flight) => {
    console.log(flight);
    let div_flight = divCity;
    div_flight = div_flight.replace("#city_image#", flight.city_image);
    div_flight = div_flight.replace("#city_name#", flight.city_name);
    div_flight = div_flight.replace("#city_airport#", flight.city_airport);
    div_flight = div_flight.replace("#city_country#", flight.city_country);
    div_flight = div_flight.replace(
      "#city_airport_abr#",
      flight.city_airport_abr
    );

    all_flights += div_flight;
  });

  document.querySelector("#from-results").innerHTML = all_flights;
}

function selectFromCity() {
  console.log(
    "selected from city",
    event.target.querySelector(".city-info p").textContent
  );

  let input = event.currentTarget
    .querySelector(".city-info p")
    .textContent.trim();

  the_input.value = input;
}

function selectToCity() {
  console.log(
    "selected to city",
    event.target.querySelector(".to-city-info p").textContent.trim()
  );

  let input = event.currentTarget
    .querySelector(".to-city-info p")
    .textContent.trim();

  to_input.value = input;
}

function hideToResults() {
  console.log("xxx");
  document.querySelector("#to-results").style.display = "none";
}

function showToResults() {
  console.log("xxx");
  if (to_input.value.length > 0) {
    document.querySelector("#to-results").style.display = "block";
    getCitiesTo();
  } else {
    hideToResults();
  }
}

async function getCitiesTo() {
  let conn = await fetch("api-get-cities-to?to_city=" + to_input.value);
  let data = await conn.json();

  let divCity = `<div class="to-city" onclick="selectToCity()">
  <img src="img/#city_image#" alt="">

  <div class="to-city-info">
  <h4>#city_country#, #city_name#</h4>
  <p>#city_airport#</p>
  </div>
  
  <div>
  <p>#city_airport_abr#</p>
  </div>

  </div>
  
</div>`;

  let all_flights = "";
  data.forEach((flight) => {
    console.log(flight);
    let div_flight = divCity;
    div_flight = div_flight.replace("#city_image#", flight.city_image);
    div_flight = div_flight.replace("#city_name#", flight.city_name);
    div_flight = div_flight.replace("#city_airport#", flight.city_airport);
    div_flight = div_flight.replace("#city_country#", flight.city_country);
    div_flight = div_flight.replace(
      "#city_airport_abr#",
      flight.city_airport_abr
    );

    all_flights += div_flight;
  });

  document.querySelector("#to-results").innerHTML = all_flights;
  console.log(data);
}

function shiftCities() {
  let city1 = document.querySelector("#from_city");
  let city2 = document.querySelector("#to-input");

  let input1 = document.querySelector("#from_city").value;
  let input2 = document.querySelector("#to-input").value;

  city1.value = input2;
  city2.value = input1;
}

async function getFlights() {
  let conn = await fetch(
    "api-get-flights?from_airport=" +
      the_input.value +
      "&to_airport=" +
      to_input.value
  );
  let data = await conn.json();
  console.log(data);

  let divFlight = `
  <form class="flight-form">
                <div class="flight" onclick="">
                <input name="flight_id" class="flight-id" style="display:none" value="#flight_id#">
                
                <img src="img/#airline_image#" alt="">
                <div class="flight-departure-date-wrapper">
                <p>#departure_date#</p>
                </div>
                <div class="flight_departure_wrapper">
                <h4>#city_country#,</h4>
             
                <h5>#city_airport#</h5> 
                <p>#departure_time#</p>
               

                </div> 



               


                <div class="flight-arrival-wrapper">
                <h4>#arrival_country#</h4>
                
                <h5>#arrival_airport#</h5> 
                <p>#departure_landing_time#</p>
                </div>  

                <div class="flight-price-wrapper">
                <h3>#flight_price#</h3>
                <h4>#flight_seat_type#</h4>
                </div>
                <button type="button" class="flight_delete_button" data-flight="" onclick="deleteFlight()">🗑️</button>
                </div>             
  </form>`;

  let all_flights = "";
  data.forEach((flight) => {
    console.log(flight);
    let div_flight = divFlight;
    div_flight = div_flight.replace("#flight_id#", flight.flight_id);
    div_flight = div_flight.replace("#airline_image#", flight.airline_logo);

    div_flight = div_flight.replace("#city_name#", flight.departure_city);
    div_flight = div_flight.replace("#city_airport#", flight.departure_airport);
    div_flight = div_flight.replace("#city_country#", flight.departure_country);

    div_flight = div_flight.replace(
      "#arrival_country#",
      flight.arrival_country
    );

    div_flight = div_flight.replace("#arrival_city#", flight.arrival_city);
    div_flight = div_flight.replace(
      "#arrival_airport#",
      flight.arrival_airport
    );
    div_flight = div_flight.replace(
      "#departure_landing_time#",
      flight.departure_landing_time
    );
    div_flight = div_flight.replace("#departure_time#", flight.departure_time);
    div_flight = div_flight.replace("#departure_date#", flight.departure_date);

    div_flight = div_flight.replace("#flight_price#", flight.flight_price);
    div_flight = div_flight.replace(
      "#flight_seat_type#",
      flight.flight_seat_type
    );

    all_flights += div_flight;
  });

  document.querySelector("#searchedFlights").innerHTML = all_flights;

  console.log(data);
}

async function deleteFlight() {
  const flight = event.target.form;
  console.log(flight);
  const conn = await fetch("api-delete-flights.php", {
    method: "POST",
    body: new FormData(flight),
  });
  const data = await conn.json();
  if (!conn.ok) {
    // Sweet alert: ups... fligth not found
    console.log(data);
    return;
  }
  // Success

  flight.querySelector(".flight").classList.add("deleteBlink");
  flight.querySelector(".flight").addEventListener("animationend", () => {
    flight.remove();
  });
  console.log(data);
}
