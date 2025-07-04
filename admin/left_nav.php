<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Auction Admin</a>
                <a class="navbar-brand hidden" href="./">Reverse Unico Auction</a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
					$menuselect="";
					if(basename($_SERVER['PHP_SELF'])=="list_product_category.php" || basename($_SERVER['PHP_SELF'])=="manage_product_category.php"){
						$menuselect="active";
					}
					?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_product_category.php"> <i class="menu-icon fa fa-tag"></i>Product Category</a>
                    </li>
					<?php
					$menuselect="";
					if(basename($_SERVER['PHP_SELF'])=="list_product_step_1.php" || basename($_SERVER['PHP_SELF'])=="list_product_step_2.php" || basename($_SERVER['PHP_SELF'])=="manage_product.php"){
						$menuselect="active";
					}
					?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_product_step_1.php"> <i class="menu-icon fa fa-tag"></i>Products</a>
                    </li>
					<?php
					$menuselect="";
					if(basename($_SERVER['PHP_SELF'])=="list_reverse_auction_step_1.php" || basename($_SERVER['PHP_SELF'])=="list_reverse_auction_step_2.php" || basename($_SERVER['PHP_SELF'])=="list_reverse_auction_step_3.php"){
						$menuselect="active";
					}
					?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_reverse_auction_step_1.php"> <i class="menu-icon fa fa-tag"></i>All Auctions</a>
                    </li>
					<?php
					$menuselect="";
					if(basename($_SERVER['PHP_SELF'])=="list_ended_auction_step_1.php" || basename($_SERVER['PHP_SELF'])=="list_ended_auction_step_2.php" || basename($_SERVER['PHP_SELF'])=="list_ended_auction_step_3.php" || basename($_SERVER['PHP_SELF'])=="list_ended_auction_step_4.php"){
						$menuselect="active";
					}
					?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_ended_auction_step_1.php"> <i class="menu-icon fa fa-tag"></i>Ended Auctions</a>
                    </li>
					<?php
					$menuselect="";
					if(basename($_SERVER['PHP_SELF'])=="list_ongoing_auction_step_1.php" || basename($_SERVER['PHP_SELF'])=="list_ongoing_auction_step_2.php" || basename($_SERVER['PHP_SELF'])=="list_ongoing_auction_step_3.php"){
						$menuselect="active";
					}
					?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_ongoing_auction_step_1.php"> <i class="menu-icon fa fa-tag"></i>Ongoing Auctions</a>
                    </li>
					<?php
					$menuselect="";
					if(basename($_SERVER['PHP_SELF'])=="list_upcoming_auction_step_1.php" || basename($_SERVER['PHP_SELF'])=="list_upcoming_auction_step_2.php" || basename($_SERVER['PHP_SELF'])=="list_upcoming_auction_step_3.php"){
						$menuselect="active";
					}
					?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_upcoming_auction_step_1.php"> <i class="menu-icon fa fa-tag"></i>Upcoming Auctions</a>
                    </li>
					<li>
                        <a href="../logout_process.php"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
                    </li>
				</ul>
            </div>
        </nav>
    </aside>