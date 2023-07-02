<?php
session_start();
include "../checksession/security.php";
require "../database/dbconfig.php";
require "../database/createusertables.php";
require "../badges/badges.php";
?>
<?php
function getProfilePic($username)
{
    $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
    $query = "SELECT profilePic FROM ProfilePics WHERE id = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row["profilePic"];
}
$username = $_SESSION["acc_id"];
$pfp = getProfilePic($username); //$_SESSION['ProfilePic'] = $profilePic;
$profilePic = "../profilePics/{$pfp}";
$_SESSION["ProfilePic"] = $profilePic;
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
<div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm blur-container">
  <div class="bg-white dark:bg-gray-900 dark:border-gray-800 w-20 flex-shrink-0 border-r border-gray-200 flex-col hidden sm:flex">
    <div class="h-16 text-blue-500 flex items-center justify-center">
      <svg class="w-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 54 33">
        <path fill="currentColor" fill-rule="evenodd" d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z" clip-rule="evenodd" />
      </svg>
    </div>


    <div class="flex mx-auto flex-grow mt-4 flex-col text-gray-400 space-y-4">
      <a href="../home/">
        <button class="h-10 w-12 dark:bg-gray-700  rounded-md flex items-center justify-center bg-blue-100 text-blue-500">
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
      <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path xmlns="http://www.w3.org/2000/svg" d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
          <circle xmlns="http://www.w3.org/2000/svg" cx="8.5" cy="7" r="4"/>
          <line xmlns="http://www.w3.org/2000/svg" x1="20" y1="10" x2="20" y2="16"/>
          <line xmlns="http://www.w3.org/2000/svg" x1="23" y1="13" x2="17" y2="13"/>
          <?php if ($pendingRequest == 1) {
              echo '<circle cx="20" cy="3" r="3" fill="red" stroke="none"/>';
          } ?>
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
        <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">Home</a>
        <a href="#" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Friends</a>

      </div>
      <div class="ml-auto flex items-center space-x-7">
        <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" id="Uploadimg">Upload</button>

        <div class="dropdown">
          <button class="flex items-center">
            <span class="relative flex-shrink-0">
              <img class="w-7 h-7 rounded-full" src="<?php echo $_SESSION[
                  "ProfilePic"
              ]; ?>" alt="profile" />
              <span class="absolute right-0 -mb-0.5 bottom-0 w-2 h-2 rounded-full bg-green-500 border border-white dark:border-gray-900"></span>
            </span>
            <span class="ml-2"><?php echo htmlspecialchars(
                $_SESSION["username"],
                ENT_QUOTES,
                "UTF-8"
            ); ?></span>
            <svg viewBox="0 0 24 24" class="w-4 ml-1 flex-shrink-0" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          
        </div>
      </div>
    </div>
    <div class="flex-grow flex overflow-x-hidden">
      <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
        <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
          <div class="flex w-full items-center">
              <div class="flex items-center text-3xl text-gray-900 dark:text-white story-icon-container">
              
              <?php // Gets the list of friends of the logged in user // database connection information


              $servername = "db";
              $username = "root";
              $password = "root";
              $dbname = "Users";
              // create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              } // get the sanitized session id
              $table_name = $_SESSION["acc_id"];
              // prepare and execute query
              $sql = "SELECT * FROM `{$_SESSION["acc_id"]}-stories` ORDER BY `HasStory` DESC";
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
                      $conn = new mysqli(
                          $servername,
                          $username,
                          $password,
                          $dbname
                      );
                      // check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }
                      $sql =
                          "SELECT username FROM accounts WHERE id = " .
                          $row["FriendID"];
                      $result = $conn->query($sql);
                      $data = mysqli_fetch_assoc($result);
                      $username = $data["username"];

                      //SQL To Get Profile pic
                      $sql =
                          "SELECT profilePic FROM ProfilePics WHERE id = " .
                          $row["FriendID"];
                      $result = $conn->query($sql);
                      $data = mysqli_fetch_assoc($result);
                      $profilepic = $data["profilePic"];
                      echo '<div class="story-image-container"> 
                                  <div class="img-circle">
                                    <img src="/profilepics/' .
                          $profilepic .
                          '" alt="" class="border-white-image-border dark:border-dark-image-border">
                                  </div>  
                                  <p class="flex text-sm justify-center">' .
                          $username .
                          '</p>
                                </div>                      
                                ';
                  }
              } else {
                  echo "Add Friends For Stories to Show";
              }
              // close connection
              $conn->close();
              ?>
            </div>
            
          
        </div>
        <div class="sm:p-7 p-4">
          <div class="flex w-full items-center mb-7">
            <select class="inline-flex mr-3 items-center h-8 pl-2.5 pr-2 rounded-md shadow text-gray-700 dark:text-gray-400 dark:border-gray-800 border border-gray-200 bg-white dark:bg-gray-900">
              
              <option value="0">Last 24 Hours:</option>
              <option value="1">Last 7 Days:</option>
              <option value="2">Last 30 Days:</option>
            </select>
            <select class="inline-flex mr-3 items-center h-8 pl-2.5 pr-2 rounded-md shadow text-gray-700 dark:text-gray-400 dark:border-gray-800 border border-gray-200 bg-white dark:bg-gray-900">
              <option value="0">Most Recent:</option>
              <option value="1">Oldest:</option>
            </select>
            <div class="ml-auto text-gray-500 text-xs sm:inline-flex hidden items-center">
              <span class="mr-3">Page 1 of 4</span>
              <button class="inline-flex mr-2 items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none py-0">
                <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
              </button>
              <button class="inline-flex items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none py-0">
                <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </button>
            </div>
          </div>
          
          <div class="flex w-full mt-5 space-x-2 justify-end">
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">
              <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
              </svg>
            </button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">1</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white leading-none">2</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">3</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">4</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">
              <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Image Editor -->

<div class="upload-box-section bg-gray-300 dark:bg-gray-800 dark:text-white text-gray-600" id="img-upload-popup">
  <span class="close-btn" id="close-btn">&times</span>

  <div class="Post-container">
    <h4 class="dark:text-white text-gray-600 upload-table">Add New Post</h4>
      <hr class="title-line dark:title-line">
      <form class="upload-form" action="" method="post" id="form" enctype="multipart/form-data">

        <h3 class="text-blue-500 dark:text-white">Post Title:</h3>
        <input type="text" class="form-control rounded-md bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600" id="title" name="title">


       <h3 class="text-blue-500 dark:text-white">Description</h3>
        <textarea type="text" class="form-control form-text-area" id="description" name="description" rows="5"></textarea>

      
              <h3 class="text-blue-500 dark:text-white">Upload Photos</h3>
              <div class="uploader-container dark:uploader-container-dark">
                  <input type="file" id="photo" class="imageinputnone" accept="image/jpeg,image/png" name="photo[]" multiple>
                  <div class="uploader">
                      <div class="uploader-btn dark:uploader-btn">
                        <svg width="30px" height="30px" viewBox="0 0 1024.00 1024.00" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#a1a1aa"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M621.7 365.8V439h219.5v365.7H182.9V439h219.4v-73.2H109.7v512h804.6v-512z" fill="#a1a1aa"></path><path d="M475.4 280.4v341.4h73.2V280.4l47.3 47.2 51.7-51.7L512 140.4 376.4 275.9l51.8 51.7z" fill="#a1a1aa"></path></g></svg>
                      </div>
                      <div class="photo-show flex-grow-1"></div>
                  </div>
              </div>
              <div class="Upload_btn_wrapper">
                <button class="upload-btn h-8 px-3 rounded-md shadow text-white bg-blue-500"><i class="fa fa-upload"></i>Upload</button>
              </div>
          </div>
          
      </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script>
//to save upload file
    let store = [];

    //delete temp uploaded photo
    function del(x) {
        store.splice(x,1);
        showPhoto();
    }

    //to show file upload
    $(".uploader-btn").click(function () {
        $("#photo").click();
    });

    //show photo list
    function showPhoto(){
        let output = $(".photo-show");
        output.empty();

       for(let x in store){
            let reader = new FileReader();
            reader.onload = function(){
                let dataURL = reader.result;
               output.append(`
               <div class="photo-to-upload">
                <img class="temp-photo" src="${dataURL}" >
                <button class="btn btn-danger btn-sm position-absolute" onclick="del(${x})" style="bottom: 5px;right: 5px">
                    <i class="fa fa-trash"></i>
                </button>
               </div>
               `);
            };
            reader.readAsDataURL(store[x]);
        }
    }

    //add store record
    $("#photo").on("change",function (e) {
        let file = e.target.files;
        for(let x in file){
            if(x != "length" && x < file.length){
                store.push(file[x]);
            }
        }
        showPhoto();
    });

    //upload form
    $("#form").on("submit",function (e) {
        e.preventDefault();
        let upload = $(".upload");
        let uploadBtnData = upload.html();
        upload.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`);
        let form =$(this)[0];
        let formData = new FormData(form);
        let to = $(this).attr("action");

        store.map(function (el) {
            formData.append("store[]",el,el.name);
        });

        formData.delete("photo[]");

        $.ajax({
            method:"post",
            url:to,
            data:formData,
            contentType:false,
            processData: false,
            success:function (data) {
                let result = JSON.parse(data);
                console.log(result);
                if(result.status == 200){
                    $("input,textarea").val("");
                    store = [];
                    showPhoto();
                    upload.html(uploadBtnData);
                }
            }
        });

    });
</script>

<script>
  let popup = document.getElementById("img-upload-popup");
  let openBtn = document.getElementById("Uploadimg");
  let closeBtn = document.getElementById("close-btn");

  function openPopup(event) {
    event.stopPropagation(); // Prevent the click event from propagating
    popup.style.display = "block";
    popup.classList.remove("popup-fade-out");
    popup.classList.add("popup-fade-in");
    document.addEventListener("click", closePopup);
  }

  function closePopup(event) {
    // Check if the clicked element is not the openBtn button or the popup
    if (!popup.contains(event.target) && event.target !== openBtn) {
      popup.classList.remove("popup-fade-in");
      popup.classList.add("popup-fade-out");
      document.removeEventListener("click", closePopup);
      // Wait for the animation to end before hiding the popup
      setTimeout(() => {
        popup.style.display = "none";
      }, 200);
    }
  }

  openBtn.addEventListener("click", openPopup);
  closeBtn.addEventListener("click", function(event) {
    event.stopPropagation(); // Prevent the click event from propagating
    popup.classList.remove("popup-fade-in");
    popup.classList.add("popup-fade-out");
    document.removeEventListener("click", closePopup);
    // Wait for the animation to end before hiding the popup
    setTimeout(() => {
      popup.style.display = "none";
    }, 200);
  });


</script>

</body>
</html>
