const menuBtn = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.mobile-nav')
menuBtn.addEventListener('click', function(){
    menuBtn.classList.toggle('is-active')
    mobileMenu.classList.toggle('is-active')
})

function closeSideBar(actual){
    if(actual === 'about'){
        window.location.href = '#about';
    }else if(actual === 'contact'){
        window.location.href = '#contact';
    }else if(actual === 'services'){
        window.location.href = '#our-services'
    }else if(actual === 'works'){
        window.location.href = '#our-works';
    }

    menuBtn.classList.toggle('is-active')
    mobileMenu.classList.toggle('is-active')
   
}

