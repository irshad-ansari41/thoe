<style>

    /* The Modal (background) */
    #cityscape.close{opacity: .9;}
    #cityscape .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    #cityscape .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 500px;
    }

    /* Caption of Modal Image */
    #cityscape #caption {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    #cityscape .modal-content, #cityscape  #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    #cityscape .close {
        position: relative;
        top: 34px; right: 3px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        z-index: 9999;
        opacity: .5;
    }

    #cityscape .close:hover,
    #cityscape .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        #cityscape .modal-content {
            width: 100%;
        }
    }
</style>

<img id="myImg" src="{{asset('assets/images/dubai-healthcare-city-thoe.jpg')}}" alt="Cityscape Global 2018" style="display:none;">

<!-- The Modal -->
<div id="cityscape">
    <div id="myModal" class="modal">
        <div id="img-con" style="max-width: 530px;width:100%;margin: auto;padding:15px;">
            <span class="close">&times;</span>
            <a target="_blank" href="http://thoe.com/cityscape-lp/index.html">
                <img class="modal-content" id="img01">
            </a>
            <div id="caption"></div>
        </div>
    </div>
</div>

<script>
// Get the modal
    var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    };

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";

    };

    document.click = function () {
        var container = $("#cityscape");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
            console.log('out');
        }
    };
    document.onkeydown = function (evt) {
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key == "Escape" || evt.key == "Esc");
        } else {
            isEscape = (evt.keyCode == 27);
        }
        if (isEscape) {
            $('#myModal').hide();
            console.log('Escape');
        }
    };

    $('#img-con,#myModal close').click(function () {
        $('#myModal').hide();
        console.log('close');
    });

    $(function () {
        setTimeout(function () {
            $('#myModal').hide();
            console.log('timeout');
        }, 15000);
    })



// When the user clicks on <span> (x), close the modal
    var Cityscape = sessionStorage.getItem('CityScape');
    if (Cityscape === "" || typeof Cityscape === 'undefined' || Cityscape === null) {
        setTimeout(function () {
            $('#myImg').trigger('click');
        }, 5000);
        sessionStorage.setItem('CityScape', 1);
    }

</script>