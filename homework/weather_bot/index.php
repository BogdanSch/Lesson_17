<?php include "header.php" ?>
<body>
    <div class="container">
        <h1>Weather bot</h1>
        <form action="telegram.php" method="post">
            <label for="city">
                Enter your city: 
                <input type="text" class="form-control" name="city">
            </label>
            <input type="submit" class="btn btn-dark">
        </form>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>