<?php //print Error Pwd 
    if($wrongpassword == true){ ?>
        <script type="text/javascript">
        	document.getElementById('login').style.display = "block";
            var1 = document.getElementById('login').style.display;
            var1 = "block";
            console.log(var1);
            document.getElementById('badAuth').style.display = "block";
            var2 = document.getElementById('badAuth').style.display;
            var2 = style.display = "block";
            console.log(var2);
        </script>
<?php } ?>
<?php if(!$connect){?>
    <script type="text/javascript" src="script.js"></script>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>