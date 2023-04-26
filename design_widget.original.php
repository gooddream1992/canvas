<?php

// ************* Design Widget *************

class Canvas2Frame_Design_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'design_widget',

            // Widget name will appear in UI
            __('Canvas2Frame Design Widget', 'canvas2frame-plugin'),

            // Widget description
            array('description' => __('Canvas2Frame Design Widget', 'canvas2frame-plugin'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {

        // $frame_sizes_array = get_pricing_array();

        // $frame_colors_array = get_colors_array();

        function get_colors_array() {
            $colors_array = array(
                'espresso' => array(
                    'hex_color' => '#653A0F',
                    'color' => 'espresso',
                    'color_name' => 'Espresso',
                    'background' => "background-image: url('https://www.canvas2frame.com/IMAGE/frames/palettes/espresso.png');",
                ),
                'weatheredoak' => array(
                    'hex_color' => '#B4A28E',
                    'color' => 'weatheredoak',
                    'color_name' => 'Weathered Oak',
                    'background' => "background-image: url('https://www.canvas2frame.com/IMAGE/frames/palettes/weatheredoak.png');",
                ),
                'earlyamerican' => array(
                    'hex_color' => '#835839',
                    'color' => 'earlyamerican',
                    'color_name' => 'Early American',
                    'background' => "background-image: url('https://www.canvas2frame.com/IMAGE/frames/palettes/earlyamerican.png');",
                ),
                'white' => array(
                    'hex_color' => '#fbfbfb',
                    'color' => 'white',
                    'color_name' => 'White',
                    'background' => 'background-color: #ffffff;',
                ),
                'black' => array(
                    'hex_color' => '#000000',
                    'color' => 'black',
                    'color_name' => 'Black',
                    'background' => 'background-color: #000000;',
                ),
                'none' => array(
                    'hex_color' => '#ffffff',
                    'color' => 'none',
                    'color_name' => 'Canvas Only',
                    'background' => "background-color: #ffffff;",
                ),
            );
            return $colors_array;
        }
        
        
        
        function get_pricing_array()
        {
            // Define the products with a discount
            $pricing_array = array(
                '24x24' => array(
                    'width' => 24,
                    'height' => 24,
                    'canvas_width' => '550',
                    'canvas_height' => '550',
                    'canvas_rotated_width' => '550',
                    'canvas_rotated_height' => '550',
                    'margin_top' => '25',
                    'margin_bottom' => '25',
                    'artboard_width' => '600',
                    'price' => 110,
                    'discounted_price' => 89.99,
                    'print_only_price' => 55,
                    'print_only_discounted_price' => 44.99,
                    'discount_multiple' => 2,
                    'shipping_1' => 15,
                ),
                '18x26' => array(
                    'width' => 18,
                    'height' => 26,
                    'canvas_width' => '366',
                    'canvas_height' => '552',
                    'canvas_rotated_width' => '552',
                    'canvas_rotated_height' => '366',
                    'margin_top' => '24',
                    'margin_bottom' => '24',
                    'artboard_width' => '600',
                    'price' => 85,
                    'discounted_price' => 74.99,
                    'print_only_price' => 42,
                    'print_only_discounted_price' => 37.99,
                    'discount_multiple' => 2,
                    'shipping_1' => 15,
                ),
                '15x15' => array(
                    'width' => 15,
                    'height' => 15,
                    'canvas_width' => '480',
                    'canvas_height' => '480',
                    'canvas_rotated_width' => '480',
                    'canvas_rotated_height' => '480',
                    'margin_top' => '33',
                    'margin_bottom' => '22',
                    'artboard_width' => '500',
                    'price' => 59,
                    'discounted_price' => 44.99,
                    'print_only_price' => 29,
                    'print_only_discounted_price' => 22.99,
                    'discount_multiple' => 2,
                    'shipping_1' => 8.5,
                ),
                '9x11' => array(
                    'width' => 9,
                    'height' => 11,
                    'canvas_width' => '360',
                    'canvas_height' => '440',
                    'canvas_rotated_width' => '368',
                    'canvas_rotated_height' => '304',
                    'margin_top' => '46',
                    'margin_bottom' => '36',
                    'artboard_width' => '440',
                    'price' => 34,
                    'discounted_price' => 29.99,
                    'print_only_price' => 17,
                    'print_only_discounted_price' => 14.99,
                    'discount_multiple' => 3,
                    'shipping_1' => 8.5,
                ),
            );
            return $pricing_array;
        }

?>
        <style>
            body {
                color: #333;
                /* background-color: #dadada; */
            }


            #artboard {
                margin: 0 auto 20px;
                width: 600px;
                max-height: 600px;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: top center;
                background-image: url('https://www.canvas2frame.com/IMAGE/frames/espresso/24x24.png');
                text-align: center;
            }

            #canvas {
                margin-top: 24px;
                margin-bottom: 24px;
            }


            /* canvas {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
                image-rendering: pixelated;
                image-rendering: optimizeSpeed;
                image-rendering: optimizeQuality;
            } */

            .artboard_controls {
                text-align: center;
                margin-bottom: 20px;
            }

            .artboard_controls .control {
                font-size: 12px;
                display: inline-block;
                border: 1px solid #222;
                padding: 5px;
                margin: 0 5px;
                width: 100px;
                position: relative;

            }

            .start_here {
                /* pulsing green box shadow */
                box-shadow: 0 0 0 2px rgba(0, 255, 0, 0.9);
                animation: pulse 2s infinite;
                /* very light green background */
                /* background-color: rgba(0, 255, 0, 0.1); */
            }

            @keyframes pulse {
                0% {
                    box-shadow: 0 0 0 0 rgba(0, 255, 0, 0.9);
                }

                70% {
                    box-shadow: 0 0 0 20px rgba(0, 255, 0, 0);
                }

                100% {
                    box-shadow: 0 0 0 0 rgba(0, 255, 0, 0);
                }
            }



            .selection_group_heading {
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                margin-top: 30px;
            }

            .selection_group_heading:first-child {
                margin-top: 20px;
            }

            .select_size {
                cursor: pointer;
                margin-top: 10px;
                padding: 15px 15px 12px;
                display: inline-block;
            }

            .select_size .frame_thumb {
                display: block;
                border: 2px solid #999;
                margin: 0 auto;
            }

            .small_frame {
                display: none;
            }

            .select_size.active,
            .select_color.active {
                box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
                background-color: #ffffff;
            }

            .select_size.active .frame_thumb {
                border: 2px solid #000;
            }

            .select_size .frame_size {
                font-size: 12px;
                text-align: center;
                margin-top: 2px;
            }

            .select_color {
                cursor: pointer;
                margin-top: 10px;
                padding: 15px 15px 12px;
                display: inline-block;
            }

            .select_color .frame_thumb {
                display: block;
                margin: 0 auto;
                width: 24px;
                height: 24px;
                border-radius: 24px;
                border: 1px solid #999;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: top center;
            }

            .select_color.none .frame_thumb {
                border-radius: 0px;
                border: 1px solid #ccc;
            }

            .select_color.active .frame_thumb {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                border: 1px solid #000;
            }

            .select_color.none.active .frame_thumb {
                border-radius: 0px;
            }

            .select_color .frame_color {
                font-size: 12px;
                text-align: center;
                margin-top: 2px;
            }

            .btn-primary {
                background-color: #e47911;
                border-color: #e47911;
            }

            .btn-primary:hover,
            .btn-primary:focus,
            .btn-primary:active,
            .btn-primary:visited,
            .btn-primary:target {
                background-color: #fe7900 !important;
                border-color: #fe7900 !important;
                box-shadow: none !important;
            }

            .pricing {
                margin-top: 20px;
                text-align: center;
            }

            .pricing .price {
                font-size: 18px;
                font-weight: bold;
                margin: 3px 0;
            }

            #in_progress {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 9999;
            }

            #in_progress div {
                background-color: #ffffff;
                font-size: 18px;
                color: #000000;
                padding: 20px;
                width: 300px;
                border-radius: 10px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
            }

            #notice_box {
                /* position: absolute;
                bottom: 60px; */
                left: 15%;
                width: 70%;
                height: auto;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 9999;
                color: #fff;
                padding: 10px 20px;
                border-radius: 5px;
            }

            @media screen and (max-width: 767px) {
                #artboard {
                    width: 450px;
                    max-height: 450px;
                }
            }

            @media screen and (max-width: 500px) {
                #artboard {
                    width: 300px;
                    max-height: 300px;
                }


            }
        </style>

        <div class="row">
            <div class="col-12 col-xl-7">
                <div id="artboard">
                    <canvas id="canvas" data-rotate="false" width="552" height="366"></canvas>
                </div>
                <div id="notice_box" style="display:none;">
                    <div class="notice_message text-center"></div>
                </div>
            </div>
            <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-5 offset-xl-0">
                <div class="selection_group_heading">Upload Your Photo</div>
                <div class="artboard_controls mt-4">
                    <div class="control upload start_here" id="upload">
                        <i class="fa fa-upload"></i>
                        <div>Upload</div>
                    </div>
                    <!-- <div class="control" id="rotate_frame">
                            <i class="fa fa-rotate-right"></i>
                            <div>Rotate Frame</div>
                        </div> -->
                </div>
                <div class="selection_group_heading">Choose Size</div>
                <div class="row no-gutters">
                    <?php foreach ($frame_sizes_array as $frame_size) : ?>
                        <div class="col-3 text-center">
                            <div class="select_size" data-width="<?php echo $frame_size['width']; ?>" data-height="<?php echo $frame_size['height']; ?>" data-canvas-width="<?php echo $frame_size['canvas_width']; ?>" data-canvas-height="<?php echo $frame_size['canvas_height']; ?>" data-canvas-rotated-width="<?php echo $frame_size['canvas_rotated_width']; ?>" data-canvas-rotated-height="<?php echo $frame_size['canvas_rotated_height']; ?>" data-margin-top="<?php echo $frame_size['margin_top']; ?>" data-margin-bottom="<?php echo $frame_size['margin_bottom']; ?>" data-artboard-width="<?php echo $frame_size['artboard_width']; ?>" data-price="<?php echo $frame_size['price']; ?>" data-discounted-price="<?php echo $frame_size['discounted_price']; ?>" data-print-only-price="<?php echo $frame_size['print_only_price']; ?>" data-print-only-discounted-price="<?php echo $frame_size['print_only_discounted_price']; ?>" data-discount-multiple="<?php echo $frame_size['discount_multiple']; ?>">
                                <div class="big_frame">
                                    <div class="frame_thumb" style="width: <?php echo $frame_size['width'] * 3; ?>px; height: <?php echo $frame_size['height'] * 3; ?>px;"></div>
                                </div>
                                <div class="small_frame">
                                    <div class="frame_thumb" style="width: <?php echo $frame_size['width'] * 2; ?>px; height: <?php echo $frame_size['height'] * 2; ?>px;"></div>
                                </div>
                                <div class="frame_size"><?php echo $frame_size['width']; ?>" x <?php echo $frame_size['height']; ?>"</div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="selection_group_heading">Choose Frame Color</div>
                <div class="row no-gutters">
                    <?php foreach ($frame_colors_array as $frame_color) : ?>
                        <div class="col-2 mx-auto text-center">
                            <div class="select_color <?php echo $frame_color['color']; ?>" data-color="<?php echo $frame_color['color']; ?>">
                                <div class="frame_thumb" style="<?php echo $frame_color['background']; ?>"></div>
                                <div class="frame_color"><?php echo $frame_color['color_name']; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="pricing">
                    <div class="price">Get 1 for $<span id="single_price"></span> <span id="single_price_original"></span></div>
                    <div class="price">Or get <span id="discount_multiple">2</span> for $<span id="multiple_price"></span> Each!</div>
                </div>

                <form action="/processes/upload_art.php" method="post" style="margin-top: 10px;" enctype="multipart/form-data" id="add_to_cart">
                    <input type="file" id="upload_file" name="original_file" style="display: none;">
                    <input type="hidden" name="image_data_url" id="image_data_url">
                    <input type="hidden" id="rotate" value="false" name="rotate">
                    <input type="hidden" id="frame_size_width" value="24" name="frame_size_width">
                    <input type="hidden" id="frame_size_height" value="24" name="frame_size_height">
                    <input type="hidden" id="frame_color" value="espresso" name="frame_color">
                    <input type="hidden" id="original_width" value="" name="original_width">
                    <input type="hidden" id="original_height" value="" name="original_height">
                    <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>

        <div id="in_progress">
            <div><i class="fa fa-spinner fa-spin"></i><br>Creating Your Artwork. Do Not Close This Window.</div>
        </div>

        <?php if ($_GET['test'] == '1') : ?>
            <div style="margin-left: -1000px;">
            <?php else : ?>
                <div style="display:none;">
                <?php endif; ?>
                <canvas id="original_image_cropped_canvas" style="border: 2px solid red;"></canvas>
                </div>

                <script>
                    jQuery(document).ready(function($) {

                        $('#add_to_cart').submit(function(e) {
                            e.preventDefault();
                            // check if canvas has a drawing or if blank
                            var blank = document.createElement('canvas');
                            blank.width = canvas_original_cropped.width;
                            blank.height = canvas_original_cropped.height;
                            if (canvas_original_cropped.toDataURL() == blank.toDataURL()) {
                                alert('Please upload an image to continue.');
                            } else {
                                $('#in_progress').show();
                                $('#image_data_url').val(canvas_original_cropped.toDataURL());
                                this.submit();
                            }
                        });

                        // add active class to first select_size
                        $('.select_size').first().addClass('active');

                        // add active class to first select_color
                        $('.select_color').first().addClass('active');

                        // set #single_price and #multiple_price to first select_size price
                        $('#single_price').text($('.select_size.active').data('price'));
                        $('#multiple_price').text($('.select_size.active').data('discounted-price'));


                        const canvas = document.getElementById("canvas");
                        const ctx = canvas.getContext("2d");



                        var canvas_width = $('.select_size.active').data('canvas-width');
                        var canvas_height = $('.select_size.active').data('canvas-height');
                        var canvasAspectRatio = canvas.width / canvas.height;


                        let zoomLevel = canvasAspectRatio;
                        let zoomDelta = 0.01;
                        let xOffset = 0;
                        let yOffset = 0;
                        let aspectRatio;
                        let isDragging = false;
                        let initialX;
                        let initialY;
                        let currentX;
                        let currentY;
                        let rotation = 0;

                        const image = new Image();



                        const canvas_original_cropped = document.getElementById("original_image_cropped_canvas");
                        const ctx_original_cropped = canvas_original_cropped.getContext("2d");




                        // const image_original_cropped = new Image();

                        // image.onload = function() {
                        //     aspectRatio = image.width / image.height;
                        //     canvas.width = canvas_width;
                        //     canvas.height = canvas_height;

                        //     let canvasAspectRatio = canvas.width / canvas.height;
                        //     let imageAspectRatio = image.width / image.height;

                        //     let drawnImageWidth, drawnImageHeight;
                        //     // If the canvas aspect ratio is larger than the image aspect ratio, set the drawn image width to the width of the canvas
                        //     if (canvasAspectRatio > imageAspectRatio) {
                        //         drawnImageWidth = canvas.width;
                        //         drawnImageHeight = drawnImageWidth / imageAspectRatio;
                        //     } else {
                        //         // If the image aspect ratio is larger than the canvas aspect ratio, set the drawn image height to the height of the canvas
                        //         drawnImageHeight = canvas.height;
                        //         drawnImageWidth = drawnImageHeight * imageAspectRatio;
                        //     }

                        //     // ctx.drawImage(image, xOffset, yOffset, drawnImageWidth / zoomLevel, drawnImageHeight / zoomLevel);
                        //     ctx.drawImage(image, xOffset, yOffset, drawnImageWidth, drawnImageHeight);
                        // };


                        function applyFrameUrl() {
                            var width = $('.select_size.active').data('width');
                            var height = $('.select_size.active').data('height');
                            var color = $('.select_color.active').data('color');
                            var margin_top = $('.select_size.active').data('margin-top');
                            var margin_bottom = $('.select_size.active').data('margin-bottom');
                            var artboard_width = $('.select_size.active').data('artboard-width');
                            var rotated = $('#rotate').val() == 'true' ? '-rotated' : '';


                            var frame_url = 'https://www.canvas2frame.com/IMAGE/frames/' + color + '/' + width + 'x' + height + rotated + '.png';
                            $('#artboard').css('background-image', 'url(' + frame_url + ')');
                            // $('#artboard').css('width', artboard_width + 'px');
                        }

                        $('.select_size').click(function() {
                            $('.select_size').removeClass('active');
                            $(this).addClass('active');

                            var canvas_width = $('.select_size.active').data('canvas-width');
                            var canvas_height = $('.select_size.active').data('canvas-height');
                            var canvas_rotated_width = $('.select_size.active').data('canvas-rotated-width');
                            var canvas_rotated_height = $('.select_size.active').data('canvas-rotated-height');
                            var color = $('.select_color.active').data('color');

                            var price = $('.select_size.active').data('price');
                            var discounted_price = $('.select_size.active').data('discounted-price');
                            var discount_multiple = $('.select_size.active').data('discount-multiple');

                            var print_only_price = $('.select_size.active').data('print-only-price');
                            var print_only_discounted_price = $('.select_size.active').data('print-only-discounted-price');

                            if (color == 'none') {
                                $('#single_price').text(print_only_price);
                                $('#multiple_price').text(print_only_discounted_price);
                            } else {
                                $('#single_price').text(price);
                                $('#multiple_price').text(discounted_price);
                            }

                            $('#discount_multiple').text(discount_multiple);

                            $('#frame_size_width').val($('.select_size.active').data('width'));
                            $('#frame_size_height').val($('.select_size.active').data('height'));


                            $('#rotate').val('false');

                            fitCanvasToScreenWidth();
                            // canvas.width = canvas_width;
                            // canvas.height = canvas_height;

                            limitZoomLevel();
                            setTranslate();
                            applyFrameUrl();
                        });

                        $('.select_color').click(function() {
                            $('.select_color').removeClass('active');
                            $(this).addClass('active');

                            var color = $('.select_color.active').data('color');
                            var price = $('.select_size.active').data('price');
                            var discounted_price = $('.select_size.active').data('discounted-price');
                            var discount_multiple = $('.select_size.active').data('discount-multiple');

                            var print_only_price = $('.select_size.active').data('print-only-price');
                            var print_only_discounted_price = $('.select_size.active').data('print-only-discounted-price');

                            if (color == 'none') {
                                $('#single_price').text(print_only_price);
                                $('#multiple_price').text(print_only_discounted_price);
                            } else {
                                $('#single_price').text(price);
                                $('#multiple_price').text(discounted_price);
                            }


                            $('#frame_color').val(color);

                            applyFrameUrl();
                        });




                        function limitZoomLevel() {
                            var canvasAspectRatio = canvas.width / canvas.height;
                            var canvasAspectRatioReverse = canvas.height / canvas.width;
                            var imageAspectRatio = image.width / image.height;
                            var imageAspectRatioReverse = image.height / image.width;

                            if (image.width > image.height) {
                                // console.log('landscape');
                                if (zoomLevel > canvasAspectRatio) {
                                    zoomLevel = canvasAspectRatio - zoomDelta;
                                }
                                if (zoomLevel > imageAspectRatio) {
                                    zoomLevel = imageAspectRatio - zoomDelta;
                                }
                            } else {
                                if (image.width == image.height) {
                                    // console.log('square');
                                    if (zoomLevel > 1) {
                                        zoomLevel = 1;
                                    }
                                } else {
                                    // console.log('portrait');
                                    if (zoomLevel > canvasAspectRatioReverse) {
                                        zoomLevel = canvasAspectRatioReverse - zoomDelta;
                                    }
                                    if (zoomLevel > imageAspectRatioReverse) {
                                        zoomLevel = imageAspectRatioReverse - zoomDelta;
                                    }
                                }
                            }

                            // consider device pixel ratio
                             zoomLevel = zoomLevel * window.devicePixelRatio;
                        }






                        canvas.addEventListener("wheel", function(event) {
                            event.preventDefault();

                            if (event.deltaY < 0) {
                                zoomLevel -= zoomDelta;
                            } else {
                                zoomLevel += zoomDelta;
                            }

                            limitZoomLevel();
                            setTranslate();
                        });


                        canvas.addEventListener("mouseup", function(event) {
                            isDragging = false;
                        });

                        canvas.addEventListener("mousedown", function(event) {
                            event.preventDefault();
                            initialX = event.clientX;
                            initialY = event.clientY;
                            isDragging = true;
                        });

                        canvas.addEventListener("mouseout", function(event) {
                            isDragging = false;
                        });


                        canvas.addEventListener("mousemove", function(event) {
                            if (isDragging) {
                                event.preventDefault();
                                currentX = event.clientX - initialX;
                                currentY = event.clientY - initialY;
                                xOffset += currentX * Math.cos(rotation) + currentY * Math.sin(rotation);
                                yOffset += -currentX * Math.sin(rotation) + currentY * Math.cos(rotation);
                                initialX = event.clientX;
                                initialY = event.clientY;
                                setTranslate();
                            }
                        });









                        let isPinching = false;
                        let initialDistance = 0;

                        // let isDragging = false;
                        // let initialX = 0;
                        // let initialY = 0;


                        canvas.addEventListener("touchstart", function(event) {
                            if (event.touches.length === 2) {
                                isPinching = true;
                                initialDistance = Math.hypot(
                                    event.touches[0].clientX - event.touches[1].clientX,
                                    event.touches[0].clientY - event.touches[1].clientY
                                );
                            }
                        });

                        canvas.addEventListener("touchmove", function(event) {
                            if (isPinching && event.touches.length === 2) {
                                const currentDistance = Math.hypot(
                                    event.touches[0].clientX - event.touches[1].clientX,
                                    event.touches[0].clientY - event.touches[1].clientY
                                );
                                const distanceDelta = currentDistance - initialDistance;

                                if (distanceDelta < 0) {
                                    zoomLevel += zoomDelta;
                                } else {
                                    zoomLevel -= zoomDelta;
                                }

                                limitZoomLevel();
                                setTranslate();

                                initialDistance = currentDistance;
                            }
                            if (isDragging) {
                                event.preventDefault();
                                const currentX = event.touches[0].clientX;
                                const currentY = event.touches[0].clientY;
                                const deltaX = currentX - initialX;
                                const deltaY = currentY - initialY;
                                xOffset += deltaX * Math.cos(rotation) + deltaY * Math.sin(rotation);
                                yOffset += -deltaX * Math.sin(rotation) + deltaY * Math.cos(rotation);
                                initialX = currentX;
                                initialY = currentY;
                                setTranslate();
                            }
                        });

                        canvas.addEventListener("touchend", function(event) {
                            isPinching = false;
                            isDragging = false;

                            setTranslate();
                        });

                        canvas.addEventListener("touchstart", function(event) {
                            event.preventDefault();
                            initialX = event.touches[0].clientX;
                            initialY = event.touches[0].clientY;
                            isDragging = true;
                        });


                        // every 2 seconds, check if the image is loaded
                        var interval = setInterval(function() {
                            // check if canvas has a drawing or if blank
                            var blank = document.createElement('canvas');
                            blank.width = canvas.width;
                            blank.height = canvas.height;
                            if (canvas.toDataURL() == blank.toDataURL()) {
                                // canvas is blank
                                setTranslate();
                            }
                        }, 1000);




                        function setTranslate() {
                            ctx.clearRect(0, 0, canvas.width, canvas.height);

                            // if $('#original_width').val() is not set, return
                            if ($('#original_width').val() == '') {
                                return;
                            }

                            // let image_preview = image;

                            let previousWidth = canvas.width / zoomLevel;
                            let previousHeight = canvas.height / zoomLevel;

                            let width = previousHeight;
                            let height = previousWidth;

                            

                            // Keep the original aspect ratio of the image
                            if (width / height > aspectRatio) {
                                height = width / aspectRatio;
                            } else {
                                width = height * aspectRatio;
                            }

                            // Prevent image from going outside canvas to the left
                            if (xOffset > 0) {
                                xOffset = 0;
                            }
                            // Prevent image from going outside canvas to the right
                            if (xOffset + width < canvas.width) {
                                xOffset = canvas.width - width;
                            }
                            // Prevent image from going outside canvas to the top
                            if (yOffset > 0) {
                                yOffset = 0;
                            }
                            // Prevent image from going outside canvas to the bottom
                            if (yOffset + height < canvas.height) {
                                yOffset = canvas.height - height;
                            }

                            limitZoomLevel();


                            var original_width = $('#original_width').val();
                            var original_height = $('#original_height').val();
                            var frame_size_width = $('#frame_size_width').val();
                            var frame_size_height = $('#frame_size_height').val();
                            console.log('xOffset: ' + xOffset);
                            console.log('yOffset: ' + yOffset);
                            console.log('width: ' + width);
                            console.log('height: ' + height);
                            console.log('zoomLevel: ' + zoomLevel);
                            console.log('canvas.width: ' + canvas.width);
                            console.log('canvas.height: ' + canvas.height);
                            console.log('original_height: ' + original_height);
                            console.log('original_width: ' + original_width);

                            var x_offset_percent = xOffset / width;
                            var original_x_offset = original_width * x_offset_percent;
                            console.log('original_x_offset: ' + original_x_offset);

                            var y_offset_percent = yOffset / width;
                            var original_y_offset = original_width * y_offset_percent;
                            console.log('original_y_offset: ' + original_y_offset);

                            var canvas_aspect_ratio = canvas.width / canvas.height;
                            var frame_aspect_ratio = frame_size_width / frame_size_height;
                            console.log('frame_aspect_ratio: ' + frame_aspect_ratio);


                            // ratio width to image.width
                            var width_ratio = width / canvas.width;
                            var height_ratio = height / canvas.height;

                            canvas_original_cropped.width = original_width / width_ratio;
                            canvas_original_cropped.height = original_height / height_ratio;




                            console.log('canvas_original_cropped.width: ' + canvas_original_cropped.width);
                            console.log('canvas_original_cropped.height: ' + canvas_original_cropped.height);
                            // get frame width and height
                            $frame_width = $('.select_size.active').data('width');
                            $frame_height = $('.select_size.active').data('height');
                            $min_width_resolution = $frame_width * 72;
                            $min_height_resolution = $frame_height * 72;
                            console.log('min_width_resolution: ' + $min_width_resolution);
                            console.log('min_height_resolution: ' + $min_height_resolution);

                            if (canvas_original_cropped.width < $min_width_resolution || canvas_original_cropped.height < $min_height_resolution) {
                                low_res_warning = 'Zooming in too far will result in a blurry print. Please zoom out to continue.';
                                if (original_width < $min_width_resolution || original_height < $min_height_resolution) {
                                    low_res_warning = 'The resolution of your image is too low for this size frame. Please upload a higher resolution image.';
                                }
                                $('#notice_box .notice_message').html(low_res_warning);
                                $('#notice_box').show();
                            } else {
                                $('#notice_box .notice_message').html('');
                                $('#notice_box').hide();
                            }

                            console.log('original_x_offset: ' + original_x_offset);
                            console.log('original_y_offset: ' + original_y_offset);
                            console.log('image.width: ' + image.width);
                            console.log('image.height: ' + image.height);





                            // // Create a new canvas element
                            // const tempCanvas = document.createElement('canvas');
                            // const tempCtx = tempCanvas.getContext('2d');

                            // tempCtx.imageSmoothingEnabled = false;
                            // // tempCtx.imageSmoothingQuality = 'high';


                            // // Set the desired width and calculate the new height based on the aspect ratio
                            // // let newWidth = 1200;

                            // let newWidth = image.width;
                            // if(image.width > 3000) {
                            //     newWidth = Math.round(image.width / 2);
                            // }

                            // if(image.width > 4500) {
                            //     newWidth = Math.round(image.width / 3);
                            // }

                            // if(image.width > 6000) {
                            //     newWidth = Math.round(image.width / 4);
                            // }

                            // if(image.width > 7500) {
                            //     newWidth = Math.round(image.width / 5);
                            // }

                            // if(image.width > 9000) {
                            //     newWidth = Math.round(image.width / 6);
                            // }
                            // const newHeight = (image.height * newWidth) / image.width;



                            // // Set the dimensions of the temporary canvas
                            // tempCanvas.width = newWidth;
                            // tempCanvas.height = newHeight;

                            // // Draw the image on the temporary canvas with the new dimensions
                            // tempCtx.drawImage(image, 0, 0, newWidth, newHeight);

                            // // Create a new Image object with the updated width
                            // const updatedImagePreview = new Image();
                            // updatedImagePreview.src = tempCanvas.toDataURL();








                            // // Create a new canvas element
                            // const tempCanvas = document.createElement('canvas');
                            // const tempCtx = tempCanvas.getContext('2d');

                            // // Set the desired width and calculate the new height based on the aspect ratio
                            // const newWidth = 1200; // Change this value to your desired width
                            // const newHeight = (image_preview.height * newWidth) / image_preview.width;

                            // // Calculate the scale factor and number of iterations required for multi-step scaling
                            // const scaleFactor = 0.5; // You can adjust this value to control the number of iterations
                            // const iterations = Math.ceil(Math.log(canvas.width / newWidth) / Math.log(1 / scaleFactor));

                            // let scaledImage = image_preview;

                            // // Perform multi-step scaling
                            // for (let i = 0; i < iterations; i++) {
                            //     // Create a temporary canvas for this iteration
                            //     const iterCanvas = document.createElement('canvas');
                            //     const iterCtx = iterCanvas.getContext('2d');

                            //     // Enable image smoothing on the iteration context
                            //     iterCtx.imageSmoothingEnabled = true;
                            //     iterCtx.imageSmoothingQuality = 'high';

                            //     // Set the dimensions for this iteration
                            //     iterCanvas.width = scaledImage.width * scaleFactor;
                            //     iterCanvas.height = scaledImage.height * scaleFactor;

                            //     // Draw the image on the iteration canvas with the new dimensions
                            //     iterCtx.drawImage(scaledImage, 0, 0, iterCanvas.width, iterCanvas.height);

                            //     // Update the scaled image for the next iteration or final use
                            //     scaledImage = new Image();
                            //     scaledImage.src = iterCanvas.toDataURL();
                            // }

                            // // Set the dimensions of the temporary canvas
                            // tempCanvas.width = newWidth;
                            // tempCanvas.height = newHeight;

                            // // Enable image smoothing on the temporary context
                            // tempCtx.imageSmoothingEnabled = true;
                            // tempCtx.imageSmoothingQuality = 'high';

                            // // Draw the final scaled image on the temporary canvas with the new dimensions
                            // tempCtx.drawImage(scaledImage, 0, 0, newWidth, newHeight);

                            // // Create a new Image object with the updated width
                            // const updatedImagePreview = new Image();
                            // updatedImagePreview.src = tempCanvas.toDataURL();







                            // image.width = image.width * ratio;
                            // image.height = image.height * ratio;

                            console.log('xOffset: ' + xOffset);
                            console.log('yOffset: ' + yOffset);
                            console.log('width: ' + width);
                            console.log('height: ' + height);


                            ctx_original_cropped.drawImage(image, original_x_offset, original_y_offset, image.width, image.height);


                            // ctx.imageSmoothingEnabled = false;
                             ctx.imageSmoothingQuality = 'high';

                            console.log('window.devicePixelRatio: ' + window.devicePixelRatio);


                            //var target_width = width;
                            //var target_height = height;
                           // width = target_width * window.devicePixelRatio;
                           // height = target_height * window.devicePixelRatio;
                           // xOffset = xOffset / window.devicePixelRatio;
                            //yOffset = yOffset / window.devicePixelRatio;
                           // xOffset = 0;
                           // yOffset = 0;
                            
                            var canvas_width = canvas.width;
                            var canvas_height = canvas.height;
                            canvas.width = width * window.devicePixelRatio;
                            canvas.height = height * window.devicePixelRatio;
                            canvas.style.width = `${width}px`;
                            canvas.style.height = `${height}px`;
                            width = width * window.devicePixelRatio;
                            height = height * window.devicePixelRatio;

                            console.log('xOffset: ' + xOffset);
                            console.log('yOffset: ' + yOffset);
                            console.log('width: ' + width);
                            console.log('height: ' + height);


                            ctx.drawImage(image, xOffset / window.devicePixelRatio, yOffset / window.devicePixelRatio, width, height);
                        }


                         function updateCanvasSizeAndScale() {
                             const pixelRatio = window.devicePixelRatio || 1;
                             canvas.width = canvas.clientWidth * pixelRatio;
                             canvas.height = canvas.clientHeight * pixelRatio;

                             // Reset the transformation matrix
                             ctx.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
                         }

                        
                         updateCanvasSizeAndScale();



                        $('#rotate_frame').click(function() {

                            var canvas_width = $('.select_size.active').data('canvas-width');
                            var canvas_height = $('.select_size.active').data('canvas-height');
                            var canvas_rotated_width = $('.select_size.active').data('canvas-rotated-width');
                            var canvas_rotated_height = $('.select_size.active').data('canvas-rotated-height');


                            if ($('#rotate').val() == 'true') {
                                $('#rotate').val('false');
                                // canvas.width = canvas_width;
                                // canvas.height = canvas_height;
                            } else {
                                $('#rotate').val('true');
                                // canvas.width = canvas_rotated_width;
                                // canvas.height = canvas_rotated_height;
                            }

                            fitCanvasToScreenWidth();
                            limitZoomLevel();
                            setTranslate();
                            applyFrameUrl();
                        });



                        $('.upload').click(function() {
                            // open file upload dialog
                            $('#upload_file').click();

                            // when file is selected
                            $('#upload_file').change(function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onloadend = function() {

                                    // set image src to uploaded file
                                    image.src = reader.result;

                                    image.onload = function() {
                                        aspectRatio = image.width / image.height;

                                        let canvasAspectRatio = canvas.width / canvas.height;
                                        let imageAspectRatio = image.width / image.height;

                                        let drawnImageWidth, drawnImageHeight;
                                        // If the canvas aspect ratio is larger than the image aspect ratio, set the drawn image width to the width of the canvas
                                        if (canvasAspectRatio > imageAspectRatio) {
                                            drawnImageWidth = canvas.width;
                                            drawnImageHeight = drawnImageWidth / imageAspectRatio;

                                        } else {
                                            // If the image aspect ratio is larger than the canvas aspect ratio, set the drawn image height to the height of the canvas
                                            drawnImageHeight = canvas.height;
                                            drawnImageWidth = drawnImageHeight * imageAspectRatio;
                                        }

                                        // ctx.drawImage(image, xOffset, yOffset, drawnImageWidth / zoomLevel, drawnImageHeight / zoomLevel);
                                        ctx.drawImage(image, xOffset, yOffset, drawnImageWidth, drawnImageHeight);

                                        console.log('canvasAspectRatio: ' + canvasAspectRatio);

                                        // canvas_original_cropped.width = 400;
                                        // canvas_original_cropped.height = 400;
                                        // canvas_original_cropped.width = image.width;
                                        // canvas_original_cropped.height = image.height;
                                        ctx_original_cropped.drawImage(image, 0, 0, image.width, image.height);

                                        // set #original_width and #original_height
                                        $('#original_width').val(image.width);
                                        $('#original_height').val(image.height);

                                        // hide .start_notice
                                        $('#upload').removeClass('start_here');

                                        limitZoomLevel();
                                        setTranslate();
                                    };


                                }
                                if (file) {
                                    reader.readAsDataURL(file);
                                } else {
                                    // do nothing
                                }


                            });
                        });


                        fitCanvasToScreenWidth();

                        // when screen loads or is resized
                        $(window).resize(function() {

                            fitCanvasToScreenWidth();

                        });









                        function fitCanvasToScreenWidth() {

                            // Check screen width
                            var screen_width = $(window).width();

                            var canvas_width = $('.select_size.active').data('canvas-width');
                            var canvas_height = $('.select_size.active').data('canvas-height');
                            var canvas_rotated_width = $('.select_size.active').data('canvas-rotated-width');
                            var canvas_rotated_height = $('.select_size.active').data('canvas-rotated-height');
                            var margin_top = $('.select_size.active').data('margin-top');
                            var margin_bottom = $('.select_size.active').data('margin-bottom');

                            $('.small_frame').hide();
                            $('.big_frame').show();


                            if ($('#rotate').val() == 'true') {
                                canvas_width = canvas_rotated_width;
                                canvas_height = canvas_rotated_height;
                            }

                            // If screen width is less than 501px
                            if (screen_width < 501) {
                                canvas_width = Math.round(canvas_width * 0.5);
                                canvas_height = Math.round(canvas_height * 0.5);
                                margin_top = Math.round(margin_top * 0.5);
                                margin_bottom = Math.round(margin_bottom * 0.5);
                                // Set canvas width to 100%
                                canvas.width = canvas_width;
                                canvas.height = canvas_height;
                                $('#artboard canvas').css('margin-top', margin_top + 'px');
                                $('#artboard canvas').css('margin-bottom', margin_bottom + 'px');
                                $('.small_frame').show();
                                $('.big_frame').hide();
                                return;
                            }

                            // If screen width is less than 768px
                            if (screen_width < 768) {
                                canvas_width = Math.round(canvas_width * 0.75);
                                canvas_height = Math.round(canvas_height * 0.75);
                                margin_top = Math.round(margin_top * 0.75);
                                margin_bottom = Math.round(margin_bottom * 0.75);
                                // Set canvas width to 100%
                                canvas.width = canvas_width;
                                canvas.height = canvas_height;
                                $('#artboard canvas').css('margin-top', margin_top + 'px');
                                $('#artboard canvas').css('margin-bottom', margin_bottom + 'px');
                                $('.small_frame').show();
                                $('.big_frame').hide();
                                return;
                            }

                            canvas.width = canvas_width;
                            canvas.height = canvas_height;
                            $('#artboard canvas').css('margin-top', margin_top + 'px');
                            $('#artboard canvas').css('margin-bottom', margin_bottom + 'px');



                        }






                        


                    });
                </script>

        <?php

    }
}

add_action('widgets_init', function () {
    register_widget('Canvas2Frame_Design_Widget');
});
