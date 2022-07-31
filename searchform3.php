<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <div class="form-group">
    	<input type="hidden" name="post_type[]" value="bunch_faqs">
        <input type="search" name="s" placeholder="<?php esc_html_e('Search Your Answer', 'consultox'); ?>">
        <button type="submit"><span class="icon fa fa-search"></span></button>
    </div>
</form>
