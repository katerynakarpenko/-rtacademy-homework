		<footer>
				<nav  class="nav-footer">
					<ul class=menu>
						<li><a href="/rtacadamy_homework/07-21">Home</a></li>
							<?php

							if( !empty( $websiteMenuItems ) ) {
								foreach( $websiteMenuItems as $item ) {
									echo( '<li><a href="' . $item->getHref() . '">' . $item->getTitle() . '</a></li>' );
								}
							}
							?>
					</ul>
				</nav>
				<p class="copyright">Designed & Developed by <a href="">Code Supply Co.</a></p>

				<div class="nav-login">
					<h3>User Area</h3>

					<ul class='user-area-login'>
					<?php

						if( is_active_sidebar( 'footer-middle-sidebar' ) )
						{
							dynamic_sidebar( 'footer-middle-sidebar' );     // виводимо сайдбар, ім'я визначене у functions.php
						}

						?>
					</ul>
				</div>

				<div class="nav-login">
					<?php

					if( is_active_sidebar( 'footer-right-sidebar' ) )
					{
						dynamic_sidebar( 'footer-right-sidebar' );          // виводимо сайдбар, ім'я визначене у functions.php
					}

				?>
				</div>

		</footer>
		<?php wp_footer() ?>
		<script src="./index.js"></script>   
	</body>
</html>