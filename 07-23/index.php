<?php
	declare( strict_types=1 );

	spl_autoload_register(
    function( $class ) {
		require_once( __DIR__ . '/' . str_replace( '\\', '/', $class ) . '.php' );
    }
	);

	// запуск сесії з параметрами
	\lib\Session::start();

	$postsModels = new \lib\models\PostsModel();
	$posts       = $postsModels->getList();	

	$postsTotalCount   = $postsModels->getTotalCount();
	// головне меню
	$websiteMenuModel  = new \lib\models\WebsiteMenuModel();
	$websiteMenuItems  = $websiteMenuModel->getList();

	require_once('./includes/header.php');
?>
<main class="container">
	<section class="all-posts container">

	<?php

		if( !empty( $posts ) ) {
			foreach( $posts as $post ) {
				/** @var \lib\entities\Post $post */
				?>
				<article class="post">
					<a class="travel" href="<?= $post->getUrl() ?>" class="cover"><?= $post->getCover()->getImgTag( $post->getCover()->getListImgAttributes() ) ?></a>
					<a href="<?= $post->getUrl() ?>" class="title"><h2><?= $post->getTitle() ?></h2></a>
					<time class="time" datetime="<?= $post->getPublishDate('c') ?>"><?= $post->getPublishDate() ?></time>
					<p class="text"><a href="<?= $post->getUrl() ?>" class="description"><?= $post->getDescription() ?></a></p>
					<a href="<?= $post->getUrl() ?>" class="read-more-post">Read more</a>
				</article>
				<?php
			}

				// TODO: <div class="article-empty"></div> коли не кратне 3 в останньому ряді
		}
		else {
				// коли відсутні записи/пости
				?>
				<div class="no-articles">No articles</div>
				<?php
		}

		?>
		</section>

		<?php

	// перевірка на умову коли може бути кнопка "Load More"
	if( !empty( $postsTotalCount > \lib\models\PostsModel::COUNT_PER_PAGE ) ) {

		?>
			<a href="#" data-current-page="2" data-max-pages="<?= intval( ceil( $postsTotalCount / \lib\models\PostsModel::COUNT_PER_PAGE ) ) ?>" class="btn-main" id="downloadMore">
				Download more
			</a>
		<?php

	}

		?>
</main>




<?php 
	require_once('./includes/footer.php');
?>