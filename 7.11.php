<?php
	declare( strict_types=1 );
	
	spl_autoload_register(
		function ($class) {
			require_once (__DIR__.'/classes/'.$class.'.php');
		}
	);
	
	//authors
	$author1 = new Author();
	$author1->setId(1);
	$author1->setFirstName('Nick');
	$author1->setLastName('Popovich');

	$author2 = new Author();
	$author2->setId(2);
	$author2->setFirstName('Helga');
	$author2->setLastName('Odds');

	$author3 = new Author();
	$author3->setId(3);
	$author3->setFirstName('Jeoff');
	$author3->setLastName('Castelucci');

	//categories
	$category1 = new Category();
	$category1->setId( 1 );
	$category1->setTitle( 'Holland' );
	$category1->setAlias( 'Holland' );

	$category2 = new Category();
	$category2->setId( 2 );
	$category2->setTitle( 'Spain' );
	$category2->setAlias( 'Spain' );

	$category3 = new Category();
	$category3->setId( 3 );
	$category3->setTitle( 'Slovenia' );
	$category3->setAlias( 'Slovenia' );

	// Post + Cover 1
	$cover1 = new Cover( '01', 'AMSTERDAM' );

	$post1 = new Post();
	$post1->setId( 1 );
	$post1->setTitle( 'BEST NEIGHBORHOODS IN AMSTERDAM: WHERE TO STAY DURING YOUR VISIT' );
	$post1->setAlias( 'best-neighborhoods-amsterdam' );
	$post1->setDescription( 'I first went to Amsterdam in 2006 as part of my grand backpacking tour of Europe' );
	$post1->setAuthor( $author1 );
	$post1->setPublishDate( '2021-10-09 11:11:00' );
	$post1->setCategory( $category1 );
	$post1->setCover( $cover1 );

	var_dump( $post1 );

	// Post + Cover 2
	$cover2 = new Cover( '02', 'Madrid' );

	$post2 = new Post();
	$post2->setId( 2 );
	$post2->setTitle( 'Best Neighborhoods in Madrid: Where to Stay During Your Visit' );
	$post2->setAlias( 'best-neighborhoods-madrid' );
	$post2->setDescription( 'Ernest Hemingway said that Madrid is the most Spanish of Spanish cities' );
	$post2->setAuthor( $author2 );
	$post2->setPublishDate( '2021-10-09 10:51:00' );
	$post2->setCategory( $category2 );
	$post2->setCover( $cover2 );

	var_dump( $post2 );

	// Post + Cover 3
	$cover3 = new Cover( '03', 'SLOVENIA' );

	$post3 = new Post();
	$post3->setId( 3 );
	$post3->setTitle( 'SLOVENIA WAS A STUNNING SURPRISE' );
	$post3->setAlias( 'slovenia-travel' );
	$post3->setDescription( 'Slovenia has been on my list of places to visit for many years' );
	$post3->setAuthor( $author3 );
	$post3->setPublishDate( '2021-10-09 17:50:00' );
	$post3->setCategory( $category3 );
	$post3->setCover( $cover3 );

	var_dump( $post3 );
?>