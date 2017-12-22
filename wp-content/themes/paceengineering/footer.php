<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
$setting = new Setting(28);
?>
<section id="blue-footer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-7">
                        <h4>Pace Engineering Ltd <span>Providing total engineering solutions to industry</span></h4>
                        <div class="row">
                            <div class="col-xs-12 col-lg-8">
                                <div class="map-wrapper">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3098.586128459798!2d174.1226786158156!3d-39.04755487954777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d14504ad9cc7d93%3A0x8d0a202b1bb0124f!2s85%2F95+Katere+Rd%2C+Waiwhakaiho%2C+New+Plymouth+4312!5e0!3m2!1sen!2snz!4v1513242358235" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-4">
                                <address><?=$setting->getAddress()?></address>
                                <div>Tel: <a href="tel:<?=formatPhoneNumber($setting->getPhoneNumber())?>"><?=$setting->getPhoneNumber()?></a></div>
                                <div>Fax: <?=$setting->getFaxNumber()?></div>
                                <a href="<?=$setting->getFacebookLink()?>" class="fa fa-facebook-square"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-5 lets-talk-col">
                        <h4>Lets talk!</h4>
                        <?=$setting->letsTalkFooter()?>
                        <div class="buttons-wrapper">
                            <a href="<?=get_page_link(17)?>" class="btn btn-default">General<br />Enquiry</a><a href="<?=get_page_link(15)?>" class="btn btn-default">Contact<br />Team Member</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer-15"></div>
                        <h4>Partnering with</h4>
                        <div class="partners-wrapper"><?=partnerLogos()?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="distributors-section">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Authorised Distributors</h2>
                        <div class="distributors-wrapper"><?=distributorLogos()?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="copyright">
                    &copy; Copyright Pace Engineering Ltd <?=date('Y')?>. Website by <a href="http://www.designgarage.co.nz/" target="_blank">Design Garage</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>