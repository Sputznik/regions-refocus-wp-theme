<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php wp_title();?></title>
    <?php wp_head();?>
  </head>
  <body>
    <main id="page" class="mb-20 sm:m-0 lg:min-h-screen" data-v-7ba5bd90="">
      <div class="page-container text-center" data-v-7ba5bd90="">
        <h1 class="text-9xl font-bold my-16 text-gray">404</h1>
        <h2 class="text-4xl mb-4">Ah! You broke the internet!</h2>
        <p class="font-thin text-lg">Just kidding... what you are looking for couldn't be found.</p>
        <p class="font-thin text-lg">Please try a new search or click <a style="text-decoration:underline;" href="<?php echo esc_url(home_url('/')); ?>">here</a> to head home. </p>
      </div>
    </main>
  </body>
</html>
<?php wp_footer();?>
