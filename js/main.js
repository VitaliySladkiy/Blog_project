const responsive = {
    10: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    },
    2000: {
        items: 4
    }
}


$(document).ready(function () {

    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    // owl-crousel for blog
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 3000,
        dots: false,
        nav: true,
        navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });

});


    // click to scroll top
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })

    // AOS Instance
    AOS.init();

    // $(window).on('scroll', function() {
    //     console.log( $(this).scrollTop() );
    // });


    // Scroll onClick
    $(document).ready(function() {
        $(".scrollHome").click(function(event){
            $('html, body').animate({scrollTop: '+=1100px'}, 800);
        });
        $(".scrollCategory").click(function(event){
            $('html, body').animate({scrollTop: '+=2000px'}, 800);
        });
        $(".scrollPopularPosts").click(function(event){
            $('html, body').animate({scrollTop: '+=2588px'}, 800);
        });
        $(".scrollFooter").click(function(event){
            $('html, body').animate({scrollTop: '+=5731px'}, 800);
        });
    });


    //Fixed arrow
    let moveup = $(".move-up");
    let scrollPos = $(window).scrollTop();

    $(window).on("scroll load resize", function (){
        scrollPos = $(this).scrollTop();

        if( scrollPos > 750 ) {
            moveup.addClass("fixed");
        } else {
            moveup.removeClass("fixed");
        }
    });



    //registration
    let buttonClick = document.getElementById("registration-btn")
    let backgroundClick = document.getElementById("background")
    buttonClick.addEventListener("click",(e)=>{
        document.querySelector(".blur").classList.add("active")
    });
    backgroundClick.addEventListener("click",(e)=>{
        document.querySelector(".blur").classList.remove("active")
        if (document.getElementById("reg").classList.contains("active")){
            document.getElementById("auth").classList.add("active")
            document.getElementById("reg").classList.remove("active")
        }
    });

    //get authorization
    let changeReg = document.getElementById("changeReg")
    changeReg.addEventListener("click", (e)=>{
        document.getElementById("auth").classList.remove("active")
        document.getElementById("reg").classList.add("active")
    });












