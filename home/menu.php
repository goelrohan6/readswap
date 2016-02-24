<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon  menu_items gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">

								<li><a   href="../index.php" class="gn-icon  menu_items gn-icon-home">Home</a></li>
								<li><a   href="../societies.php?id=Technical"  class="gn-icon  menu_items gn-icon-societies">Societies</a>
                                <li><a   href="../events.php" class="gn-icon  menu_items gn-icon-calendar">Events</a>
								<ul class="gn-submenu">
                                        <li><a   href="http://www.urja2015.com/" class="gn-icon menu_items  gn-icon-rocket">URJA</a></li>
                                        </ul></li>
						<!--		<li><a   href="../soon.php" class="gn-icon  menu_items gn-icon-food">Hungr</a></li> -->
								<li><a   href="../articles.php" class="gn-icon  menu_items gn-icon-blog">Thaparlogs </a></li>
								<li><a   href="../pictures.php" class="gn-icon  menu_items gn-icon-pictures">Albums </a></li>
							<!--	<li><a   href="../store.php" class="gn-icon menu_items  gn-icon-cart">T-Store</a></li>
								<li><a   href="../soon.php" class="gn-icon menu_items  gn-icon-rocket">Merchandise</a></li> -->
									 <?php if(isset($_SESSION['rollnum'])){		?>
								<li><a   href="../logout.php" class="gn-icon  menu_items gn-icon-exit">Log Out</a></li>
								<?php } ?>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>

				<li class="hero"><a class="codrops-icon codrops-icon-prev" href="http://thaparexpress.in"><span>THAPAR EXPRESS</span></a></li>
				<li />

			</ul>
			<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57016004-1', 'auto');
  ga('send', 'pageview');

</script>
