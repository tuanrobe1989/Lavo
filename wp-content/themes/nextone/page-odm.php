<?php
/* Template Name: ODM Page */
get_header();
$page_id = get_the_id();
$page_title = get_the_title();
$banner_intro_text = get_field('banner_intro_text');

?>

<section id="odm-banner" class="odm-banner lazy goteffect"
  data-bg="<?php echo imageEncode('/images/odm/background1.webp'); ?>">
  <div class="container odm-banner__container">
    <h1 class="odm-banner__title goteffect lazy" data-bg="<?php echo imageEncode('/images/odm/logo.png'); ?>">Dịch vụ
      gia công <br><strong>ODM uy tín</strong> </h1>
    <div class="odm-banner__desc goteffect">
      <?php echo $banner_intro_text; ?>
    </div>
    <a href="#" class="odm-banner__CTA goteffect">tư vấn ngay</a>
  </div>
</section>

<?php
  $services_title = get_field('services_title');
  $services_image = get_field('services_image');
  $services_image_desc = get_field('services_image_desc');
  $services_description = get_field('services_description');
  if($services_title):
?>

<section id="odm-services" class="odm-services lazy goteffect"
  data-bg="<?php echo imageEncode('/images/odm/background2.webp'); ?>">
  <div class="container odm-services__container">
    <h2 class="odm-services__title goteffect"><?php echo $services_title; ?></h2>
    <div class="odm-services__wrapper">
      <div class="odm-services__info goteffect">
        <div class="odm-services__info__desc">
          <?php echo $services_description; ?>
        </div>
        <div class="odm-services__info__list">
          <?php
          if( have_rows('services_items')):
            $detailInfo = '';
            $tabId = 0;
            while(have_rows('services_items')): the_row();
            $item_image = get_sub_field('icon');
            $item_desc = get_sub_field('description');
            $image = get_sub_field('image');
            $image_desc = get_sub_field('image_desc');
        ?>
          <div class="odm-services__info__item" data-tab-id="<?php echo $tabId;  ?>">
            <img src="<?php echo imageEncode('/images/odm/noicon1.png'); ?>" data-src="<?php echo $item_image; ?>"
              alt="ODM" title="ODM" class="odm-services__info__item__img lazy">
            <p class="odm-services__info__item__desc">
              <?php echo $item_desc; ?>
            </p>
          </div>
          <?php
          $tabId++;
          if($image && $image_desc):
          ob_start();
          ?>
          <div class="odm-services__detail-item">
            <img src="<?php echo imageEncode('/images/odm/nosideImg1.jpg'); ?>" data-src="<?php echo $image; ?>"
              alt="ODM" title="ODM" class="odm-services__detail-item__img lazy">
            <div class="odm-services__detail-item__desc">
              <?php echo $image_desc; ?>
            </div>
          </div>
          <?php
              $detailInfo .= ob_get_clean();
            endif;          
            endwhile;
          endif;
        ?>
        </div>
      </div>
      <div class="odm-services__detail goteffect">
        <div class="odm-services__detail-list  owl-carousel owl-theme">

          <?php echo $detailInfo; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  endif;
?>

<?php
  $processes_title = get_field('processes_title');
  $processes_image = get_field('processes_image');
  if($processes_title):
?>

<section id="odm-processes" class="odm-processes goteffect">
  <h2 class="odm-processes__title lazy goteffect" data-bg="<?php echo imageEncode('/images/odm/background3.webp'); ?>">
    <?php echo $processes_title; ?> </h2>
  <div class="odm-processes__round">
    <div class="container odm-processes__wrapper">
      <div class="odm-processes__img goteffect">
        <img src="<?php echo imageEncode('/images/odm/noleftImage.png'); ?>" data-src="<?php echo $processes_image; ?>"
          alt="ODM" title="ODM" class="odm-processes__img__img lazy">
      </div>
      <div class="odm-processes__info goteffect">
        <?php 
        if(have_rows('processes_items')): 
      ?>
        <ul class="odm-processes__list">
          <?php 
          while(have_rows('processes_items')): the_row();
          $item_image = get_sub_field('icon');
          $item_step = get_sub_field('step');
          $item_desc = get_sub_field('description');
        ?>
          <li class="odm-processes__item lazy" data-bg="<?php echo $item_image; ?>">
            <span class="odm-processes__item__step"><?php echo $item_step; ?></span>
            <p class="odm-processes__item__desc"><?php echo $item_desc; ?></p>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php 
        endif; 
      ?>
      </div>
    </div>
  </div>
</section>

<?php
  endif;
?>

<?php
  $successes_title = get_field('successes_title');
  $successes_image1 = get_field('successes_image1');
  $successes_description1 = get_field('successes_description1');
  $successes_image2 = get_field('successes_image2');
  $successes_description2 = get_field('successes_description2');
  if($successes_title):
?>

<section id="odm-sucesses" class="odm-sucesses lazy goteffect"
  data-bg="<?php echo imageEncode('/images/odm/background4.webp');?>">
  <div class="container odm-sucesses__container">
    <img src="<?php echo imageEncode('/images/odm/nosucessLogo.png'); ?>"
      data-src="<?php echo imageEncode('/images/odm/sucessLogo.png'); ?>" alt="ODM" title="ODM"
      class="odm-sucesses__logo lazy goteffect">
    <h2 class="odm-sucesses__title goteffect"><?php echo $successes_title;?></h2>
    <?php 
      if(have_rows('processes_items')): 
    ?>
    <ul class="odm-sucesses__list goteffect">
      <?php 
      while(have_rows('successes_items')): the_row();
      $item_image = get_sub_field('icon');
      $item_title = get_sub_field('title');
      $item_desc = get_sub_field('description');
    ?>
      <li class="odm-sucesses__item">
        <img src="<?php echo imageEncode('/images/odm/noT1.png'); ?>" data-src="<?php echo $item_image; ?>" alt="ODM"
          title="ODM" class="odm-sucesses__item__icon lazy">
        <h3 class="odm-sucesses__item__title"><?php echo $item_title; ?></h3>
        <p class="odm-sucesses__item__desc"><?php echo $item_desc; ?></p>
      </li>
      <?php
      endwhile;
    ?>
    </ul>
    <?php 
      endif; 
    ?>
    <div class="odm-sucesses__wrapper">
      <div class="odm-sucesses__left-img goteffect">
        <a href="#" class="odm-sucesses__left-img__link">
          <img src="<?php echo imageEncode('/images/odm/noleftImage1.png'); ?>"
            data-src="<?php echo $successes_image1; ?>" alt="ODM" title="ODM" class="odm-sucesses__left-img__img lazy">
        </a>
      </div>
      <div class="odm-sucesses__info goteffect">
        <?php echo $successes_description1; ?>
      </div>
    </div>
    <div class="odm-sucesses__wrapper-certification">
      <div class="odm-sucesses__right-img goteffect">
        <div href="#" class="odm-sucesses__right-img__wrapper">
          <img src="<?php echo imageEncode('/images/odm/noirhgtImg.png'); ?>"
            data-src="<?php echo $successes_image2; ?>" alt="ODM" title="ODM" class="odm-sucesses__right-img__img lazy">
        </div>
      </div>
      <div class="odm-sucesses__info-certification goteffect">
        <?php echo $successes_description2; ?>
      </div>
    </div>
  </div>
</section>

<?php
  endif;
?>

<?php 
  if(have_rows('advisory_items')): 
?>

<section id="odm-advisory" class="odm-advisory lazy goteffect"
  data-bg="<?php echo imageEncode('/images/odm/background5.webp');?>">
  <div class="container odm-advisory__container">
    <div class="odm-advisory__list">
      <?php 
      while(have_rows('advisory_items')): the_row();
      $item_background_image = get_sub_field('background_image');
      $item_title = get_sub_field('title');
      $item_desc = get_sub_field('description');
      $item_link = get_sub_field('link');
    ?>
      <a href="<?php echo $item_link;?>" class="odm-advisory__item lazy odm-advisory__item01 goteffect"
        data-bg="<?php echo $item_background_image; ?>">
        <h3 class="odm-advisory__item__title"><?php echo $item_title;?></h3>
        <div class="odm-advisory__item__desc">
          <?php echo $item_desc;?>
        </div>
        <span class="odm-advisory__item__CTA">LIÊN HỆ TƯ VẤN NGAY</span>
      </a>
      <?php
      endwhile;
    ?>
    </div>
  </div>
</section>

<?php
  endif;
?>


<section id="odm-register" class="odm-register lazy goteffect"
  data-bg="<?php echo imageEncode('/images/odm/background6.webp');?>">
  <div class="container odm-register__container">
    <div class="odm-register__wrapper goteffect">
      <div class="odm-register__icons">
        <img src="<?php echo imageEncode('/images/odm/nomainLogo.png');?>"
          data-src="<?php echo imageEncode('/images/odm/mainLogo.png');?>" alt="ODM" title="ODM"
          class="odm-register__icons__logo lazy">
        <div class="odm-register__icons__social-icons">
          <img src="<?php echo imageEncode('/images/odm/nosocialIcon.png');?>"
            data-src="<?php echo imageEncode('/images/odm/facebookIcon.png');?>" alt="Facebook" title="Facebook"
            class="lazy">
          <img src="<?php echo imageEncode('/images/odm/nosocialIcon.png');?>"
            data-src="<?php echo imageEncode('/images/odm/socialIcon.png');?>" alt="Facebook" title="Facebook"
            class="lazy">
        </div>
      </div>
      <form action="" method="POST" class="odm-register__register-form">
        <h2 class="odm-register__register-form__title">ĐĂNG KÝ</h2>
        <div class="odm-register__register-form__register-wrapper"><input type="text"
            class="odm-register__register-form__register-input" placeholder="Email:">
        </div>
        <div class="odm-register__register-form__register-wrapper"><input type="text"
            class="odm-register__register-form__register-input" placeholder="Password:">
        </div>
        <input type="submit" value="ĐĂNG KÝ" class="odm-register__register-form__submit">
      </form>
    </div>
  </div>
</section>

<?php
get_footer();
?>