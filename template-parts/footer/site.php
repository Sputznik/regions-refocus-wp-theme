<footer class="site-footer">

  <!-- Main footer area -->
  <div class="footer-top">
    <div class="footer-inner">

      <!-- Logo -->
      <div class="footer-logo">
        <?php 
        $footer_logo = get_theme_mod('regions_refous_footer_logo');

        if ($footer_logo) {
        echo '<img src="' . esc_url($footer_logo) . '" alt="Footer Logo">';
        }
        ?>
      </div>

      <!-- Contact info -->
      <div class="footer-contact">
        <h4>Contact Us</h4>
        <p>Email: <a href="mailto:act@regionsrefous.in">act@regionsrefous.in</a></p>
        <p>Address: E-106, Ground Floor, Kalkaji, New Delhi</p>
        <p>Phone: <a href="tel:0114106887">011-4106887</a></p>
      </div>

      <!-- Social icons -->
      <div class="footer-social">
        <a href="#" class="social instagram" aria-label="Instagram">📷</a>
        <a href="#" class="social linkedin" aria-label="LinkedIn">in</a>
      </div>

    </div>
  </div>

  <!-- Bottom bar -->
  <div class="footer-bottom">
    <p>
      Copyright &copy; <?php echo date('Y'); ?> Regions Refous Foundation |
      Type Regions Refous is a trading name of Regions Refous Foundation Pvt. Ltd, a Section-8 non-profit company registered under the Companies Act, 2013.
      CIN: U85100DL2015NPL276633. | Website by Sputznik
    </p>
  </div>

</footer>
