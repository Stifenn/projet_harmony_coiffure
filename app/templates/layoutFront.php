<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Elegance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/css_theme_front/normal.css')?>">
  <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/css_theme_front/style.css')?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/css_theme_front/animation.css')?>">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjS2ZDG_eOKlXNUeGob9gvoxe3EdMRXVA&signed_in=true"
        async defer></script>
  <script src="<?= $this->assetUrl('js/jquery-2.2.0.min.js') ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('js/script.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
  <script>
    if (/mobile/i.test(navigator.userAgent)) document.documentElement.className += ' w-mobile';
  </script>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script><![endif]-->
</head>
<body>
  <div class="fix-header" id="home">
    <div class="w-container">
      <div class="w-nav" data-collapse="medium" data-animation="default" data-duration="400"></div>
    </div>
  </div>
  <div class="fixed-header">
    <div class="w-container container">
      <div class="w-row">

       <!--///////////////////////////////////////////////////////
       // Logo section 
       //////////////////////////////////////////////////////////-->


        <div class="w-col w-col-3 logo">
          <a href="#"><img class="logo" src="<?= $this->assetUrl('css/images/logo.png')?>" alt="Elegance"></a>
        </div>

        <!--///////////////////////////////////////////////////////
       // End Logo section 
       //////////////////////////////////////////////////////////-->

        <div class="w-col w-col-9">

       <!--///////////////////////////////////////////////////////
       // Menu section 
       //////////////////////////////////////////////////////////-->


          <div class="w-nav navbar" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1">
            <div class="w-container nav">
              <nav class="w-nav-menu nav-menu" role="navigation">
        
                <a class="w-nav-link menu-li" href="#home">ACCEUIL</a>
                <a class="w-nav-link menu-li" href="#about">PRESENTATION</a>
                <a class="w-nav-link menu-li" href="#service">SERVICES</a>
                <a class="w-nav-link menu-li"href="#portfolio">PORTFOLIO</a>
                <a class="w-nav-link menu-li"href="#commentaire">LIVRE D'OR</a>
                <a class="w-nav-link menu-li" href="#contact">CONTACT</a>
              </nav>
              <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
              </div>
            </div>
          </div>


          <!--///////////////////////////////////////////////////////
       // End Menu section 
       //////////////////////////////////////////////////////////-->


        </div>
      </div>
    </div>
  </div>

  <!--///////////////////////////////////////////////////////
       //  Slider section 
       //////////////////////////////////////////////////////////-->


  <div class="slidersection">
    <div class="sp-slideshow">
      
        <input id="button-1" type="radio" name="radio-set" class="sp-selector-1" checked="checked" />
        <label for="button-1" class="button-label-1"></label>
        
        <input id="button-2" type="radio" name="radio-set" class="sp-selector-2" />
        <label for="button-2" class="button-label-2"></label>
        
        <input id="button-3" type="radio" name="radio-set" class="sp-selector-3" />
        <label for="button-3" class="button-label-3"></label>
        
        <input id="button-4" type="radio" name="radio-set" class="sp-selector-4" />
        <label for="button-4" class="button-label-4"></label>
        
        <input id="button-5" type="radio" name="radio-set" class="sp-selector-5" />
        <label for="button-5" class="button-label-5"></label>
        
        <label for="button-1" class="sp-arrow sp-a1"></label>
        <label for="button-2" class="sp-arrow sp-a2"></label>
        <label for="button-3" class="sp-arrow sp-a3"></label>
        <label for="button-4" class="sp-arrow sp-a4"></label>
        <label for="button-5" class="sp-arrow sp-a5"></label>
        
        <div class="sp-content">
          <div class="sp-parallax-bg"></div>
          <ul class="sp-slider clearfix">
          <?=$this->section('slider');?>
            
          </ul>
        </div><!-- sp-content -->
        
      </div><!-- sp-slideshow -->
  </div>


<!--///////////////////////////////////////////////////////
       // End slider section 
       //////////////////////////////////////////////////////////-->



<!--///////////////////////////////////////////////////////
       // About section 
       //////////////////////////////////////////////////////////-->


  <div class="about-parlex" id="about">
    <section class="parlex7-back">
      <div class="w-container">
        <div id="about-animation">
        <div class="wrap">
          <div class="about">
            <h1 class="about-heading">Le Salon</h1>
            <div class="about-text">Qui sommes nous ?</div>
            <div class="sepreater"></div>
          </div>
          <p class="about-des">We are Elegance. We create stunning identities for our clients that people fall in love with.&nbsp;
            <br>Whether it's an app icon, a logo for a hot startup, or just an illustration, we'll work hard until you can't help but say "WOW!". 
          </p>
           <?=$this->section('about')?>
        </div>
      </div>
      </div>
    </section>
  </div>


<!--///////////////////////////////////////////////////////
       // End about section 
       //////////////////////////////////////////////////////////-->


<!--///////////////////////////////////////////////////////
       // Service section 
       //////////////////////////////////////////////////////////-->


  <section class="service-parlex" id="service">
    <section class="parlex-back">
      <div class="w-container">
        <div class="wrap">
          <div class="service-combo">
            <div class="services">
              <h1 class="service-heading">SERVICES</h1>
              <div class="services-text">WHAT WE DO?</div>
              <div class="sepreater service"></div>
            </div>
            <div class="services-text">“ THE BEST RESULTS ARE OBTAINED BY TASKING THE RIGHT PEOPLE TO THE RIGHT PROJECT ”
              <br>We understand that everybody has their unique strengths and we put that knowledge to use by assembling the most efficient team possible for your project. You know your business better than anyone. Your insights, combined with our skills
              and creativity, will result in branding and marketing that truly stand out. We’re ready to get started.</div>
            <?=$this->section('tarif')?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>

<!--///////////////////////////////////////////////////////
       // End Service section 
       //////////////////////////////////////////////////////////-->


<!--///////////////////////////////////////////////////////
       // debut Produit section 
       //////////////////////////////////////////////////////////-->

 <div class="portfolio-parlex" id="portfolio">
    <div class="parlex5-back">
      <div class="w-container">
        <div class="wrap">
          <div class="portfolio">
            <h1 class="portfolio-heading">NOS PRODUIT</h1>
            <div class="sepreater"></div>
          </div>
          <p class="porfolio-paragraph">THE BEST RESULTS ARE OBTAINED BY TASKING THE RIGHT PEOPLE TO THE RIGHT PROJECT
            <br>We do what we love. Our clients love what we do.</p>
            <div class="container demo-1">
      <ul class="grid cs-style-1">
      <?=$this->section('produit')?>
      </ul>
    </div><!-- /container -->
        </div>
      </div>
    </div>
  </div>

<!--///////////////////////////////////////////////////////
       // End Produit section 
       //////////////////////////////////////////////////////////-->




<!--///////////////////////////////////////////////////////
       // Team section 
       //////////////////////////////////////////////////////////-->

<!--  <div class="team-parlex" id="team">
    <div class="parlex5-back">
      <div class="w-container">
        <div class="wrap">
          <div class="team">
            <h1 class="team">TEAM</h1>
            <div class="sepreater team-sep"></div>
          </div>
          <div class="team-text">
            <p class="team-text-para">We are Elegance. We offer creative solutions for every web-based project you can think of.&nbsp;
              <br>We take pride in our work and everything we create is executed with precision and love.</p>
          </div>
          <div class="w-row team-member">
            <div class="w-col w-col-4">
              <div class="team-section">
                <div class="team-image">
                  <img class="team-img" src="images/team/image1.png" alt="52dd1e57e64ce6cb200004f3_image1.png">
                </div>
                <div class="team-des">
                  <h4 class="team-name">JANE ANISTON</h4>
                  <div class="team-name-des">Creative Director</div>
                </div>
                <div class="team-social">
                  <div class="w-clearfix social-section">
                    <a href="https://www.facebook.com/"><img class="social" src="images/social/Facebook.png" alt="52dd249c929b601f5400054c_Facebook.png"></a>
                    <a href="https://www.twitter.com/"><img class="social" src="images/social/Twitter.png" alt="52dd24f2929b601f54000551_Twitter.png"></a>
                    <a href="https://www.linkedin.com/"><img class="social" src="images/social/Linkedin.png" alt="52dd2672e64ce6cb2000053a_Linkedin.png"></a>
                    <a href="https://plus.google.com/"><img class="social" src="images/social/Google-plus.png" alt="52dd26a55b54031d540005af_Google-plus.png"></a>
                    <a href="https://www.rss.com/"><img class="social" src="images/social/RSS.png" alt="52dd26d25b54031d540005b4_RSS.png"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4">
              <div class="team-section">
                <div class="team-image">
                  <img class="team-img" src="images/team/image2.png" alt="52dd1edfe64ce6cb200004fb_image2.png">
                </div>
                <div class="team-des">
                  <h4 class="team-name">JOHN DOE</h4>
                  <div class="team-name-des">Lead Developer</div>
                </div>
                <div class="team-social">
                  <div class="w-clearfix social-section">
                    <a href="https://www.facebook.com/"><img class="social" src="images/social/Facebook.png" alt="52dd249c929b601f5400054c_Facebook.png"></a>
                    <a href="https://www.twitter.com/"><img class="social" src="images/social/Twitter.png" alt="52dd24f2929b601f54000551_Twitter.png"></a>
                    <a href="https://www.linkedin.com/"><img class="social" src="images/social/Linkedin.png" alt="52dd2672e64ce6cb2000053a_Linkedin.png"></a>
                    <a href="https://plus.google.com/"><img class="social" src="images/social/Google-plus.png" alt="52dd26a55b54031d540005af_Google-plus.png"></a>
                    <a href="https://www.rss.com/"><img class="social" src="images/social/RSS.png" alt="52dd26d25b54031d540005b4_RSS.png"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4">
              <div class="team-section">
                <div class="team-image">
                  <img class="team-img" src="images/team/image3.png" alt="52dd1efcad165eca20000539_image3.png">
                </div>
                <div class="team-des">
                  <h4 class="team-name">TANE NISTON</h4>
                  <div class="team-name-des">Graphic Designer</div>
                </div>
                <div class="team-social">
                  <div class="w-clearfix social-section">
                    <a href="https://www.facebook.com/"><img class="social" src="images/social/Facebook.png" alt="52dd249c929b601f5400054c_Facebook.png"></a>
                    <a href="https://www.twitter.com/"><img class="social" src="images/social/Twitter.png" alt="52dd24f2929b601f54000551_Twitter.png"></a>
                    <a href="https://www.linkedin.com/"><img class="social" src="images/social/Linkedin.png" alt="52dd2672e64ce6cb2000053a_Linkedin.png"></a>
                    <a href="https://plus.google.com/"><img class="social" src="images/social/Google-plus.png" alt="52dd26a55b54031d540005af_Google-plus.png"></a>
                    <a href="https://www.rss.com/"><img class="social" src="images/social/RSS.png" alt="52dd26d25b54031d540005b4_RSS.png"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

<!--///////////////////////////////////////////////////////
       // End Team section 
       //////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////
       // Contact section 
       //////////////////////////////////////////////////////////-->

  <div class="contact-parlex" id="commentaire">
    <div class="parlex8-back">
      <div class="w-container">
      
        <div class="wrap">
          <div class="contact-div">
            <h1 class="contact-heading">COMMENTAIRES</h1>
            <div class="sepreater"></div>
          </div>
          <p class="contact-para">Thanks for taking the time to contact us!
            <br>We do our best to respond to quickly, it could take us 1-2 business days to get back to you. Feel free to say hello!</p>
          <div class="w-form w-col w-col-4">
            <?= $this->section('Ajout_Commentaire');?>
        </div>
          <div class="w-form w-col w-col-8">
            <?= $this->section('commentaire');?>
          </div>
      </div>
      </div>
      <?=$this->section('google') ?>
    <div class="contact-parlex" id="contact">
      <div class="parlex8-back">
        <div class="w-container">
          <div class="w-row contact-col">
            <div class="w-col w-col-4 contact-col2">
              <div>
                 <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                         <div class="hi-icon hi-icon-mail">Partners</div>
                      </div>
                <h4 class="contact-col-head">Contactez Nous</h4>
              </div>
              <div>
                <div class="contact-col-text">general: office@elegance.com
                <br/> </div>
              </div>
              </div>
            <div class="w-col w-col-4 contact-col1">
              <div>
                <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                  <div class="hi-icon hi-icon-earth">Partners</div>
                </div>
                <h4 class="contact-col-head">Venez-Nous Voir</h4>
              </div>
              <div>
                <div class="contact-col-text">7 rue de la liberté
                  <br>54490 Piennes</div>
              </div>
            </div>
            <div class="w-col w-col-4 contact-col3">
              <div>
                <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                         <div class="hi-icon hi-icon-mobile">Partners</div>
                      </div>
                <h4 class="contact-col-head">Appellez-Nous</h4>
              </div>
              <div>
                <div class="contact-col-text-bar-last">03 82 21 75 78
                <br/> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--///////////////////////////////////////////////////////
       // End Contact section 
       //////////////////////////////////////////////////////////-->

   
      
     
     
<!--///////////////////////////////////////////////////////
       // Footer section 
       //////////////////////////////////////////////////////////-->  

  <div class="footer-parlex">
    <div class="parlex9-back">
      <div class="w-container">
        <div class="wrap">
          <div class="footer-social">
            <div class="fotter-social-wrap">
              <a href="https://www.facebook.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Facebook.png')?>" alt="52dd249c929b601f5400054c_Facebook.png"></a>
              <a href="https://www.twitter.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Twitter.png')?>" alt="52dd24f2929b601f54000551_Twitter.png"></a>
              <a href="https://plus.google.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Google-plus.png')?>" alt="52dd26a55b54031d540005af_Google-plus.png"></a>
              <a href="https://www.blogger.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Blogger.png')?>" alt="52de52e7b6d2171f78000414_Blogger.png"></a>
              <a href="https://www.digg.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Digg.png')?>" alt="52de53174702a71e780003c3_Digg.png"></a>
              <a href="https://www.pinterest.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Pinterest.png')?>" alt="52de533c5d3566c1430003e9_Pinterest.png"></a>
              <a href="https://www.flicker.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Flickr.png')?>" alt="52de535f1b42bfc24300049e_Flickr.png"></a>
              <a href="https://www.vimeo.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Vimeo.png')?>" alt="52de537cb6d2171f7800041c_Vimeo.png"></a>
              <a href="https://www.myspace.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Myspace.png')?>" alt="52de53954702a71e780003c5_Myspace.png"></a>
              <a href="https://www.stumbleupon.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Stumbleupn.png')?>" alt="52de53c0b6d2171f7800041e_Stumbleupn.png"></a>
              <a href="https://www.tumblr.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Tumblr.png')?>" alt="52de54021b42bfc2430004a3_Tumblr.png"></a>
              <a href="https://www.youtube.com/"><img class="fotter-social" src="<?=$this->assetUrl('css/images/social/Youtube.png')?>" alt="52de54495d3566c14300040a_Youtube.png"></a>
            </div>
          </div>
          <div>
            <div class="fotter-text"><p class="fotter-quote">“ THE LIGHT WITHIN US BOWS TO THE LIGHT WITHIN YOU. ”</p>
              <p class="copyright-area">©2014 ELEGANCE. ALL RIGHTS RESERVED,TEMPLATE BY&nbsp;<a href="https://carinotech.com" title="Carino Technologies" target="_blank">CARINO TECHNOLOGIES</a><br />
              MODIFIE PAR Stéphane Duché, Benoit Gaschen, Santaniello Benjamin
              </p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

       <!--///////////////////////////////////////////////////////
       // End Footer section 
       //////////////////////////////////////////////////////////-->

  <script type="text/javascript" src="<?= $this->assetUrl('js/js_theme_front/jquery.js')?>"></script>
  <script type="text/javascript" src="<?= $this->assetUrl('js/js_theme_front/normal.js')?>"></script>
  <script type="text/javascript" src="<?= $this->assetUrl('js/js_theme_front/jquery-1.10.2.min.js')?>"></script>
  <script type="text/javascript" src="<?= $this->assetUrl('js/js_theme_front/carousels.js')?>"></script>
  <script type="text/javascript" src="<?= $this->assetUrl('js/js_theme_front/slider-modernizr.js')?>"></script>
  <script src="<?= $this->assetUrl('js/js_theme_front/classie.js')?>"></script>
  <script src="<?= $this->assetUrl('js/js_theme_front/portfolio-effects.js')?>"></script>
  <script src="<?= $this->assetUrl('js/js_theme_front/toucheffects.js')?>"></script>
  <script src="<?= $this->assetUrl('js/js_theme_front/modernizr.js')?>"></script>
  <script src="<?= $this->assetUrl('js/js_theme_front/animation.js')?>"></script>

</body>
</html>