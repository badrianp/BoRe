<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BoRe</title>
        <link rel="stylesheet" href="../css/home2.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    </head>

    <body>
        
        <div id="meniuBar" class="meniuBar">

            <div class="tooltipButton">
                <button id="home" class="meniuBtn"><img class="buttonImage" src="../images/home.png"></button>
                <spam class="tooltipInfo">Home</spam>
            </div>

            <input type="search" id="searchBar" class="searchBar" placeholder="search here...">
            
            <div class="meniuDiv">

                <div class="tooltipButton">
                    <button id="groups" class="meniuBtn"><img class="buttonImage" src="../images/group.png"></button>
                    <spam class="tooltipInfo">My Groups</spam>
                </div>

                <div class="tooltipButton">
                    <button id="mybooks" class="meniuBtn" onclick="window.location.href='../php/MyBooks.php';"><img class="buttonImage" src="../images/book.png"></button>
                    <spam class="tooltipInfo">My Books</spam>
                </div>

                <div class="tooltipButton">
                    <button id="notifications" class="meniuBtn"><img class="buttonImage" src="../images/notification.png"></button>
                    <spam class="tooltipInfo">Notifications</spam>
                </div>

                <div class="tooltipButton">
                    <button id="profile" class="meniuBtn" onclick="window.location.href='../php/Profile.php';" ><img class="buttonImage" src="../images/user (1).png"></button>
                    <spam class="tooltipInfo">Profile</spam>
                </div>
                
            </div>
                
        </div>

        <div class="postCards" id="postCards">
            <!-- books from script -->
        </div>

    </body>

<!-- echo:::    $payload = file_get_contents('php://input'); -->
<!-- $payload = file_get_contents('php://input'); -->

    <script>

        (function showAll() {
            
            var result = "nothing yet..";
            var xmlhttp = new XMLHttpRequest();
            var lastStatusOK = 0;
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    lastStatusOK = 1;
                    result = JSON.parse(this.responseText);
                    // document.getElementById("postCards").innerHTML = this.responseText;
                    showBooks(result);
                } else {
                    // alert (this.readyState + " :/ " + this.status + " :/ " + this.statusText);
                }
            }
            xmlhttp.open("GET", "../php/showBooks.php", true);
            xmlhttp.send();

        })();

        // result = xmlhttp.responseText;

        // alert (lastStatusOK);
        
        function showBooks(response){

            var bookDetails = response;
            var i=0;
            while (i < bookDetails.length) {

                var postCard = document.createElement("div");
                postCard.id = "postCard";
                postCard.className = "postCard";
                var postCardImage = document.createElement("img");
                postCardImage.id = "postCardImage";
                postCardImage.className = "postCard";
                var postCardContent = document.createElement("div");
                postCardContent.id = "postCardContent";
                postCardContent.className = "postCard";
                var titluautorbuton = document.createElement("div");
                titluautorbuton.id = "titluautorbuton";
                var titluAutor = document.createElement("div");
                titluAutor.className = "titluAutor";
                var titlu = document.createElement("p");
                titlu.id = "titlu";
                var autor = document.createElement("p");
                autor.id = "autor";
                var gen = document.createElement("p");
                gen.id = "gen";
                var descriereDiv = document.createElement("div");
                descriereDiv.id = "descriereDiv";
                var descriere = document.createElement("p");
                descriere.className = "descriere";
                var addBook = document.createElement("button");
                addBook.type = "button";
                addBook.id = "addBook";
                var addBookIcon = document.createElement("img");
                addBookIcon.id = "addBookIcon";
                addBookIcon.src = "../images/reading.png";

                var imagineCarte = bookDetails[i]["imagine"];
                var descriereCarte = bookDetails[i]["descriere"];
                var genCarte = bookDetails[i]["gen"];
                var autorCarte = bookDetails[i]["autor"];
                var titluCarte = bookDetails[i]["titlu"];
                var idCarte = bookDetails[i]["bookID"];

                postCardImage.src = "../images/"+imagineCarte;
                titlu.innerHTML = titluCarte;
                autor.innerHTML = autorCarte;
                gen.innerHTML = genCarte;
                descriere.innerHTML = descriereCarte;

                titluAutor.appendChild(titlu);
                titluAutor.appendChild(autor);
                titluAutor.appendChild(gen);
                titluautorbuton.appendChild(titluAutor);
                descriereDiv.appendChild(descriere);
                postCardContent.appendChild(titluautorbuton);
                postCardContent.appendChild(descriereDiv);
                addBook.appendChild(addBookIcon);
                postCard.appendChild(postCardImage);
                postCard.appendChild(postCardContent);
                postCard.appendChild(addBook);

                document.getElementById("postCards").appendChild(postCard);

                i++;
            }
        }     
        


        document.getElementById("addBook").addEventListener("click", addBook());

        function addBook() {
            alert ("clicked!");
        }

    </script>

</html>