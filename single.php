<!-- header-navまでをget_header()に置き換える -->
<?php get_header(); ?>
	<!-- content -->
	<div id="content">
		<div class="inner">
			<!-- primary -->
			<main id="primary">
				<!-- breadcrumb -->
				<div class="breadcrumb">
				<?php bcn_display(); //BreadcrumbNavXTのパンくずを表示するための記述 ?>
				</div><!-- /breadcrumb -->
				<?php
				if ( have_posts() ) :
				while ( have_posts() ) :
				the_post();
				?>
				<!-- entry -->
				<article class="entry">
					<!-- entry-header -->
					<div class="entry-header">
						<?php
						// カテゴリー１つ目の名前を表示
						$category = get_the_category();
						if ( $category[0] ) : ?>
						<div class="entry-label"><a href="<?php esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo $category[0]->cat_name; ?></a></div><!-- /entry-item-tag -->
						<?php endif; ?>
						<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->
						<!-- entry-meta -->
						<div class="entry-meta">
						<time class="entry-published" datetime="<?php the_time( 'c' ); ?>">公開日 <?php the_time( 'Y/n/j' ); ?></time>
						<?php if ( get_the_modified_time( 'Y-m-d' ) !== get_the_time( 'Y-m-d' ) ) : ?>
						<time class="entry-updated" datetime="<?php the_modified_time( 'c' ); ?>">最終更新日 <?php the_modified_time( 'Y/n/j' ); ?></time>
						<?php endif; ?>
						</div><!-- /entry-meta -->
						<!-- entry-img -->
						<div class="entry-img">
							<?php
							if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'large' );
							}
							?>
						</div><!-- /entry-img -->
					</div><!-- /entry-header -->
					<!-- entry-body -->
					<div class="entry-body">
						<?php
						//本文の表示
						the_content(); ?>
						<?php
						//改ページを有効にするための記述
						wp_link_pages(
						array(
						'before' => '<nav class="entry-links">',
						'after' => '</nav>',
						'link_before' => '',
						'link_after' => '',
						'next_or_number' => 'number',
						'separator' => '',
						)
						);
						?>
					</div><!-- /entry-body -->
					<?php echo do_shortcode('[btn link="https://tokyofreelance.jp/30days-trial-3rd-vol10/" ] デイトラ３はこちら[/btn]'); ?>
					<!-- entry-tag-items -->
					<div class="entry-tag-items">
					<div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
						<!--タグを取得する独自関数-->
						<?php $post_tags = get_the_tags(); ?>
					</div><!-- /entry-tag-items -->

					<!-- entry-related -->
					<div class="entry-related">
						<div class="related-title">関連記事</div>

							<?php if( has_category() ) {
							$post_cats = get_the_category();
							$cat_ids = array();
							//所属カテゴリーのIDリストを作っておく
							foreach($post_cats as $cat) {
							$cat_ids[] = $cat->term_id;
							}
							}

							$myposts = get_posts( array(
							'post_type' => 'post', // 投稿タイプ
							'posts_per_page' => '8', // ８件を取得
							'post__not_in' => array( $post->ID ),// 表示中の投稿を除外
							'category__in' => $cat_ids, // この投稿と同じカテゴリーに属する投稿の中から
							'orderby' => 'rand' // ランダムに
							) );
							if( $myposts ): ?>
							<div class="related-items">
								<?php foreach($myposts as $post): setup_postdata($post);?>
								<a class="related-item" href="<?php the_permalink(); ?>">
								<div class="related-item-img">
								<?php
								if (has_post_thumbnail() ) {
								// アイキャッチ画像が設定されてればミディアムサイズで表示
								the_post_thumbnail('medium');
								} else {
								// なければnoimage画像をデフォルトで表示
								echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
								}
								?>
							</div>
							<div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
							</a><!-- /related-item -->
							<?php endforeach; wp_reset_postdata(); ?>
						</div><!-- /related-items -->
						<?php endif; ?>
					</div><!-- /entry-related -->

				</article> <!-- /entry -->

				<?php
				endwhile;
				endif;
				?>
			</main><!-- /primary -->

			<!-- sidebar -->
			<?php get_sidebar(); ?>


		</div><!-- /inner -->
	</div><!-- /content -->

<!-- footer-menuから下をget_footer()に置き換える -->
<?php get_footer(); ?>
