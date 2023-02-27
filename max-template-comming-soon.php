<?php
/*
 * Template Name: Comming Soon
 * Author: Maxenius Solutions
 */
get_header('comming-soon');
global $post;
$bg_img = get_the_post_thumbnail_url( $post->ID, 'post-thumbnail' );
// if( ! empty( get_the_post_thumbnail_url( $post->ID, 'post-thumbnail' ) ) ) {
    // $bg_img = get_the_post_thumbnail_url( $post->ID, 'post-thumbnail' );
// } else {
    $bg_img = get_template_directory_uri() . '/images/comming-soon.jpg';
// }
?>
<style type="text/css">
    .comingBanner-two{
        background-image: url(<?php echo esc_attr( $bg_img ) ?>);
        background-size: cover;
        background-color: #cfcfcf;
        background-repeat: no-repeat;
        width: 100%;
        display: flex;
        /*align-items: center;*/
        justify-content: center;
        background-position: top center !important;
        padding-top: 17.2vh;
    }
   
    @media screen and ( min-height: 800px ){
        .comingBanner-two{
            height: 100vh;
        }
    }
      html {
          overflow: unset;
          overflow-x: hidden;
      }
      /*
    @media (min-width:1200px) and (max-width:1600px) {

        }
    @media (min-width:1200px) and (max-width:1600px) {
        .coming-title-two{
            zoom: 1;
        }
    }

    @media (min-width:1600px) and (max-width:2000px) {
        .coming-title-two{
            zoom: 1.1;
        }
    }*/
    hr {
        background: #fff;
    }
    .u3-comming-soon-logo-div{
        text-align: center;
        padding-bottom: 20px;
    }
    .u3-comming-soon-logo-div > section > div > figure > a > img{
        margin-bottom: 10vh;
        /*zoom: 0.67;*/
    } 
    .coming-prints-two{
        height: 60px;
    }
    h3,
    .coming-prints-two > h2{
        color: #f2f2f2;
        font-family: 'Helvetica Thin Cond Thin';    
        letter-spacing: 4px;
        font-size: 1.47rem;
    }
    .coming-title-two h3{
        font-size: 1.4rem;
        letter-spacing: 3px;
        display: inline-block;
        width: 100%;        
    }
    .max_3u_keep_upd_email{
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #fff;
        outline: none;
        margin-right: 20px;
        color: #fff;
        font-size: 1.24rem;
        width: 60%;
        font-family: 'dubiel';
    }
    input::placeholder{
        color: #fff;
        font-size: 1.24rem;
        font-family: 'dubiel';
    }
    html {
        margin-top: 0px !important;
    }
    #max_3u_keep_me_upd_btn{
        padding: 8px 6px;
        background-color: black;
        width: 270px;
        font-family: 'Axis-Extrabold';
        color: #fff;
        letter-spacing: 1px;
        font-size: .85rem;
        border: none;
        line-height: 1;
    }
    .coming-soon-two{
        width: 100%;
        /*margin: auto;*/
    }
    h3,
    .coming-soon-two > h2{
        color: #fff;
        margin-top: 30px;
        letter-spacing: 9px;
        font-family: 'Helvetica Thin Cond Thin';
        font-size: 1.67rem;
    }
    .coming-soon-two > h2{
        margin-top: 0px;
        font-size: 2.54rem;
    }
    .coming-soon-two{
        margin-top: 40px;
        /*padding-left: 3.125rem;*/
    }
/*    .coming-title-two {
        height: 65vh;
    }*/
    .u3-comming-soon-logo-div > section.widget_media_image{
        height: 180px;
    }

    .keep-updated-two {
        max-width: 610px;
        /*margin-top: 16vh;*/
        margin-left: auto;
        margin-right: auto;
        display: flex;
        margin-bottom: 8vh;
        position: relative;
        padding-right: 2px;
        justify-content: space-between;
    }
/*    input,
    input::-webkit-input-placeholder {
        font-size: 12px;
        line-height: 1;
    }*/
    input,input::-webkit-input-placeholder{
        font-size: 1.4rem !important;
        font-family: 'dubiel' !important;
    }
    .max_u3_hr_div{
        margin-right: auto;margin-left: auto;width: 340px;background: #fff;height: 1px;
    }

    @media screen and (max-width: 1400px) {
        .comingBanner-two{
            background-position: top center;
        }
    }

    @media screen and (max-width: 767px) {
      .keep-updated-two {
        display: unset;
      }
        .comingBanner-two{
            height: 100vh;
        }
      .coming-soon-two{
        margin-bottom: 100px;
        margin-top: 20px;
      }
/*      .coming-title-two{
        zoom: 0.8;
      }*/

      .coming-prints-two > h2{
        letter-spacing: 0;
        word-spacing: 0;
      }
      .max_3u_keep_upd_email{
        margin-bottom: 30px;
        text-align: center;
        width: 220px !important;
        margin-right: 0;
        /*padding-bottom: 5px;*/
      }
      #max_3u_keep_me_upd_btn{
        width: 220px;
        /*padding-left: 10px;*/
        /*padding-right: 10px;*/
        font-size: 1.1rem;
      }
        input, input::-webkit-input-placeholder {
            font-size: 1.4rem !important;
            font-family: 'dubiel' !important;
        }
      input::placeholder{
        text-align: center;
      }
      .coming-prints-two{
        height: 40px;
      }
      .max_u3_hr_div{
        width: 220px;
      }
      .coming-prints-two > h2, .coming-soon-two > h2{
        font-size: 1.1rem;
        letter-spacing: 0.14rem;
        font-weight: 400;
      }
      .coming-prints-two > h2{
        font-size: 1rem;
      }
      .coming-soon-two > h2{
        letter-spacing: 0.5rem;
        font-weight: 800;
      }
      .tooltip {
        width: 100% !important;
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
      .tooltip .tooltiptext {    
        margin-left: 0px !important; 
        /*top: -70% !important;*/
       }
       .tooltip .tooltiptext::after {
          content: "";
          position: absolute;
          bottom: 100%;
          left: 50%;
          margin-left: -5px;
          border-width: 5px;
          border-style: solid;
          border-color: transparent transparent #fff transparent;
        }
        .tooltip .tooltiptext svg{
            /*zoom: 1.6;*/
            display: inline-block;
            position: relative;
            line-height: 0;
            float: left;
            font-size: 1.5rem;
            width: auto;
            /*margin-right: 2px;*/
            margin-left: 5px;
        }
        .tooltip .tooltiptext {
            visibility: hidden;
            width: fit-content;
            background-color: #fff;
            color: #000;
            text-align: center;
            height: 40px;
            padding-top: 8px;
            position: absolute;
            z-index: 1;
            top: 160%;
            left: 0;
            margin-left: -114px;
            box-shadow: 0 0 5px #000;
            line-height: 1.6;
            font-family: 'Open Sans';
            font-size: 0.9rem !important;
        }
        .tooltiptext > p{
            font-size: 0.6rem !important;
        }
    }

    .wp-block-image {
         margin: 0; 
    }


     @media (min-width:786px) {
/*        .comingBanner-two * {
            zoom: 1.01;
        }*/
    }

    @media (min-width:768px) {
/*        .comingBanner-two * {
            zoom: 1.081;
        }*/
        .keep-updated-two {
            /*max-width: 445px;*/
            margin-top: 19.28vh;
        }
        #max_3u_keep_me_upd_btn {
            font-size: 1.12rem;       
            width: 235px; 
            letter-spacing: 0.13rem;
            padding-right: 6px;
            padding-left: 6px;        
        }
        .wp-block-image .aligncenter{
            /*zoom: 1;*/
        }
        .coming-soon-two > h2{
            font-family: 'Helvetica Thin Cond Thin';
        }
        .u3-comming-soon-logo-div > section > div > figure > a > img {
            margin-bottom: 8vh;         
        }
        .coming-prints-two > h2{
            font-size: 2.54rem !important;
            letter-spacing: 0.2rem;
            font-weight: 400;
            padding-left: 10px;
        }
        .coming-soon-two > h2{
            letter-spacing: 0.9rem;
            padding-left: 20px;
        }
        .coming-prints-two {
            height: 80px;
        }
        .max_u3_hr_div{
            width: 460px;
        }
        h3{
            letter-spacing: 12px;
            margin-top: 30px;
        }

/*        .coming-title-two {
            height: 60.8vh;
        }*/


        .tooltip .tooltiptext {
            font-size: 12px !important;
            /*zoom: 1 !important;*/
        }

    }
/*
@media (min-width:1601px) and  (max-height:1199px){
    .coming-title-two {
        height: 61.5vh !important;
    }
}
*/
input#tnp-1 {
    width: 100%;
    margin-right: 10px;
/*    zoom: 1;*/
    height: auto;
    font-size: 14px;
    margin-left: 5px;
    line-height: 33px;
}
.tooltip {
    width: 57%;
    margin-right: 10px;
}
/*    @media screen and (max-width: 415px) {
        .coming-title-two{
            zoom: 0.6;
        }
    }*/
/*
::-webkit-validation-bubble
 
::-webkit-validation-bubble-arrow-clipper 

::-webkit-validation-bubble-arrow */
input:invalid {
  background-color: rgb(221 225 225 / 2%);
}
::-webkit-validation-bubble-message{
    background-color: #000;
} 


[data-tip] {
    position:relative;

}
[data-tip]:before {
    content:'';
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #1a1a1a;
    position:absolute;
    top:35px;
    left:25px;
    z-index:8;
    font-size:0;
    line-height:0;
    width:0;
    height:0;
}
[data-tip]:after {
    content: attr(data-tip);
    position: absolute;
    top: 45px;
    left: -40px;
    padding: 5px 8px;
    background: #fff;
    color: #000;
    z-index: 9;
    font-size: 0.85em;
    height: auto;
    line-height: 18px;
    white-space: nowrap;
    word-wrap: normal;
    border: 1px solid #000;
    font-family: 'Open Sans';    
    white-space: pre-wrap;
    font-weight: 600;
}
[data-tip]:hover:before,
[data-tip]:hover:after {
    display:block;
}



/*
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}*/

/*.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}*/

@media screen and (min-width: 768px) {
    .tooltip .tooltiptext::after {
      content: "";
      position: absolute;
      bottom: 100%;
      left: 25%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: transparent transparent #fff transparent;
    }
    .tooltip .tooltiptext svg{
        /*zoom: 1.6;*/
        display: inline-block;
        position: relative;
        line-height: 0;
        float: left;
        font-size: 1.5rem;
        width: auto;
        /*margin-right: 2px;*/
        margin-left: 5px;

    }
    .tooltip .tooltiptext {
        visibility: hidden;
        width: 520px;
        background-color: #fff;
        color: #000;
        text-align: center;
        height: 40px;
        padding-top: 8px;
        position: absolute;
        z-index: 1;
        top: 130%;
        left: 0;
        margin-left: -114px;
        box-shadow: 0 0 5px #000;
        line-height: 1.6;
        font-family: 'Open Sans';
        font-size: 0.9rem !important;
    }
}

.tooltip.hover .tooltiptext {
  visibility: visible;
  opacity: 1;
  border-radius: 5px;
}
input:-internal-autofill-selected{
    background-color: transparent;
}
form.sub_form.processing {
    opacity: 0.4;
}
.keep-updated-two.cc.tooltip {
    width: 100%;
    padding: 0;
    margin-left: auto;
    margin-right: auto;
}
</style>

    <div class="comingBanner-two">
        <div class="coming-title-two">
            <div class="u3-comming-soon-logo-div"><?php if ( is_active_sidebar('comming-soon-image-logo') ) { dynamic_sidebar('comming-soon-image-logo'); } ?></<div>
            <div class="coming-prints-two">
                <h2>AUTHORED ART PRINTS AND ORIGINAL WORKS</h2>
            </div>
            <div class="max_u3_hr_div"></div>
            <div class="coming-soon-two">
                <h2>COMING SOON</h2>
            </div>
            <?php if(isset($_GET['nm']) && $_GET['nm'] == 'confirmed'){?>
                <div class="keep-updated-two tooltip">
                    <h3>
                        <?php _e('Your subscription has been confirmed', 'newsletter'); ?>                       
                    </h3>
                </div>
            <?php
            }else{ ?>
            <form method="post"  class="sub_form">
                <div class="keep-updated-two  form_div">
                    <input type="hidden" name="nr" value="page">
                    <input type="hidden" name="nlang" value="">
                    <div class='tooltip'>
                    <input type="text" name="ne" class="max_3u_keep_upd_email tnp-email"
                    <?php /*
                    action="<?php echo site_url('?na=s'); ?>"
                    oninvalid="this.setCustomValidity('Please write a valid email address to be able to recieve updates.')"
                    onkeyup="this.setCustomValidity(' ')"
                    */ ?>
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
                    oninput="setCustomValidity(' ')"
                    onchange="try{setCustomValidity('')}catch(e){}"
                    autofocus="" 
                    autofill="" 
                    title=''
                    id="tnp-1" value="" required="" placeholder="Email">
                    <span class="tooltiptext"> <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="currentColor" d="M26.002 4H5.998A1.998 1.998 0 0 0 4 5.998v20.004A1.998 1.998 0 0 0 5.998 28h20.004A1.998 1.998 0 0 0 28 26.002V5.998A1.998 1.998 0 0 0 26.002 4ZM14.875 8h2.25v10h-2.25ZM16 24a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 16 24Z"/><path fill="none" d="M14.875 8h2.25v10h-2.25ZM16 24a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 16 24Z"/></svg> <p style="display:inline-block;font-size: 1.01rem;">Please write a valid email address to be able to recieve updates.</p></span>
                    </div>
                    <button type="submit" id="max_3u_keep_me_upd_btn">KEEP ME UPDATED</button>
                </div>
            </form>
        <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
function check() {
  var ok = true;
  const regLast = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

  if (!regLast.test(document.getElementById("tnp-1").value)) {
    ok = false;
  }

  return ok;
}

const inp = document.querySelector('input');
const form = document.querySelector('form');

form.addEventListener('submit', event => {
    event.preventDefault();
  if (!check(inp.value)) {
    
  } else {
    delete inp.parentElement.dataset.tip;
  }
});

    jQuery('input, select, textarea').on("invalid", function(e) {
        e.preventDefault();
        jQuery('.tooltip').addClass('hover');
        //inp.parentElement.dataset.tip = 'Please write a valid email address to be able to recieve updates.';
    });
    jQuery('input, select, textarea').on("valid keyup", function(e) {
        e.preventDefault();
        jQuery('.tooltip').removeClass('hover');
        // delete inp.parentElement.dataset.tip;
    });

    jQuery( "form" ).on( "submit", function(e) {
 
    var dataString = jQuery(this).serialize();
     
    // alert(dataString); return false;
 
    jQuery.ajax({
      type: "POST",
      url: "<?php echo site_url('?na=s'); ?>",
      data: dataString,
      beforeSend: function( xhr ) {
        jQuery(".sub_form").addClass("processing");
        jQuery(".sub_form button").attr("disabled", true);
      },
      success: function (response) {
        jQuery(".sub_form").removeClass("processing");
        jQuery(".sub_form button").html("NOTED !", true);
        jQuery(".sub_form .max_3u_keep_upd_email").val("");
        // jQuery(".sub_form button").attr("disabled", false);

        // jQuery(".sub_form").after("<div class='keep-updated-two cc tooltip'></div>");
        // jQuery(document).find(".cc").append("<h3>Your subscription has been confirmed</h3>");
        // jQuery(".sub_form").hide();
        // jQuery(".keep-updated-two").html("<h3>Your subscription has been confirmed</h3>");

      }
    });
 
    e.preventDefault();
  });
    </script><!-- 
<link rel="stylesheet" id="max-custom-css-font-css" href="https://fonts.googleapis.com/css?family=Open+Sans%3A600&amp;ver=5.9.1" media="all"> -->
<?php get_footer('comming-soon'); ?>