<html>

<head>
    <title>5 Star Rating Using PHP Mysql and jQuery AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    include 'getRating.php';

    $ratingVal = getRatingFunc($conn);

?>

<body>
    <div class="rating">
        <input type="hidden" id="product_id" value="5">
        <input type="hidden" id="rating_value">
        <span class="star star1" data-rating="1"></span>
        <span class="star star2" data-rating="2"></span>
        <span class="star star3" data-rating="3"></span>
        <span class="star star4" data-rating="4"></span>
        <span class="star star5" data-rating="5"></span>
    </div>
    <br/>
    <br/>
    <button class="reset">Reset</button>
    <style>
        .rating {
            font-size: 0;
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .star {
            display: inline-block;
            margin-right: 5px;
            width: 20px;
            height: 20px;
            background: url("star-empty.png") no-repeat;
            background-size: contain;
        }

        .activatestar {
            background-image: url("star-filled.png") !important;
        }


    </style>
</body>
<script>
    $(document).ready(function () {
        if(<?= $ratingVal ?> == 0)
        {
            $('.star').on('mouseenter', function(){
                $(this).prevAll('.star').addBack().addClass('activatestar');
                $(this).nextAll('.star').removeClass('activatestar');
            });
            $('.rating').on('mouseleave', function() {
                $(this).children('.star').removeClass('activatestar');
            });
            $('.star').on('click', function () {
                var rating = $(this).attr('data-rating');
                $('#rating_value').val(rating);
                $('.star').removeClass('activatestar');
                $(this).addClass('activatestar');
                $.ajax({
                    url: 'submit-rating.php',
                    type: 'POST',
                    data: {
                        product_id: $('#product_id').val(),
                        rating_value: $('#rating_value').val()
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Success',
                            text: response,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true);
                            }
                        })
                    }
                });
            });
        }
        else
        {
            $('.star<?= $ratingVal ?>').prevAll('.star').addBack().addClass('activatestar');
            $('.star<?= $ratingVal ?>').nextAll('.star').removeClass('activatestar');

            $('.reset').on('click', function () {
                $.ajax({
                    url: 'delRating.php',
                    type: 'POST',
                    success: function (response) {
                        Swal.fire({
                            title: 'Success',
                            text: response,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true);
                            }
                        })
                    }
                });
            });
        }
        
    });

</script>


</html>