<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/nav.php')?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../img/nav.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            padding-top:100px;
        }
        .book-details {
            display: flex;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .book-image {
            flex: 1;
            padding-right: 20px;
        }
        .book-image img {
            max-width: 100%;
            border-radius: 8px;
        }
        .book-info {
            flex: 2;
        }
        .book-title {
            font-size: 2em;
            margin-bottom: 10px;
            color: #333;
        }
        .book-description {
            font-size: 1.2em;
            margin-bottom: 20px;
            color: #666;
        }
        .author-section {
            margin-bottom: 20px;
        }
        .author-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }
        .author-name {
            font-size: 1.2em;
            color: #666;
        }
        .borrow-section {
            text-align: center;
        }
        .borrow-button {
            background-color: teal;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .borrow-button:hover {
            background-color:#45a049;
        }
  </style>  <div class="container">
   <div class="book-details">
    <div class="book-image">
     <img alt="Cover image of the book with a detailed illustration of the book's theme" height="400" src="https://storage.googleapis.com/a1aa/image/kfFOYWgEP7VeJ0KfLYcNXtQuXeDpfs4oNb4ljZWXd9GCICOgC.jpg" width="300"/>
    </div>
    <div class="book-info">
     <div class="book-title">
      The Great Book
     </div>
     <div class="book-description">
      This is a detailed description of the book. It covers the main themes, plot points, and characters of the book. The description is engaging and provides enough information to intrigue potential readers.
     </div>
     <div class="author-section">
      <div class="author-title">
       About the Author
      </div>
      <div class="author-name">
       John Doe
      </div>
     </div>
     <div class="borrow-section">
      <button class="borrow-button" onclick="addToCart('The Great Book')">
       <i class="fas fa-book">
       </i>
       Borrow this Book
      </button>
     </div>
    </div>
   </div>
  </div>

        <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
              Best selling
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="collect.php" class="more-books-link">More books</a>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">
               
            <div class="card">
                <div class="image"><span class="text">This is a chair.</span></div>
                  <span class="title">Cool Chair</span>
                  <span class="price">$100</span>
                </div>

                <div class="card">
                    <div class="image"><span class="text">This is a chair.</span></div>
                      <span class="title">Cool Chair</span>
                      <span class="price">$100</span>
                    </div>
                    <div class="card">
                        <div class="image"><span class="text">This is a chair.</span></div>
                          <span class="title">Cool Chair</span>
                          <span class="price">$100</span>
                        </div>
                        <div class="card">
                            <div class="image"><span class="text">This is a chair.</span></div>
                              <span class="title">Cool Chair</span>
                              <span class="price">$100</span>
                            </div>
                            <div class="card">
                                <div class="image"><span class="text">This is a chair.</span></div>
                                  <span class="title">Cool Chair</span>
                                  <span class="price">$100</span>
                                </div>
                            
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

    <?php include('../includes/footer.php')?>
    <script>
   function addToCart(bookTitle) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push(bookTitle);
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${bookTitle} has been added to your cart!`);
        }
  </script>
</body>
</html>