<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="post.css">
    </head>
    <body>
        <header>
            <a href="#" class="logo">The Lair</a>
            
            <svg height="32px" id="menu-btn" class="open" viewBox="0 0 32 32">
                <path fill="white" d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
            </svg>
            
            <nav id="nav">
                <svg viewBox="0 0 24 24" id="exit-btn" class="exit">
                    <path id="exit" fill="white" d="M14.8,12l3.6-3.6c0.8-0.8,0.8-2,0-2.8c-0.8-0.8-2-0.8-2.8,0L12,9.2L8.4,5.6c-0.8-0.8-2-0.8-2.8,0   c-0.8,0.8-0.8,2,0,2.8L9.2,12l-3.6,3.6c-0.8,0.8-0.8,2,0,2.8C6,18.8,6.5,19,7,19s1-0.2,1.4-0.6l3.6-3.6l3.6,3.6   C16,18.8,16.5,19,17,19s1-0.2,1.4-0.6c0.8-0.8,0.8-2,0-2.8L14.8,12z" />
                </svg>
                
                <ul>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Categories</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            
        </header>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";
        // Create connection

        if(isset($_GET['id']))
        {
            $conn = mysqli_connect($servername, $username, $password,$dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
        
        $sql = "SELECT title,Date,summary,content FROM posts WHERE id=?";
          $result = $conn->prepare($sql);
          $result->bind_param('i',$_GET['id']);
          $result->execute();
          $res = $result->get_result();
          if ($res->num_rows > 0) {
            // output data of each row
            $row =$res->fetch_assoc() ;
            echo (
                "<article id='post-area'>
                <article id ='post-header'>
                    <h1>" . $row['title'] . "</h1>
                        <p class='date'>
                            <i><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M18 4H6a4 4 0 0 0-4 4v10a4 4 0 0 0 4 4h12a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4ZM2 10h20M8 2v4-4Zm8 0v4-4Z' stroke='#F8F8F8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                              </svg>
                            </i>
                            <span>". $row['Date'] ."</span>
                        </p>    
                          
                        <p>
                            " . $row['summary'] . "
                        </p>
    
                </article>
                <article id = 'post-content'>
                    ". $row['content'] ."
                </article>
            </article>"
            );
                
                
          } else {
            echo "0 results";
          }
          $conn->close();
        }
        else{

        echo "ça marche pas";
        }
        ?>

        <script src="index.js"></script>
    </body>
</html>