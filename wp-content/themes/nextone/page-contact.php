<?php
/* Template Name: Contact Page */
?>
<?php get_header(); ?>
<section class="contact__banner goteffect lazy" data-bg="<?php echo CUS_PATH ?>/images/contact-bg.png">
    <div class="container">
        <h1 title="<?php the_title() ?>"><img src="<?php echo CUS_PATH ?>/images/contact-title.png" class="contact__banner__tit goteffect"/></h1>
    </div>
</section>
<section class="contact__content goteffect">
    <div class="container">
        <div class="contact__content__flex">
            <div class="contact__content__item goteffect one">
                <h2 class="contact__content__item--tit"><?php _e('trụ sở','lavo')?></h2>
                <p><strong><?php _e('địa chỉ','lavo')?></strong>: 11 Nguyễn Sơn, P. Phú Thạnh, Q. Tân Phú, TP. HCM</p>
                <p><strong><?php _e('điện thoại','lavo')?></strong>: <a href="tel:02839735599" title="<?php _e('phone number','lavo')?>">028 3973 5599</a> – <a href="tel:39736699" <?php _e('phone number','lavo')?>>3973 6699</a>
                <p><strong>HOTLINE</strong>: <a href="tel:1900779926" title="<?php _e('hotline','lavo')?>">1900 77 99 26</a>.</p>
                <p><strong>Fax</strong>: 028 3973 5959.</p>
                <p><strong>Email</strong>: <a href="mailto:lavo@lavo.com.vn">lavo@lavo.com.vn</a></p>
                <p><strong>Website</strong>: <a href="<?php bloginfo('home') ?>">www.lavo.com.vn</a></p>
            </div>
            <div class="contact__content__item goteffect two">
                <h2 class="contact__content__item--tit"><?php _e('nhà máy','lavo')?></h2>
                <p><strong><?php _e('địa chỉ','lavo')?></strong>: Lô 22, Đường TrungTâm, KCN Tân Tạo, Q. Bình Tân, TP.HCM.</p>
                <p><strong><?php _e('điện thoại','lavo')?></strong>: <a href="tel:02839735599" title="<?php _e('phone number','lavo')?>">028 3973 5599</a> – <a href="tel:39736699" <?php _e('phone number','lavo')?>>3973 6699</a>
                <p><strong>HOTLINE</strong>: <a href="tel:1900779926" title="<?php _e('hotline','lavo')?>">1900 77 99 26</a>.</p>
                <p><strong>Fax</strong>: 028 3973 5959.</p>
            </div>
        </div>
    </div>
</section>
<section class="contact__form goteffect">
    <div class="container">
        <div class="contact__form__flex">
            <form class="contact__form__item contact__form__action goteffect" action="" method="post">
                <label for="contact__form__name"><?php _e('họ tên','lavo')?> *</label>
                <input type="input" name="contact__form__name" id="contact__form__name" value="" placeholder="<?php _e('nhập họ tên của bạn','lavo')?>" class="contact__form__input"/>
                <label for="contact__form__email"><?php _e('email','lavo')?> *</label>
                <input type="input" name="contact__form__email" id="contact__form__email" value="" placeholder="<?php _e('nhập email của bạn','lavo')?>" class="contact__form__input"/>
                <label for="contact__form__phone"><?php _e('số điện thoại','lavo')?> *</label>
                <input type="input" name="contact__form__phone" id="contact__form__phone" value="" placeholder="<?php _e('nhập số phone của bạn','lavo')?>" class="contact__form__input"/>
                <label for="contact__form__message"><?php _e('nội dung','lavo')?></label>
                <textarea name="contact__form__message" id="contact__form__message" placeholder="<?php _e('nhập nội dung','lavo')?>" class="contact__form__input"></textarea>
                <button type="submit" class="common__button contact__form__submit"><?php _e('gửi ngay','lavo')?></button>
                <input type="hidden" name="book__nonce" class="book__nonce" value="<?php echo wp_create_nonce('pushmail_nonce') ?>"/>
            </form>
            <div class="contact__form__item contact__form__girlround goteffect">
                <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo CUS_PATH ?>images/contact-girl.png" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="lazy contact__form__girl"/>
            </div>
            <span class="contact__form__line goteffect"></span>
        </div>
    </div>
</section>
<div class="contact__map goteffect">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3991492178475!2d106.63107021535622!3d10.780710062061196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ea63e92e6e3%3A0x21b8df227cfce489!2sLAVO%20CORPORATION!5e0!3m2!1sen!2s!4v1598285750302!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<?php get_footer(); ?>