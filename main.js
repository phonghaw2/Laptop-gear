
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,    
        },
        navigation: {
        nextEl: ".next",
        prevEl: ".prev",
        // nextEl: ".next",
        // prevEl: "prev",
        },
    });



    // rating star
    var ratedIndex = -1, uID = 0;

    $(document).ready(function () {
        resetStarColors();

        if (localStorage.getItem('ratedIndex') != null) {
            setStars(parseInt(localStorage.getItem('ratedIndex')));
            uID = localStorage.getItem('uID');
        }

        $('.bxs-star').on('click', function () {
           ratedIndex = parseInt($(this).data('index'));
           localStorage.setItem('ratedIndex', ratedIndex);
           saveToTheDB();
        });

        $('.bxs-star').mouseover(function () {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));
            setStars(currentIndex);
        });

        $('.bxs-star').mouseleave(function () {
            resetStarColors();

            if (ratedIndex != -1)
                setStars(ratedIndex);
        });
    });

    function saveToTheDB() {
        $.ajax({
           url: "index.php",
           method: "POST",
           dataType: 'json',
           data: {
               save: 1,
               uID: uID,
               ratedIndex: ratedIndex
           }, success: function (r) {
                uID = r.id;
                localStorage.setItem('uID', uID);
           }
        });
    }

    function setStars(max) {
        for (var i=0; i <= max; i++)
            $('.bxs-star:eq('+i+')').css('color', '#fafa0f');
    }

    function resetStarColors() {
        $('.bxs-star').css('color', '#c3cff4');
    }
