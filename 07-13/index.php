<?php
	declare( strict_types=1 );

	spl_autoload_register(
    function( $class ) {
		require_once( __DIR__ . '/' . str_replace( '\\', '/', $class ) . '.php' );
    }
	);

	$postsModels = new \lib\models\PostsModel();
	$posts       = $postsModels->getList();	
	require_once('./includes/header.php');
?>

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
				<a href="<?= $post->getUrl() ?>" class="read-more button btn-post">Read more</a>
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
			
	<div class="button-wrapper">
			<button class="read-more button btn-main" id="downloadMore" type="get">
				Download more articles
			</button>
	</div>
	</section>


<?php 
	require_once('./includes/footer.php');
?>