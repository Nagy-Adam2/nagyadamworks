<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic meta settings -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="english" />
    <meta name="author" content="Adam Nagy" />
    <meta name="made" content="info@nagyadamworks.com" />
    <meta name="date" content="2018.11.24." />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="audience" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Title -->
    <title>Subscribe</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="../css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Subscribe -->
    <section class="page-subscribe-section subscribe-section bg-primary sizeCover" id="subscribe">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 subscribe-form">
          <div class="col-md-10 col-lg-8 mx-auto newsletter-form">
            <h2 class="text-white text-center mb-3">Subscribe to the newsletter!</h2>
            <p class="text-white text-center mb-2">Subscribe to the newsletter to receive similar content news.</p>
            <form class="form-subscribe" id="contactForm">
              <!-- Error message -->
              <div id="errorMessage"></div>
              <!-- Fullname address input -->
              <div class="row input-group-newsletter mb-4">
                <div class="col"><input class="form-control" id="fullname" type="text" minlength="8" maxlength="40" placeholder="Enter full name..." aria-label="Enter full name..." /></div>
              </div>
              <!-- Email address input -->
              <div class="row input-group-newsletter mb-4">
                <div class="col"><input class="form-control" id="emailAddress" type="email" minlength="8" maxlength="40" placeholder="Enter email address..." aria-label="Enter email address..." /></div>
              </div>
              <!-- Checkbox input -->
              <div class="row input-group-newsletter mb-4">
                <div class="col">
                  <input class="checkbox" id="tac" type="checkbox">
                  <label class="label-tac px-2" for="tac">
                    <p class="lead text-white">I accept the <a class="subscribe" href="../privacy-policy/privacy-policy.php" target="_blank">terms and conditions</a>.</p>
                  </label>
                </div>
              </div>
              <!-- Subscibe button -->
              <div class="row input-group-newsletter justify-content-center">
                <div class="col-auto"><button class="btn btn-primary btn-min-width" id="submitButton" type="button"></button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Javascript -->
    <script type="module">

      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";
      // TODO: Add SDKs for Firebase products that you want to use
      // https://firebase.google.com/docs/web/setup#available-libraries


      //---------------------------Firebase configuration-----------------------------------------------

      const firebaseApp = {
        apiKey: "AIzaSyBdCLvBSQ_ctBBmI3ELruZYLc_pISJBBz0",
        authDomain: "awesome-landing-page-na.firebaseapp.com",
        databaseURL: "https://awesome-landing-page-na-default-rtdb.europe-west1.firebasedatabase.app/",
        projectId: "awesome-landing-page-na",
        storageBucket: "awesome-landing-page-na.appspot.com",
        messagingSenderId: "636896420933",
        appId: "1:636896420933:web:1dc8552b1999dc85302f2c"
      };
     

      // Initialize Firebase
      const app= initializeApp(firebaseApp);

      import {getDatabase, ref, set}
      from "https://www.gstatic.com/firebasejs/9.14.0/firebase-database.js";

      const base = getDatabase();


      //---------------------------Reference--------------------------------------------------------------

      let fullname = document.getElementById("fullname");
      let email =  document.getElementById("emailAddress");
    
      let button = document.getElementById("submitButton");
      let error = document.getElementById("errorMessage");


      //--------------------------DISABLED BUTTON FUCTION------------------------------------------------

      button.disabled = true;
      button.innerHTML = 'I am please fill in the fields!'
      error.innerHTML = '<p class="base">Base.</p>';

      email.addEventListener("keyup", stateHandle);

      function stateHandle() {
        if (fullname.value === '' && email.value === '') {
          button.disabled = true;
        } else {
          button.disabled = false;
          button.innerHTML = 'Subscription';
          button.classList.add('activeButton');
        }
      }

      function disabledButton() {

        validationButton();

      }


      //--------------------------VALIDATION BUTTON FUCTION---------------------------------------------

      function validationButton() {    

        const fullname = document.querySelector('#fullname').value.trim();
        const email =  document.querySelector('#emailAddress').value.trim();
        const tac = document.querySelector('#tac').checked;
        const error = document.querySelector('#errorMessage');

        if(!fullname || !(fullname.indexOf(' ') > 0)) {

          error.innerHTML = '<p class="red">Entering your full name is mandatory!</p>';

        } else if (fullname.length < 8) {

          error.innerHTML = '<p class="red">Name cannot be less than eight characters!</p>';

        } else if (fullname.length >= 40) {

          error.innerHTML = '<p class="red">Name cannot be longer than forty characters!</p>';

        } else if (!email || !(email.indexOf('@') > 0) || !(email.indexOf('.') > 0)) {

          error.innerHTML = '<p class="red">Invalid e-mail address!</p>';

        } else if (email.length < 8) {

          error.innerHTML = '<p class="red">Email cannot be smaller than eight characters!</p>';

        } else if (email.length >= 40) {

          error.innerHTML = '<p class="red">Email cannot be longer than forty characters!</p>';

        } else if (tac === false) {

          error.innerHTML = '<p class="red">Please accept the privacy policy!</p>';

        } else {

          error.innerHTML = '<p class="green">Köszönöm a felíratkozást.</p>';

          let timeoutError;
          timeoutError = setTimeout(basisError, 4000);

          let timeoutData;
          timeoutData = setTimeout(InsertData, 4000);

        }

      }


      //-------------------------BASIS BUTTON FUNCTION----------------------------------------------------

      function basisError() {
        error.innerHTML = '';
      }


      //-------------------------INSERT DATA FUNCTION-----------------------------------------------------

      function InsertData() {
        set(ref(base, "NagyAdamWorksPageEng/"+fullname.value),{
          FullName: fullname.value,
          Email: email.value
        })
        .then(()=>{
          resetForm();
        })
        .then(()=>{  
          locationHref();
        })
        .catch((error)=>{
          alert("unsuccessful, error"+error);
        });
      }

      function resetForm() {

        fullname.value = '';
        email.value = '';
        tac.checked = false;
        error.innerHTML = '<p class="base">Base.</p>';

      }

      function locationHref() {

        location.href='subscribe.php';

      }


      //-----------------------Assign Events To Btns------------------------------------------------------

      button.addEventListener('click', disabledButton);


    </script>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
  </body>
</html>
