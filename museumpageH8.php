


<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">




<style>



      body {
          background-image: url('black.png');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center;
          background-size: cover;
          font-family: Arial, sans-serif;
          color: #ffffff;
      }

      .topnav {
          overflow: hidden;
          background-color: none;
          display: flex;
    		float: right;
          justify-content: flex-end;
          margin: 0px 10px 0 60px;
      }

      .topnav a {
    		float: left;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
      }

      .topnav a.active,
      .topnav a:hover {
          color: rgb(255, 181, 44);
          text-decoration: underline;
      }

      .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
      }

      .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
      }

      .sidenav a:hover {
          color: #f1f1f1;
      }

      .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
      }

      #main {
          transition: margin-left .5s;
          padding: 16px;
    		width: 50%;
    		position: absolute;
      }

      @media screen and (max-height: 450px) {
          .sidenav {
              padding-top: 15px;
          }

          .sidenav a {
              font-size: 18px;
          }
      }

      .line1 {
          border: 0.5px solid white;
          border-radius: 20px;
          width: 90%;
          max-width: 900px;
          margin: 20px auto;
          backdrop-filter: blur(2px);
          padding: 20px;
      }

      .museum1 {
          display: block;
          margin-left: auto;
          margin-right: auto;
      }

      img {
          margin-top: 40px;
          opacity: 1;
          width: 100%;
          max-width: 500px;
      }

      .gambar{
          width: 50%;
          margin:auto;
          display: block;
      }

      .descevents {
          color: rgb(221, 187, 255);
          text-align: center;
          margin: 20px 0;
      }

      .button {
          text-align: right;
          margin-top: 90px;
      }

      .btnproceed,
      .btncancel {
          background-color: #818181;
          color: #fff;
          padding: 16px 20px;
          border-radius: 10px;
          cursor: pointer;
          font-weight: 900;
          margin: 5px;
          opacity: 0.9;
      }

      .btnproceed {
          background-color: #ffb74a;
      }

      .btnproceed:hover,
      .btncancel:hover {
          opacity: 1;
      }

      




       


    	/*kotak*/
    	.dropdown-content {
            margin-bottom: 50px;
    		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    		z-index: 1;
    		color: antiquewhite;
    		border-radius: 10px;
    	}

    	.calendar {
            width: 80%;
    		display: grid;
    		grid-template-columns: repeat(7, 1fr);
    		gap: 5px;
    		text-align: center;
    		margin-bottom: 10px;
            margin: auto;
    	}

    	.calendar div {
    		padding: 10px;
    		cursor: pointer;
    	}

    	.calendar div:hover {
    		background-color: antiquewhite;
            color: brown;
    		border-radius: 10px;
    	}

    	.calendar .header {
    		font-weight: bold;
            color : darkkhaki;
    	}

    	.calendar .days {
    		grid-column: span 7;
    		display: grid;
    		grid-template-columns: repeat(7, 1fr);
    	}

    	.nav-buttons {
            margin-top: 10px;
    		grid-column: span 7;
    		display: flex;
    		justify-content: space-between;
    		align-items: center;

    	}


    	.time-picker {
            width: 80%;
    		display: flex;
    		justify-content: space-between;
            margin: auto;
    	}

    	.time-picker select {
    		padding: 5px;
    		margin-right: 5px;

    		border: none;
    		border-radius: 4px;
    		margin : 3%;
    	}

    	/* New styles for the button */
    	#date-time-button {

    		margin :auto;
    		padding: 10px 20px;
    		font-size: 16px;
    		background-color:antiquewhite;
    		color: brown;
    		border: none;
    		border-radius: 5px;
    		cursor: pointer;
    		transition: background-color 0.3s;

    	}

    	#date-time-button:hover {
    		background-color: brown;
    		color: antiquewhite;
    	}

    	/* Show dropdown content */
    	.show {
    		display: block;
    	}



    	.counter{

    		margin:auto;
    		text-align: center;
    	}



    	.counter-container {

    		margin:auto;
    		border-radius: 5px;
    		padding: 10px;
      }

    	button {
    		background-color: white;
    		color: gray;
    		border: none;
    		padding: 10px;
    		cursor: pointer;
    		font-size: 20px;
    		border-radius: 5px;
    	}

    	button:disabled {
    		background-color: #cccccc;
    		cursor: not-allowed;
    	}

    	input[type="text"] {
    		width: 40px;
    		text-align: center;
    		border: none;
    		border-radius: 10px;
    		font-size: 20px;
    		margin: 0 10px;
    		outline: none;
    	}


    /*====================================================*/
    /*====================================================*/
    /*====================================================*/

    
      #about {
          width: 90%;
          max-width: 1000px;
          border-top: 1px solid grey;
          margin: 350px auto;
          padding-top: 20px;
          text-align: center;
          word-spacing: 5px;
          letter-spacing: 4px;
      }

      .fa {
          padding: 15px;
          font-size: 30px;
          width: 60px;
          text-align: center;
          text-decoration: none;
          margin:auto;
          border-radius: 100px;
      }

      .fa:hover {
          opacity: 0.7;
      }

      .fa-instagram {
          background: #125688;
          color: white;
      }

      .fa-google {
          background: #dd4b39;
          color: white;
      }

      .fa-facebook {
          background: #3B5998;
          color: white;
      }

      @media (max-width: 768px) {
          .topnav {
              flex-direction: column;
              align-items: flex-start;
          }

          .topnav a {
              padding: 10px;
              font-size: 15px;
          }

          .museum1 {
              flex-direction: column;
          }

          .button {
              text-align: center;
              margin-top: 20px;
          }


      }




      /**-=-=-=-=-==-=-=-=-=-=-=--=-=-=-===-=- */ 


        
              /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }
        
        /* Next & previous buttons */
        


         .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin: auto;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }

        .prev {
          left: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active, .dot:hover {
          background-color: #717171;
        }
        
        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }
        
        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
        }
        
        table{
            border: 1px solid wheat0;
            margin: auto;
            margin-top: 10px;
            table-layout: fixed;
            max-width:100%;
            vertical-align: text-top;
            margin-bottom: 50px;
        }
	    th{
            border: 1px solid wheat0;
            font-size: x-large;
            vertical-align: top;
            text-align: left;
        }
        td{
            border: 1px solid wheat0;
            font-size: medium;
            max-width: max-content;
        }
        textarea{
            background: none;
            color: white;
            border: none;
        }
</style>
</head>











<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<div id="main">
    <span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span>
</div>

<div class="topnav">
    <a href="mainpage.php">HOME</a>
    <a  href="profileuser.php">USER</a>
    <a href="listmuseumpage.php">MUSEUM</a>
    <a href="#about">ABOUT</a>
    <a class="w3-text-red" href="logout.php">LOG OUT</a>
</div>

<br><br><br><br>

<div class="line1">

		<div class="museum1">
			
    <div class="w3-container">
		<div class="slideshow-container w3-center">

        
        
        <div class="mySlides fade">
              <div class="numbertext">1 / 7</div>
              <img src="imgH8/h8a.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 7</div>
              <img src="imgH8/h8b.jpg" style="width:100%">

            </div>


            <div class="mySlides fade">
              <div class="numbertext">2 / 7</div>
              <img src="imgH8/h8c.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 7</div>
              <img src="imgH8/h8d.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">4 / 7</div>
              <img src="imgH8/h8e.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">5 / 7</div>
              <img src="imgH8/h8f.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">6 / 7</div>
              <img src="imgH8/h8g.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">7 / 7</div>
              <img src="imgH8/h8a.jpg" style="width:100%">

            </div>


            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        </div>

    </div>

    <br><br><br>



    <h1 class="w3-text-white w3-center "><b>Museum Kota Tinggi</b></h1>

        <div class="w3-responsive">
            
            <table style="width:60%">



                <tr>
                    <th>DESCRIPTION</th>
                    <td>
                        Located in the heart of Kota Tinggi, this museum chronicles the region's history, focusing on its role in the Johor Sultanate. The exhibits include archaeological finds, historical artifacts, and displays about the local culture and traditions. It offers visitors a comprehensive look at Kota Tinggi's rich heritage.
                    </td>
                </tr>

                <tr>
                    <th>OPENING TIME</th>
                    <td>caption</td>
                </tr>

                <tr>
                    <th>LOCATION</th>
                    <td><a href="https://www.google.com/maps/dir//Kampung+Makam,+81900+Kota+Tinggi,+Johor/@1.7371765,103.8296407,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31da6081b1a9317d:0x6a8cdae80f7be1d3!2m2!1d103.9122753!2d1.7374217?entry=ttu">Kota Tinggi Museum, Kampung Makam, 81900 Kota Tinggi, Johor</td>
                </tr>

                <tr>
                    <th>PRICE</th>
                    <td>RM 5</td>
                </tr>

                <tr>
                    <th>CONTACT</th>
                    <td>Encik Faizal, +60 7-883 4313</td>
                </tr>



            </table>

        </div>


    <br><br><br>




	<div class = "button">
    <a href="listmuseumpage.php" class="w3-button w3-round-xlarge w3-amber w3-hover-grey " >Cancel</a>
	<button class="btnproceed" onclick="location.href='purchasepage.php';">Book Now !</button>
	</div>


</div>





<footer>

<div id="about">
    <h3>ABOUT</h3>
    <p>At [Your Museum Company], we are dedicated to preserving history and culture through captivating exhibitions and interactive experiences.
		We believe that understanding the past is key to comprehending the present and shaping the future. With our diverse and rich collections, 
		we invite visitors to embark on a journey through the epochs of human civilization, from prehistoric times to the modern era. 
		Our vision is to be a center of learning that inspires, fosters appreciation for cultural heritage, 
		and encourages reflection on the universal values that shape our world.</p>

    <div>
        <a href="#" class="fa fa-instagram"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-facebook"></a>
    </div>

</div>

</footer>

















<script>
document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('date-time-button');
    const dropdownContent = document.getElementById('dropdown-content');
    const calendar = document.getElementById('calendar');
    const hourSelect = document.getElementById('hour-select');
    const minuteSelect = document.getElementById('minute-select');
    const amPmSelect = document.getElementById('am-pm-select');

    let selectedDate = null;

    // Toggle the dropdown content when the button is clicked
    button.addEventListener('click', function(event) {
        dropdownContent.classList.toggle('show');
        event.stopPropagation();  // Prevent click event from propagating to document
    });

    // Close the dropdown content when clicking outside of it or on the calendar
    document.addEventListener('click', function(event) {
        if (!dropdownContent.contains(event.target) && event.target !== button) {
            dropdownContent.classList.remove('show');
        }
    });

    // Close the dropdown content after selecting date or time
    function closeDropdown() {
        dropdownContent.classList.remove('show');
    }

    // Function to update the selected date
    function selectDate(day, month, year) {
        selectedDate = `${day} ${month} ${year}`;
        updateButton();
        closeDropdown(); // Close dropdown after selecting date
    }

    // Update the button text based on selected date and time
    function updateButton() {
        const selectedHour = hourSelect.value;
        const selectedMinute = minuteSelect.value;
        const selectedAmPm = amPmSelect.value;
        button.textContent = `${selectedDate} ${selectedHour}:${selectedMinute} ${selectedAmPm}`;
    }

    // Event listeners for hour, minute, and AM/PM selects
    hourSelect.addEventListener('change', updateButton);
    minuteSelect.addEventListener('change', updateButton);
    amPmSelect.addEventListener('change', updateButton);

    // Event delegation for calendar days
    calendar.addEventListener('click', function(event) {
        if (event.target.classList.contains('calendar-day')) {
            const day = event.target.textContent;
            const month = calendar.dataset.month;
            const year = calendar.dataset.year;
            selectDate(day, month, year);
        }
    });

    // Function to create calendar
    function createCalendar(month) {
        calendar.innerHTML = '';

        const monthNames = ["January", "February", "March", "April", "May", "June", 
                            "July", "August", "September", "October", "November", "December"];

        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();

        const navButtons = document.createElement('div');
        navButtons.className = 'nav-buttons';
        const prevButton = document.createElement('button');
        prevButton.textContent = '<';
        prevButton.onclick = () => {
            createCalendar((month - 1 + 12) % 12);
        };
        const nextButton = document.createElement('button');
        nextButton.textContent = '>';
        nextButton.onclick = () => {
            createCalendar((month + 1) % 12);
        };
        const monthLabel = document.createElement('div');
        monthLabel.textContent = `${monthNames[month]} ${currentYear}`;
        navButtons.appendChild(prevButton);
        navButtons.appendChild(monthLabel);
        navButtons.appendChild(nextButton);
        calendar.appendChild(navButtons);

        const headers = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        headers.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'header';
            dayElement.textContent = day;
            calendar.appendChild(dayElement);
        });

        const firstDay = new Date(currentYear, month, 1).getDay();
        const daysInMonth = new Date(currentYear, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            calendar.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';
            dayElement.textContent = day;
            calendar.appendChild(dayElement);
        }

        calendar.dataset.month = monthNames[month];
        calendar.dataset.year = currentYear;
    }

    // Function to populate time selectors
    function populateTimeSelectors() {
        // Populate hour select (1 to 12 for AM/PM format)
        for (let i = 1; i <= 12; i++) {
            const hourOption = document.createElement('option');
            hourOption.value = i;
            hourOption.textContent = i;
            hourSelect.appendChild(hourOption);
        }

        // Populate minute select (00 to 59)
        for (let i = 0; i < 60; i++) {
            const minuteOption = document.createElement('option');
            minuteOption.value = i;
            minuteOption.textContent = i < 10 ? `0${i}` : i;
            minuteSelect.appendChild(minuteOption);
        }
    }

    // Call function to populate time selectors
    populateTimeSelectors();

    // Initialize calendar for current month
    const currentMonth = new Date().getMonth();
    createCalendar(currentMonth);
});

</script>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const minusButton = document.getElementById('minus');
            const plusButton = document.getElementById('plus');
            const ticketCount = document.getElementById('ticket-count');

            minusButton.addEventListener('click', () => {
                let count = parseInt(ticketCount.value);
                if (count > 1) {
                    ticketCount.value = count - 1;
                }
                updateButtons();
            });

            plusButton.addEventListener('click', () => {
                let count = parseInt(ticketCount.value);
                if (count < 30) {
                    ticketCount.value = count + 1;
                }
                updateButtons();
            });

            function updateButtons() {
                let count = parseInt(ticketCount.value);
                minusButton.disabled = count <= 1;
                plusButton.disabled = count >= 30;
            }

            updateButtons();
        });

    </script>






<script>

  function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
  }
  </script>




<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


</body>
</html>




