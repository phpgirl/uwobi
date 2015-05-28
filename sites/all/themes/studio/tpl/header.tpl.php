<!-- Header -->
<?php global $base_url; ?>
<?php
if (isset($node->field_header_style['und'][0]['value']))
    {
        $header_style = $node->field_header_style['und'][0]['value'];
    } else {
        $header_style = theme_get_setting('header_style', 'studio');
        if(empty($header_style))
        $header_style = 'header1';
    }
?>
<?php if ($header_style == 'header1') {?>
<header class="header">
    <!-- container -->
    <!-- flat-mega-menu class -->
    <div class="flat-mega-menu">
        <?php if($logo){ ?>
        <a class="logo" href="<?php print $base_url; ?>" title="<?php print $site_name; ?>">
            <img src="<?php print $logo; ?>" alt="Logo" class="logo">
        </a>
        <?php } ?>
        <!-- mobile click button to show menu -->
        <label for="mobile-button"> <i class="fa fa-bars"></i> </label>
        <input id="mobile-button" type="checkbox">
        <?php  if($page['main_menu']):?>
        <?php print render($page['main_menu']) ?>
        <?php endif; ?>
        <?php  if($page['menu_right']):?>
        <ul class="menu-right">
            <?php print render($page['menu_right']) ?>
        </ul>
        <?php endif; ?>
    </div>
    <!-- flat-mega-menu class -->
</header>
<!-- Slide -->
<?php if ($page['section_home']): ?>
<?php print render($page['section_home']) ;?>
<?php endif; ?>
<?php } elseif ($header_style == 'header2'){ ?>
<div class="transparent-header">
    <header class="header">
        <!-- container -->
        <!-- flat-mega-menu class -->
        <div class="flat-mega-menu">
            <?php if($logo){ ?>
            <a class="logo" href="<?php print $base_url; ?>" title="<?php print $site_name; ?>">
                <img src="<?php print $logo; ?>" alt="Logo" class="logo">
            </a>
            <?php } ?>
            <!-- mobile click button to show menu -->
            <label for="mobile-button"> <i class="fa fa-bars"></i> </label>
            <input id="mobile-button" type="checkbox">
            <?php  if($page['main_menu']):?>
            <?php print render($page['main_menu']) ?>
            <?php endif; ?>
            <?php  if($page['menu_right']):?>
            <ul class="menu-right">
                <?php print render($page['menu_right']) ?>
            </ul>
            <?php endif; ?>
        </div>
        <!-- flat-mega-menu class -->
    </header>
</div>
<!-- Slide -->
<?php if ($page['section_home']): ?>
<?php print render($page['section_home']) ;?>
<?php endif; ?>
<?php } elseif ($header_style == 'header3') {?>
<header class="header-2">
    <!-- container -->
    <section class="header-social">
        <div class="container">
            <div class="row">
                <?php
                $contact_header = theme_get_setting('contact_header', 'studio');
                if (!empty($contact_header)) {
                ?>
                <div class="col-md-5">
                    <?php print theme_get_setting('contact_header', 'studio'); ?>
                </div>
                <?php } ?>
                <?php if ($page['social_header_right']): ?>
                <div class="col-md-7">
                    <?php print render($page['social_header_right']) ;?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <div class="top-menu">
        <div class="flat-mega-menu">
            <?php if($logo){ ?>
            <a class="logo" href="<?php print $base_url; ?>" title="<?php print $site_name; ?>">
                <img src="<?php print $logo; ?>" alt="Logo" class="logo">
            </a>
            <?php } ?>
            <!-- mobile click button to show menu -->
            <label for="mobile-button"> <i class="fa fa-bars"></i> </label>
            <input id="mobile-button" type="checkbox">
            <?php  if($page['main_menu']):?>
            <?php print render($page['main_menu']) ?>
            <?php endif; ?>
            <?php  if($page['menu_right']):?>
            <ul class="menu-right">
                <?php print render($page['menu_right']) ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</header>
<!-- Slide -->
<?php if ($page['section_home']): ?>
<?php print render($page['section_home']) ;?>
<?php endif; ?>

<?php } else { ?>
<!-- Slide -->
<?php if ($page['section_home']): ?>
<?php print render($page['section_home']) ;?>
<?php endif; ?>
<!-- Header -->
<header class="header-slideshow">
    <div class="flat-mega-menu">
        <?php if($logo){ ?>
        <a class="logo" href="<?php print $base_url; ?>" title="<?php print $site_name; ?>">
            <img src="<?php print $logo; ?>" alt="Logo" class="logo">
        </a>
        <?php } ?>
        <!-- mobile click button to show menu -->
        <label for="mobile-button"> <i class="fa fa-bars"></i> </label>
        <input id="mobile-button" type="checkbox">
        <?php  if($page['main_menu']):?>
        <?php print render($page['main_menu']) ?>
        <?php endif; ?>
        <?php  if($page['menu_right']):?>
        <ul class="menu-right">
            <?php print render($page['menu_right']) ?>
        </ul>
        <?php endif; ?>
    </div>
</header>
<?php } ?>
<!-- Header -->
