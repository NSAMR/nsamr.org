<div class="wrap">
<div style='background: white none repeat scroll 0% 0%; height: 100%; margin-top: 5px; border-radius: 15px; min-height: 450px; box-sizing: border-box; margin-left: auto; margin-right: auto; width: 98%; padding: 1%;display: table;'>

<?php echo "<h2 class='acx_csma_page_h2'>" . __( 'Display Variables', 'coming-soon-maintenance-mode-from-acurax' ) . "</h2>"; ?>

<div id="acx_csma_form">
<?php acx_csma_display_variables(); ?>
</div> <!-- acx_csma_form -->
<div id="acx_csma_sidebar">
<?php acx_csma_hook_function('acx_csma_hook_sidebar_widget'); ?>
</div> <!-- acx_csma_sidebar -->
</div>
</div>