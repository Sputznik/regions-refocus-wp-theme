
    </main> <!-- end of main section  -->
    <footer>
      <div class="container">
        <?php do_action( 'rgnrfs_sidebar', 'rgnrfs-footer-sidebar' ); ?>
      </div>
      <div class="scroll-top">
        <button class="back-to-top" aria-label="Back to top">
          <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="currentColor"><path d="M450.001-180.001v-485.077L222.154-437.232 180.001-480 480-779.999 779.999-480l-42.153 42.768-227.847-227.846v485.077h-59.998Z"></path></svg>
        </button>
      </div>
    </footer>
    <?php get_template_part('partials/search-form-modal'); ?>
  </div> <!-- end of #site  -->
<?php wp_footer(); ?>
</body>
</html>
