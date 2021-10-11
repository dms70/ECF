const axios = require('axios').default;
import jquery from 'jquery';

function onclickremove(event){

event.preventDefault();

const url = this.href;

axios.get(url).then(function(response) {

    console.log(response);

    })
}


document.querySelectorAll('a.js-cancelbook').forEach(function(link){

link.addEventListener('click', onclickremove);

});


function oncheckedremove(event){

    event.preventDefault();
    
    const url = this.href;

    const span = this.querySelector('span');
    const a = this.querySelector('a');
    
    axios.get(url).then(function(response) {
         
        //console.log(response);
        if (span.classList.contains('valide')) 
            {span.classList.replace('valide','invalide')
             span.textContent="invalide";
             console.log("pass ici");
             }

        else      
            {span.classList.replace('invalide','valide')
            span.textContent="valide";
            console.log("pass ici valide");
        };

        })
    
    }
    

document.querySelectorAll('a.js-checked').forEach(function(link){

    link.addEventListener('click', oncheckedremove);
    
    });



