<form role="search" class="form-inline search-form" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
	  <div class="col-lg-12">
	    <div class="input-group">
			<input class="form-control" type="search" value="<?php the_search_query(); ?>" placeholder="Search..." name="s" id="s" />
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit" id="searchsubmit" value="Search"><i class="icon icon-search"></i></button>	     
			</span>
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	</div>
</form>