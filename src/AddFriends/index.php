<?php
  session_start(); 
   include('../checksession/security.php');
   require "../database/dbconfig.php";
   require "../badges/badges.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Dashboard UI</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">
  <div class="bg-white dark:bg-gray-900 dark:border-gray-800 w-20 flex-shrink-0 border-r border-gray-200 flex-col hidden sm:flex">
    <div class="h-16 text-blue-500 flex items-center justify-center">
      <svg class="w-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 54 33">
        <path fill="currentColor" fill-rule="evenodd" d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z" clip-rule="evenodd" />
      </svg>
    </div>


    <div class="flex mx-auto flex-grow mt-4 flex-col text-gray-400 space-y-4">
      <a href="../home/">
        <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
          <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
          </svg>
        </button>
      </a>

      <a href="../message/">
        <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
          <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
          </svg>
        </button>
      </a>

      <a href="../AddFriends/">
      <button class="h-10 w-12 dark:bg-gray-700 dark:text-white rounded-md flex items-center justify-center bg-blue-100 text-blue-500">
        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path xmlns="http://www.w3.org/2000/svg" d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
          <circle xmlns="http://www.w3.org/2000/svg" cx="8.5" cy="7" r="4"/>
          <line xmlns="http://www.w3.org/2000/svg" x1="20" y1="10" x2="20" y2="16"/>
          <line xmlns="http://www.w3.org/2000/svg" x1="23" y1="13" x2="17" y2="13"/>
          <?php
              if($pendingRequest == 1){
              echo '<circle cx="20" cy="3" r="3" fill="red" stroke="none"/>';
            }
          ?>
          
        </svg>
      </button>
      </a>

      <a href="../settings/">
      <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="3"></circle>
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
        </svg>
      </button>
      </a>

    </div>
  </div>
  <div class="flex-grow overflow-hidden h-full flex flex-col">
    <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
      <div class="flex h-full text-gray-600 dark:text-gray-400">
        <a href="../AddFriends/" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">Add</a>
        <a href="pending.php" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Pending
          <?php
              if($pendingRequest == 1){
              echo '<svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" >
                      <circle cx="50%" cy="4" r="3" fill="red" stroke="none"/>
                    </svg>';
            }
          ?>
        </a>
      </div>
      <div class="ml-auto flex items-center space-x-7">
        <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500">Upload</button>

        <div class="dropdown">
          <button class="flex items-center">
            <span class="relative flex-shrink-0">
              <img class="w-7 h-7 rounded-full" src="<?php echo $_SESSION['ProfilePic'] ?>" alt="profile" />
              <span class="absolute right-0 -mb-0.5 bottom-0 w-2 h-2 rounded-full bg-green-500 border border-white dark:border-gray-900"></span>
            </span>
            <span class="ml-2"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></span>
            <svg viewBox="0 0 24 24" class="w-4 ml-1 flex-shrink-0" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <div class="dropdown-menu">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-grow flex overflow-x-hidden">
      <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
        <div class="flex flex-col w-full">
          <div class="flex w-full items-center">
            <div class="flex items-center text-3xl text-gray-900 dark:text-white bar-title-nav">
              <h1 class="Bar-Title">Add Friends:</h1>
            </div>
          </div>
        </div>

        <div class="Code-Container border-b border-gray-200 bg-white dark:bg-gray-900 text-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
          <h2 class="container-title">Your User Friend Code is:</h2>
          <div class="verification">
            <span class="code"></span>
            <div class="expire-bar">
              <div class="color-bar"></div>
            </div>
          </div>
          <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500 container-button" id="enterCode">Enter a Code</button>
          <p class="container-text">Give this code to a friend or scan the QR-Code below, within the next 60 seconds to add them as a friend. </p>
          <div class="generated-code">
            <div id="qrcode"></div>
          </div>
          <div class="popup-container" id="popupContainer">
            <div class="popup rounded-md bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600">
              <button class="popup-closebtn" id="popup-closebtn">&times;</button> 
              <h2 class="popup-text text-gray-900 dark:text-white">Enter a code:</h2>
              <input type="text" class='text-white'id="codeInput" pattern="[a-zA-Z0-9]+" maxlength="8" />
              <button id="submitBtn" class="h-8 px-3 rounded-md shadow text-white bg-blue-500 popup-button">Submit</button>
            </div>
          </div>
          <div id="notification-popup" class="rounded-md bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600">
            <div class="notification-popup-content">
              <img class="notification-profile-pic" src="" alt="User Profile Picture">
              <span class="notification-user-name"></span> added.
            </div>
          </div>

            <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src='//cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js'></script>
            <script>
            function genRandonString(length) {
              var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
              var charLength = chars.length;
              var result = '';
              for ( var i = 0; i < length; i++ ) {
                  result += chars.charAt(Math.floor(Math.random() * charLength));
              }
              return result;
            }

            /*
              Just a shorthand method for document.querySelector.
            */
            function qs(s) {
              return document.querySelector(s);
            }

            var expirationTimeInMilliseconds = 60 * 1000;

            var verification = qs(".verification"),
                verificationCode = qs(".verification .code");


            var qrcode = new QRCode("qrcode");
            function makeCode (code) {		
              qrcode.makeCode(code);
            }

            function showNewVerificationCode() {
              var nextCode = genRandonString(8);
              makeCode(nextCode);
              verification.classList.remove("running");
              verificationCode.innerHTML = nextCode;
              // Magically restarts the animation.
              verification.offsetWidth = verification.offsetWidth;
              verification.classList.add("running");
              
              $.ajax({
                type: "POST",
                url: "code.php",
                data: { newcode: nextCode },
                success: function(response) {
                  // handle success response

                },
                error: function(xhr, status, error) {
                  // handle error response
                }
              });

              setTimeout(showNewVerificationCode, expirationTimeInMilliseconds);
            }
            
            showNewVerificationCode();
              

            

            const enterCodeBtn = document.getElementById("enterCode");
            const popupContainer = document.getElementById("popupContainer");
            const codeInput = document.getElementById("codeInput");
            const submitBtn = document.getElementById("submitBtn");
            const close = document.getElementById("popup-closebtn");

            // Show popup when button is clicked
            enterCodeBtn.addEventListener("click", function () {
              popupContainer.style.display = "block";
            });

            // Hide popup when submit button is clicked
            submitBtn.addEventListener("click", function () {
              const code = codeInput.value;
              console.log(`Entered code: ${code}`);

              $.ajax({
                type: "POST",
                url: "add.php",
                data: { addCode: code },
                success: function(response) {
                  // handle success response
                  jsonResponse = JSON.parse(response)
                  console.log(jsonResponse.profilePic)
                  // Assume that the JSON response is stored in a variable called `response`

                  // Get the notification popup container and its content
                  const notificationPopup = document.getElementById('notification-popup');
                  const notificationPopupContent = notificationPopup.querySelector('.notification-popup-content');

                  // Get the user's name and profile picture from the response
                  const userName = jsonResponse.added;
                  const profilePic = jsonResponse.profilePic;

                  // Set the user's name and profile picture in the notification popup content
                  notificationPopup.querySelector('.notification-user-name').textContent = userName;
                  notificationPopup.querySelector('.notification-profile-pic').src = `../profilepics/${profilePic}`;

                  // Show the notification popup
                  notificationPopup.style.display = 'block';

                  // Hide the notification popup after 3 seconds
                  setTimeout(() => {
                    notificationPopup.style.display = 'none';
                  }, 3000);
                },
                error: function(xhr, status, error) {
                  // handle error response
                  console.log("error")
                }
              });

              codeInput.value = ""
            });

            close.addEventListener("click", function () {
              console.log(`Closed`);
              codeInput.value = ""
              popupContainer.style.display = "none";
            });

            codeInput.addEventListener("input", function() {
              var regex = /[^a-zA-Z0-9]/g;
              codeInput.value = codeInput.value.replace(regex, "");
            });
            
          </script>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
