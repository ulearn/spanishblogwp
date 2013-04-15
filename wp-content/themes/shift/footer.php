    <?php stag_content_end(); ?>

    <?php stag_footer_before(); ?>

    <?php if(is_sidebar_active('footer')): ?>
    <div class="footer-outer">
      <!-- BEGIN .footer -->
      <footer class="footer" role="contentinfo">
        <?php stag_footer_start(); ?>

        <div class="grids">
          <?php dynamic_sidebar('sidebar-footer'); ?>
        </div>

        <?php stag_footer_end(); ?>
        <!-- END .footer -->
      </footer>
    </div>
    <?php endif; ?>

    <div class="footer-copyright-wrap">
      <footer class="footer-copyright">
        <?php echo stripcslashes(stag_get_option('general_footer_text')); ?>
      </footer>
    </div>

    <?php stag_footer_after(); ?>

  <?php stag_body_end(); ?>
  <?php wp_footer(); ?>
  </body>
</html>