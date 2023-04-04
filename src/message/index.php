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
        <button class="h-10 w-12 dark:bg-gray-700 dark:text-white rounded-md flex items-center justify-center bg-blue-100 text-blue-500">
          <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
            <circle cx="20" cy="3" r="3" fill="red" stroke="none"/>
          </svg>
        </button>
      </a>

      <a href="../AddFriends/">
      <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
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
          <circle cx="20" cy="3" r="3" fill="red" stroke="none"/>
        </svg>
      </button>
      </a>

    </div>
  </div>
  <div class="flex-grow overflow-hidden h-full flex flex-col">
  <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
      <div class="flex h-full text-gray-600 dark:text-gray-400">
        <a href="#" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Company</a>
        <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">Users</a>
        <a href="#" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Expense Centres</a>
        <a href="#" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center">Currency Exchange</a>
      </div>
      <div class="ml-auto flex items-center space-x-7">
        <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500">Upload</button>

        <div class="dropdown">
          <button class="flex items-center">
            <span class="relative flex-shrink-0">
              <img class="w-7 h-7 rounded-full" src="../profilePics/<?php echo $_SESSION['ProfilePic'] ?>" alt="profile" />
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
      <div class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden p-5">
        <div class="text-xs text-gray-400 tracking-wider">USERS</div>
        <div class="relative mt-2">
          <input type="text" class="pl-8 h-9 bg-transparent border border-gray-300 dark:border-gray-700 dark:text-white w-full rounded-md text-sm" placeholder="Search" />
          <svg viewBox="0 0 24 24" class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </div>
        <div class="space-y-4 mt-3">
          <?php
          // Gets the list of friends of the logged in user

            // database connection information
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "Friends";

            // create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // get the sanitized session id
            $table_name =$_SESSION['acc_id'];
            // prepare and execute query
            $sql = "SELECT * FROM `$table_name` WHERE FriendID IS NOT NULL";
            $result = $conn->query($sql);

            // handle query result
            if ($result->num_rows > 0) {
                foreach ($result as $row) {

                    // SQL to get friend name
                    // database connection information
                    $servername = "db";
                    $username = "root";
                    $password = "root";
                    $dbname = "SocialNetwork";

                     // create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT username FROM accounts WHERE id = ".$row['FriendID'];
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_assoc($result);
                    $username = $data['username'];
                     


                    //SQL To Get Profile pic

                    $sql = "SELECT profilePic FROM ProfilePics WHERE id = ".$row['FriendID'];
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_assoc($result);
                    $profilepic = $data['profilePic'];

                    echo '<a class="bg-white p-3 w-full flex flex-col rounded-md dark:bg-gray-800 shadow" href="?user='.$username.'">
                            <div class="flex xl flex items-center font-medium text-gray-900 dark:text-white w-full">
                              <img src="../profilepics/'.$profilepic.'" class="w-7 h-7 mr-2 rounded-full" alt="profile" />
                              '.$username.'
                            </div>
                          </a>';


                }
            } else {
                echo "No results found.";
            }

            // close connection
            $conn->close();

          ?>
        </div>
      </div>

      
      <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto message-box-aera">
        <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
          <div class="flex w-full items-center mb-7">
            <div class="flex items-center text-3xl text-gray-900 dark:text-white">
            <?php
              //sanatises to prevent XSS
              $user = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_STRING);
              if($user==null){
                die;
              }
              // SQL to get friend name
              // database connection information
              $servername = "db";
              $username = "root";
              $password = "root";
              $dbname = "SocialNetwork";
      
              // create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
      
              // check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
      
              $sql = "SELECT id FROM accounts WHERE username = '".$user."'";
              $result = $conn->query($sql);
              $data = mysqli_fetch_assoc($result);
              $id = $data['id'];
              
      
      
              //SQL To Get Profile pic
      
              $sql = "SELECT profilePic FROM ProfilePics WHERE id = '".$id."'";
              $result = $conn->query($sql);
              $data = mysqli_fetch_assoc($result);
              $profilepic = $data['profilePic'];

              echo '<img src="../profilepics/'.$profilepic.'" class="w-12 mr-4 rounded-full" alt="profile" />
                    '.$user.'';
            ?>
              
            </div>
            <div class="ml-auto sm:flex hidden items-center justify-end">
              <button class="w-8 h-8 ml-4 text-gray-400 shadow dark:text-gray-400 rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-700">
                <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="1"></circle>
                  <circle cx="19" cy="12" r="1"></circle>
                  <circle cx="5" cy="12" r="1"></circle>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="InputTextMessage">
          <input type="text" class="messageInput dark:bg-gray-700" name="messageInput" id="messageInput">
          <button type="submit" class="messageSend dark:bg-gray-700 dark:text-white rounded-md flex items-center justify-center bg-blue-500" id="messageSend">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
