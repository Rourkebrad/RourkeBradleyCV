<?php
if($session->getFlashBag()->has('error')) {
    echo '<div class="alert alert-danger alert-dismissable">';
    foreach ($session->getFlashBag()->get('error') as $message) {
        echo "{$message}<br>";
    }
    echo '</div>';
}
if($session->getFlashBag()->has('success')) {
    echo '<div class="alert alert-success alert-dismissable">';
    foreach ($session->getFlashBag()->get('success') as $message) {
        echo "{$message}<br>";
    }
    echo '</div>';
}
?>
</div><!-- end content -->
    <footer class="footer">
    <div class="col-container">
      <svg viewbox="0 0 64 64" class="logo-icon"><use xlink:href="#logo_icon"></use></svg>
  		<p class="footer-copy">&copy; <?php echo date("Y"); ?> Personal Todo App by Treehouse</p>
    </div>
	</footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
