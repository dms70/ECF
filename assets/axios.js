const axios = require('axios').default;

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


