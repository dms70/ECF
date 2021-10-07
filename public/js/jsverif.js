$("#new_edit_utilisateur").on('submit', function(){
    if($("#inputPassword").val() != $("#verifpass").val()) {
        //implémntez votre code
        alert("Les deux mots de passe saisies sont différents");
        return false;
    }
})
