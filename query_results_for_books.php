    <!-- Program to query a database and send results to the client. -->    
<html>
    <head>
        <title>Search Results</title>
        <link rel="stylesheet" href="../book_website/stlyes.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv=""X-UA-Compatible content="ie=edge">
    </head>
    
    <body>
        <section>
            <div class="blue">
                <div class="header">
                    <a href="../book_website/books.php"><p class="title">It's Legit Books</p></a> 
                    <div class="nav">
                        <ul>
                            <li> <a href="../book_website/books.php">Home</a> </li>                            
                            <li>  <a href="../book_website/nav_pages/sale.php">Sale</a> </li>
                            <li>  <a href="../book_website/nav_pages/top_seller.php">Top Seller</a> </li>
                            <li>  <a href="../book_website/nav_pages/fiction.php">Fiction</a> </li>
                            <li>  <a href="../book_website/nav_pages/manga.php">Manga</a> </li>
                            <li>  <a href="../book_website/nav_pages/coming_soon.php">Coming Soon</a> </li>
                        </ul>
                    </div>
                    <div>
                        <li>  <a href="../nav_pages/cart.php"><img src="../elements/ph_shopping-cart-thin.png" height="25" class="cart"></a> </li>
                    </div>  
                </div>
            </div>
        </section>
   
      <body>		 
		 <?php
		 
			extract( $_POST );
			$con = mysqli_connect("localhost", "root", "PASSWORD@#$", "products");

			if (mysqli_connect_errno()) {
				echo "Failed to connect to the target database: " . mysqli_connect_error();
				exit();
			}
			
			
			if ($select = "Show ALL Records") {
				$query = "SELECT " . '*' . " FROM books";
				print( "Query is Reached" ); 
			} else {
				$query = "SELECT " . '*' . " FROM books WHERE books.ID= $select";
			}

			// Perform query
			//$query = "SELECT " . '*' . " FROM books";
			if ($result = mysqli_query($con, $query)) {

				echo "<center><u><h1>Number of Books Found: " . mysqli_num_rows($result) . " </h1></u></center>";
				print( "<table border=2 bordercolor=blue>" );
				print( "<thead><tr><th>ID</th><th>Title</th><th>Author</th><th>Category</th><th>ISBN</th><th>Price (USD)</th></tr></thead>" );
				// Fetch the elements in the row
				while ($row = mysqli_fetch_row($result)) {
					print( "<tr>" );
					print( "<td>$row[0]</td>" );
					print( "<td>$row[1]</td>" );
					print( "<td>$row[2]</td>" );
					print( "<td>$row[3]</td>" );
					print( "<td>$row[4]</td>" );
					print( "<td>$row[5]</td>" );
					//print( "<td>$row[6]</td>" );
					print( "</tr>" );
				}
				print( "</table>");
				echo "Returned rows are: " . mysqli_num_rows($result) . "<br><p>Return to <a href=\"client_side_book_query.php\">previous page</a></p>";
				mysqli_free_result($result);
			}

			mysqli_close($con);
		 ?>
         
      </body>
	  <footer>
            <div class="footer">    
                <div class="list">
                    <ul>
                        <li> <a href="../book_website/books.php">HOME</a> </li>
                        <li> <a href="../book_website/nav_pages/faq.php"> FAQ</a> </li>
                        <li> <a href="../book_website/nav_pages/return.php"> RETURNS</a> </li>
                        <li> <a href="../e-comm/client_side_book_query.php"> SEARCH </a> </li>
                        <li> <a href="../book_website/nav_pages/contact.php"> CONTACTS</a> </li>
                        <li> <a href="../book_website/sign_up_in.php">Staff Only</a> <li>
                        <li> <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, BOOKS</p> </li>    
                    </ul>
                </div>
            </div>
        </footer>
   </html>




