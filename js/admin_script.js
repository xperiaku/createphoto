let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

let mainImage = document.querySelector('.update-product .image-container .main-image img');
let subImages = document.querySelectorAll('.update-product .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});


function showPayment(orderId) {
    $.ajax({
        url: 'show_payment.php',
        type: 'GET',
        data: {
            order_id: orderId
        },
        success: function(response) {
            $.magnificPopup.open({
                items: {
                    src: '<div class="mfp-img">' + response + '</div>',
                    type: 'inline'
                },
                callbacks: {
                    open: function() {
                        $('.mfp-img').magnificPopup({
                            type: 'image',
                            closeOnContentClick: true,
                            closeBtnInside: false,
                            fixedContentPos: true,
                            mainClass: 'mfp-no-margins mfp-with-zoom',
                            image: {
                                verticalFit: true,
                                titleSrc: function(item) {
                                    return item.el.attr('title') + '<small>by John Doe</small>';
                                }
                            },
                            zoom: {
                                enabled: true,
                                duration: 300
                            }
                        });
                    }
                }
            });
        }
    });
}


