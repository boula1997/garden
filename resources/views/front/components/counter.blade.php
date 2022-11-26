{{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .counter-icon {
        font-size: 2em !important;
        margin-top: 10%;
        color: white;
    }

    .counter-h2 {
        color: white;
    }

    /* .intro {
  height: auto;
  min-height: 100vh;
  text-align: center;
  background-color: teal;
} */

</style>
<script>
    function inVisible(element) {
        //Checking if the element is
        //visible in the viewport
        var WindowTop = $(window).scrollTop();
        var WindowBottom = WindowTop + $(window).height();
        var ElementTop = element.offset().top;
        var ElementBottom = ElementTop + element.height();
        //animating the element if it is
        //visible in the viewport
        if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
            animate(element);
    }

    function animate(element) {
        //Animating the element if not animated before
        if (!element.hasClass('ms-animated')) {
            var maxval = element.data('max');
            var html = element.html();
            element.addClass("ms-animated");
            $({
                countNum: element.html()
            }).animate({
                countNum: maxval
            }, {
                //duration 5 seconds
                duration: 5000,
                easing: 'linear',
                step: function () {
                    element.html(Math.floor(this.countNum) + html);
                },
                complete: function () {
                    element.html(this.countNum + html);
                }
            });
        }

    }

    //When the document is ready
    $(function () {
        //This is triggered when the
        //user scrolls the page
        $(window).scroll(function () {
            //Checking if each items to animate are
            //visible in the viewport
            $("h2[data-max]").each(function () {
                inVisible($(this));
            });
        })
    });

</script>

<div class="container-fluid text-center m-auto">
    {{-- <h1>Some cool facts</h1> --}}
    <div class="row pt-5">
        <div class="col-sm-3 pt-3 pb-4" style="background-color: #00FF00">
            <i class="fa fa-user counter-icon"></i>
            <h2 class="counter-h2" data-max="50">+ Happy Customers</h2>
        </div>
        <div class="col-sm-3 pt-3 pb-4" style="background-color: #2EFF2E">
            <i class="fa fa-code counter-icon"></i>
            <h2 class="counter-h2" data-max="25000">+ Lines of code</h2>
        </div>
        <div class="col-sm-3 pt-3 pb-4" style="background-color: #5CFF5C">
            <i class="fa fa-lock counter-icon"></i>
            <h2 class="counter-h2" data-max="10">+ Projects</h2>
        </div>
        <div class="col-sm-3 pt-4 pb-5" style="background-color: #8AFF8A">
            <i class="fa fa-briefcase counter-icon"></i>
            <h2 class="counter-h2" data-max="30" id="test">+ Developers</h2>
        </div>
    </div>
</div>
