<?php
/**
 * Template Name: Single Listing 
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="jumbotron jumbotron-fluid listing-hero">
  <div class="container">
    <h1 class="display-4">Staff</h1>
  </div>
</div>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="col-lg-4">
          <div class="card">
            <?php $staff = assemble_staff_member_from_post($post); ?>
            <img src="<?php echo $staff['headshot']['url']; ?>" alt="" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title"><?php echo $staff['full_name']?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $staff['position']?></h6>
              <?php if($staff['moton_resident_scholar'] === TRUE):?>
              <span class="badge badge-pill badge-primary mt-3">Moton Resident Scholar</span>
              <?php endif;?>
              <p class="card-text mt-3">
              <a href=""><i class="fa fa-phone"></i> <?php echo $staff['phone']?></a> <br>
              <a href=""><i class="fa fa-envelope"></i> <?php echo $staff['email']?></a>
              </p>
              <a href="<?php echo $staff['permalink']; ?>" class="btn btn-primary">Read Bio</a>
            </div>
          </div>
          </div>
        <?php endwhile; // end of the loop. ?>
        </div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>