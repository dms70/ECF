import jquery from 'jquery';
const alertify = require('alertifyjs');
import 'alertifyjs/build/css/alertify.min.css';

jquery("#new_edit_utilisateur").on('submit', function(){
if(jquery("#inputPassword").val() != jquery("#verifpass").val()) {
alert("Les deux mots de passe saisies sont différents");

return false;
}
})



jquery(document).ready(function(){
    jquery('.run').on('click' , function(event){
    alertify.alert("This is an alert dialog.", function(){
      alertify.message('OK');
    });
  });
});
