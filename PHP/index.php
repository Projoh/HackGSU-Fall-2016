<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Public Message Board</title>
      <meta name="theme-color" content="#0288d1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
      <link rel="stylesheet" href="style.css">
   </head>
   <main>
      <body class="blue-grey">
         <div class="container">
            <h3> Public Board </h3>
            <div class="row">
               <div class="col s12">
                  <div class="col s12">
                     <div class="card hoverable indigo darken-3">
                        <div class="card-content white-text">
                           <div class="row">
                              <div class="input-field col s12">
                                  <form action="api.php" method="post" id="messageform">
                                 <textarea id="messageboxtext" name="messageboxtext" class="materialize-textarea" style="font-size: 44pt"> </textarea>
                                 <label for="textarea1">Message</label></form>
                              </div>
                           </div>
                        </div>
                        <div class="btn right-align large red darken-4">
                           <a class="white-text" href="#" onClick="moveFunction()">SUBMIT
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>

            <br>
            <div class="newMessage" id="newMessage"></div>
            <?php
               $i = 0;
               $post_ARRAY = array();
               $filename = 'sub.txt';
              //  $person = 'LOREUM PEOSRUM MESSAGE YES!' . "\n";

               // Write the contents to the file,
               // using the FILE_APPEND flag to append the content to the end of the file
               // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
              //  file_put_contents($filename, $person, FILE_APPEND | LOCK_EX);



               $myfile = fopen($filename, "r");

               while(!feof($myfile)) {
                   // echo fgets($myfile) . "<br>";
                   $post_ARRAY[] = fgets($myfile);
               }
               fclose($myfile);


               $postFinal = array_reverse($post_ARRAY);
               foreach($postFinal as $item):
                 // echo $item . "<br>";
                 if($item != "") {
                   echo "<div class=\"row\">\n";
                   echo "        <div class=\"col s12\">\n";
                   echo "          <div class=\"card hoverable  blue-grey darken-1\">\n";
                   echo "            <div class=\"card-content white-text\">\n";
                   echo "              <span class=\"card-title\">" . $item . "</span>\n";
                   echo "            </div>\n";
                   echo "            <div class=\"card-action hoverable offset-s10 col s2\">\n";
                   echo "              <a class=\"black-text bold\" href=\"#\">REPORT</a>\n";
                   echo "            </div>\n";
                   echo "          </div>\n";
                   echo "        </div>\n";
                   echo "        </div>\n";


                 }






               endforeach;


               ?>
         </div>
         </div>
         <div id="ajaxDiv"> </div>
      </body>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
   <script type="text/javascript">
   function moveFunction() {
    //  var message = document.getElementById('messageform').submit();
    //  self.location='api.php?runFunction=submitMessage';

    var url = "api.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#messageform").serialize(), // serializes the form's elements.
           success: function(data)
           {
              // IMPLEMENT METHOD FOR ANAYLZING THE MESSAGE
              if(data < 21) {
                fadeNewMessage();
              } else {
                 Materialize.toast("That message looks a lot like harassment. There's a person on the other side of that screen!", 4000)
              }
           }
         });

    return false;
   }



   var element = document.getElementById("newMessage");
function fadeNewMessage() {

var strVar="";
strVar += "<div class=\"row\">";
strVar += "        <div class=\"col s12\">";
strVar += "          <div class=\"card hoverable  blue-grey darken-1\">";
strVar += "            <div class=\"card-content white-text\">";
strVar += "              <span class=\"card-title\">";
strVar +=  $('#messageboxtext').val();
strVar += "<\/span>";
strVar += "            <\/div>";
strVar += "            <div class=\"card-action hoverable offset-s10 col s2\">";
strVar += "              <a class=\"black-text bold\" href=\"#\">REPORT<\/a>";
strVar += "            <\/div>";
strVar += "          <\/div>";
strVar += "        <\/div>";
  $(strVar).hide().appendTo("#newMessage").fadeIn(1000);
}

   </script>
</html>
