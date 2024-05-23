

document.querySelector('.cubp-first-social-button').addEventListener('click', function (event) {
     event.currentTarget.querySelector('i').classList.toggle('fa-times');

     document.querySelectorAll('.cubp-social-button').forEach(element => {
            element.classList.toggle('cubp-displaygrid');
     })

})

 