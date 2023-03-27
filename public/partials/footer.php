<footer class="footer">
        <div class="container">
            <div class="wrap_footer">
                <p>&copyCopyright Designed by Team of Khanh Ly</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="navigation.js"></script>
    <script>
        window.onload = function() {
            navigation('<?php echo $_GET['id'] ?? "user"?>');
        }
        $(window).on("load", function() {
            $(".loader-container").fadeOut(300);
        })
    </script>
</body>
</html>