
$(document).ready(function() {
	$('form').html('')
    $('#userform').html('<div id=div class= ><br><br><</div>');
    $('#div').html('<input id=pseudo type=text name=user value="" placeholder="Entrer votre pseudo" ><br><br> <input type=text name=pwd value="" placeholder="Entrer votre mot de passe" ><br><br> <button type = "submit" name ="submit" onclick="connectUser()">Se Connecter</button>');
	
});