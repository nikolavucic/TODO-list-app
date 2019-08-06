<?php

require_once('Classes/MySQLconnect.php');
require_once('Classes/Listing.php');

?>

<!doctype html>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/main-style.css">
        <title>TODO list app</title>
    </head>
    <body>
        <header>
            <div class="container">
                <h2>TODO List</h2>
                <p>This is yours to-do list!</p>
            </div>
        </header>
        <?php
        new MySQLconnect;
        ?>
        <main>
            <div class="container">

                <!-- Add Card Form -->
                <form class="form" action="Classes/Editing.php" method="post">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Card title"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Card description..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>

                <!-- Search Form -->
                <form class="form" action="index.php" method="post">
                    <div class="md-form">
                        <div class="md-form__radio-buttons">
                            <!-- Group of default radios - option 1 -->
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="search-all" value="search-all" name="groupOfRadios" checked>
                                <label class="custom-control-label" for="search-all">Search everything</label>
                            </div>

                            <!-- Group of default radios - option 2 -->
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="search-title" value="search-title" name="groupOfRadios">
                                <label class="custom-control-label" for="search-title">Search by card title</label>
                            </div>

                            <!-- Group of default radios - option 3 -->
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="search-description" value="search-description" name="groupOfRadios">
                                <label class="custom-control-label" for="search-description">Search by card description</label>
                            </div>
                        </div>

                        <input class="form-control" type="text" name="search_param" placeholder="Search" aria-label="Search">

                    </div>
                </form>

                <!-- Reset Cards Form -->
                <form class="form reset-cards-form" action="index.php" method="post">
                    <button type="submit" class="btn btn-primary" data-command="reset">Reset all Cards</button>
                </form>

                <?php
                if ( isset( $_POST[ 'search_param' ] ) ) {
	                $search_param = $_POST[ 'search_param' ];
                } else {
	                $search_param = '';
                }

                if ( isset( $_POST[ 'groupOfRadios' ] ) ) {
	                $filter_param = $_POST[ 'groupOfRadios' ];
                } else {
	                $filter_param = 'search-all';
                }
                ?>

                <div class="cards-wrapper">
                    <?php
                    new Listing( $search_param, $filter_param );
                    ?>
                </div>

            </div>
        </main>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
