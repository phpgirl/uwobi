<?php  if($page['contact']):?>
    <?php print render($page['contact']) ?>
<?php endif; ?>
<!-- Modal -->
<?php  if($page['contact_form']):?>
<div class="modal fade left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php print render($page['contact_form']) ?>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Modal -->
<footer>
    <?php  if($page['footer']):?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php print render($page['footer']) ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</footer>
