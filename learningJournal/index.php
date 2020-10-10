<?php
include('inc/header.php');
include('functions.php');
?>

        <section>
            <div class="container">
                <div class="entry-list">

                        <?php foreach($catalog as $item)
                        {
                          echo "<br>";
                          echo "<article><h1><a href='detail.php?id=" . $item['id'] . "'>" . "Title: " .   $item['title'] . " "  .  "<br></a></h1> ";
                          echo "<h2><time datetime=" . $item['date'] .">" .  date("F d, Y", strtotime($item['date'])) . "</time></h2> </article>";
                          echo "<br>";
                          echo "<hr>";

                        } ?>

                </div>
            </div>


        </section>
        <?php
        include('inc/footer.php');
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
