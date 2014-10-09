<?php get_header(); ?>
<div class="container-fluid">
	<toaster-container toaster-options="{'time-out': 3090, 'close-button':true}"></toaster-container>
    <div top-Menu></div>
    <div ng-view></div>
</div>
<?php get_footer(); ?>
