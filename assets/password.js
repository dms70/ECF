import jquery from 'jquery';
const alertify = require('alertifyjs');
import 'alertifyjs/build/css/alertify.min.css';

jquery("#new_edit_utilisateur").on('submit', function(){
if(jquery("#passwordfirst").val() != jquery("#passwordsecond").val()) {
alert("Les 2 mots de passe saisis sont différents");

return false;
}
})




