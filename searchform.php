<form role="search" class="form-inline search-form" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    <div class="form-group">
			<input class="form-control col-xs-12" type="search" value="<?php the_search_query(); ?>" placeholder="Search..." name="s" id="s" />
	    </div>
		<button class="btn btn-default" type="submit" id="searchsubmit" value="Search">Search</button>
</form>