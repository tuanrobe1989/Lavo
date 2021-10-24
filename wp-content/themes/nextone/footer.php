<?php if ( is_active_sidebar( 'sidebar-footer' ) ) { ?>
<footer class="footer">
  <div class="container">
    <div class="footer__flex">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
  </div>
</footer>
<?php } ?>
<?php wp_footer(); ?>
<!-- Facebook Pixel Code -->
<script>
! function(f, b, e, v, n, t, s) {
  if (f.fbq) return;
  n = f.fbq = function() {
    n.callMethod ?
      n.callMethod.apply(n, arguments) : n.queue.push(arguments)
  };
  if (!f._fbq) f._fbq = n;
  n.push = n;
  n.loaded = !0;
  n.version = '2.0';
  n.queue = [];
  t = b.createElement(e);
  t.async = !0;
  t.src = v;
  s = b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t, s)
}(window, document, 'script',
  'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1433094983774216');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1433094983774216&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->
</body>

</html>