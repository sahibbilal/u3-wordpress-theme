<?php
/*
 * Template Name: Comtact us
 * Author: Maxenius Solutions
 */
get_header();
?>
<div class="max-u3-info-w--70">
    <div class="contact-title">
        <h1>Contact Us</h1>
    </div>
    <div class="contact-form-body">
        <div class="contact-form">
            <div class="contact-form-inner-title">
                <h1>Contact us by email</h1>
            </div>
            <form method="post">
                <div class="contact-form-input">
                    <label for="fname">Regarding:</label><br>
                    <select>
                        <option> Order problems</option>
                    </select>
                </div>
                <div class="contact-form-input m--20">
                    <label for="w3review">Your message:</label><br>
                    <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                </div>
                <div class="contact-form-input m--20">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" value="">
                </div>
                <div class="contact-btn-wrap">
                    <input type="submit" value="Submit message" class="contact-submit-btn">
                </div>
            </form>
            <div class="contact-p">
                <p>He was born in Pitaru, Dâmboviţa County, Wallachia now called Romania. He created the historical composition Mihai scăpând stindardul , which he presented to the Wallachian Prince Barbu Ştirbei.</p>
            </div>
        </div>
        <div class="chat-container">
            <h1 class="chat-container-title">
                Try our direct chat
            </h1>
            <div class="chat-box">
                <div class="chat-box-title">
                    <h1>you are contacting u3 support</h1>
                </div>
                <div class="chat-box-body">
                    <div class="chat-body-problem">
                        order-problems
                    </div>
                    <div class="chat-body-problem">
                        payment problems
                    </div>
                    <div class="chat-body-problem">
                        refund request
                    </div>
                    <div class="chat-body-problem">
                        other
                    </div>
                </div>
                <div class="chat-box-footer">
                    <div class="chat-image">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/images/sending-button.png">
                    </div>
                </div>
            </div>
            <div class="contact-p">
                <p>Available Monday to Friday 2pm - 7pm</p>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>