 <?php $k==0; while ( have_posts() ) : the_post(); $k++;
  if($k==1 || $k==5 || $k==3 ||  $k==9 || $k==11|| $k==10|| $k==15) { get_template_part( 'template-parts/posts/content'); }
  if($k==4 || $k==2 || $k==6|| $k==8 || $k==12){ get_template_part( 'template-parts/posts/content', 'photo');}
  if($k==7 || $k==14){ get_template_part( 'template-parts/posts/content', 'photo-big');}
  if($k==13){ get_template_part( 'template-parts/posts/content', 'photo-big-white');}
  endwhile; ?>
       


