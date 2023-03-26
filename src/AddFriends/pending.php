<?php
  session_start(); 
   include('../checksession/security.php');
   require "../database/dbconfig.php";
   require "../badges/badges.php"
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
            <circle cx="20" cy="3" r="3" fill="red" stroke="none"/>
          </svg>
        </button>
      </a>

      <a href="../message/">
        <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
          <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
            <circle cx="20" cy="3" r="3" fill="red" stroke="none"/>
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
          <circle cx="20" cy="3" r="3" fill="red" stroke="none"/>
        </svg>
      </button>
      </a>

      <a href="../settings/">
      <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="3"></circle>
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
          <circle cx="20" cy="3" r="3" fill="red" stroke="none"/>
        </svg>
      </button>
      </a>

    </div>
  </div>
  <div class="flex-grow overflow-hidden h-full flex flex-col">
    <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
      <div class="flex h-full text-gray-600 dark:text-gray-400">
        <a href="../AddFriends/" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Add</a>
        <a href="pending.php" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">Pending
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
        <div class="Card-Container">
      <?php
        function getProfilePic($username) {
          $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
          $query = "SELECT profilePic FROM ProfilePics WHERE id = '$username'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          mysqli_close($conn);
          return $row['profilePic'];
        }

        function getUsername($username) {
          $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
          $query = "SELECT Username FROM accounts WHERE id = '$username'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          mysqli_close($conn);
          return $row['Username'];
        }
        
        include('../checksession/security.php');

        // Get the user ID from the session
        $userID = $_SESSION['acc_id'];
        // Get the new code from the POST request
        $newCode = $_POST['newcode'];

        $db_server = "db";
        $db_username= "root";
        $db_password = "root";
        $db_name = "SocialNetwork";

        $connect = mysqli_connect($db_server, $db_username, $db_password, $db_name);

        // Construct the query using the session variable and escape it using mysqli_real_escape_string
        $user_id = mysqli_real_escape_string($connect, $_SESSION['acc_id']);
        $query = "SELECT * FROM `pendingRequests` WHERE `userRecieve` = '$user_id'";
        
        // Execute the query and check if there's an error
        $result = mysqli_query($connect, $query);
        if (!$result) {
            die('Error: ' . mysqli_error($connect));
        }

        // Loop through the results and print them
        while ($row = mysqli_fetch_assoc($result)) {
            $pfp = getProfilePic($row['userSent']);
            $userSent = getUsername($row['userSent']);
            //$_SESSION['ProfilePic'] = $profilePic;
            $profilePic = "../profilePics/{$pfp}";

            echo '<div class="friend-card bg-white rounded-md dark:bg-gray-800 shadow-lg ring-blue-500 focus:outline-none">
                    <div class="pfpImage">
                      <img src='.$profilePic.'>
                    </div>
                    <div>
                      <h2 class="Card-Title">'.$userSent.'</h2>
                    </div>
                    <div class="friendcontrols">
                    <button class="accept-friend dark:friendcard" id="confirm_friend" uid="'.$row['buttonUID'].'">Accept</button>
                    <button class="deny-friend dark:friendcard" id="deny_friend" uid="'.$row['buttonUID'].'">Deny</button>
                    </div>
                  </div>';
            
        }
        

        // Free the result set and close the connection
        mysqli_free_result($result);
        mysqli_close($connect);
        ?>
        
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
<script>
  function logConfirmation() {
  const confirmBtn = document.getElementById("confirm_friend");
  const uid = confirmBtn.getAttribute("uid");
  console.log("Confirm button clicked. UID:", uid);

  const url = `confirm.php?confirm=${uid}`;
  fetch(url, { method: "POST" })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.text();
    })
    .then(responseText => {
      console.log("Confirmation response:", responseText);
    })
    .catch(error => {
      console.error("Error confirming friend:", error);
    });
}

document.getElementById("confirm_friend").addEventListener("click", logConfirmation);


function logDenial() {
  const denyBtn = document.getElementById("deny_friend");
  const uid = denyBtn.getAttribute("uid");
  console.log("Deny button clicked. UID:", uid);
}

document.getElementById("deny_friend").addEventListener("click", logDenial);


</script>