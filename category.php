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

				<div class="archive-head m_description">
					<div class="archive-lead">CATEGORY</div>
					<h1 class="archive-title m_category"><?php the_archive_title(); //一覧ページ名を表示 ?></h1><!-- /archive-title -->
					<div class="archive-description">
						<p>
							<?php the_archive_description(); //説明を表示 ?>
						</p>
					</div><!-- /archive-description -->
				</div><!-- /archive-head -->

				<?php
				//記事があればentriesブロック以下を表示
				if (have_posts() ) : ?>

				<!-- entries -->
				<div class="entries m_horizontal">
					<?php
					//記事数ぶんループ
					while ( have_posts() ) :
					the_post(); ?>

					<!-- entry-item -->
					<a href="<?php the_permalink();?>" class="entry-item">
						<!-- entry-item-img -->
						<div class="entry-item-img">
							<?php
								if (has_post_thumbnail() ) {
								// アイキャッチ画像が設定されてれば大サイズで表示
								the_post_thumbnail('large');
								} else {
								// なければnoimage画像をデフォルトで表示
								echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
								}
								?>
						</div><!-- /entry-item-img -->

						<!-- entry-item-body -->
						<div class="entry-item-body">
							<div class="entry-item-meta">
								<?php
									// カテゴリー１つ目の名前を表示
									$category = get_the_category();
									if ($category[0] ) {
									echo '<div class="entry-item-tag">' . $category[0]->cat_name . '</div><!-- /entry-item-tag -->';
									}
								?>
								<time class="entry-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /entry-item-published -->
							</div><!-- /entry-item-meta -->
							<h2 class="entry-item-title"><?php the_title();?></h2><!-- /entry-item-title -->
							<div class="entry-item-excerpt">
								<?php the_excerpt(); //抜粋を表示 ?>
							</div><!-- /entry-item-excerpt -->
						</div><!-- /entry-item-body -->
					</a><!-- /entry-item -->
					<?php
					endwhile;
					?>
				</div><!-- /entries -->
				<?php endif; ?>

				<?php if (paginate_links() ) : //ページが1ページ以上あれば以下を表示 ?>
				<!-- pagenation -->
				<div class="pagenation">
				<?php
				echo
				paginate_links(
				array(
				'end_size' => 0,
				'mid_size' => 1,
				'prev_next' => true,
				'prev_text' => '<i class="fas fa-angle-left"></i>',
				'next_text' => '<i class="fas fa-angle-right"></i>',
				)
				);
				?>
				</div><!-- /pagenation -->
				<?php endif; ?>


			</main><!-- /primary -->

		<!-- sidebar -->
		<?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

<!-- footer-menuから下をget_footer()に置き換える -->
<?php get_footer(); ?>
