
<div class="wrap">

    <?php screen_icon(); ?>

    <form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">

        <?php settings_fields($plugin_id . '_options'); ?>
        
        <h2>App Banners &raquo; Settings</h2>
        <p>Enter your nine-digit app ID below. To find your app ID from the <a href="http://linkmaker.itunes.apple.com/us/" target="_blank">iTunes Link Maker</a>, type the name of your app in the Search field, and select the appropriate country and media type. In the results, find your app and select iPhone App Link in the column on the right. Your app ID is the nine-digit number in between id and ?mt.</p>
        <table class="widefat">
            <thead>
                   <tr>
                    <th><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
                </tr>
            </tfoot>
            <tbody>                
                <tr>
                    <td>
                        <label for="APP_BANNERS_apple_id">
                            <p>Apple App ID</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_apple_id" value="<?php echo get_option('APP_BANNERS_apple_id'); ?>" /></p>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="APP_BANNERS_android_id">
                            <p>Android App ID</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_android_id" value="<?php echo get_option('APP_BANNERS_android_id'); ?>" /></p>
                        </label>
                    </td>
                </tr>                
                <tr>
                    <td>
                        <label for="APP_BANNERS_author">
                            <p>App Author</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_author" value="<?php echo get_option('APP_BANNERS_author'); ?>" /></p>
                        </label>
                    </td>
                </tr>                
                <tr>
                    <td>
                        <label for="APP_BANNERS_price">
                            <p>App Price</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_price" value="<?php echo get_option('APP_BANNERS_price'); ?>" /></p>
                        </label>
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="APP_BANNERS_title">
                            <p>App Title</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_title" value="<?php echo get_option('APP_BANNERS_title'); ?>" /></p>
                        </label>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label for="APP_BANNERS_icon">
                            <p>App Icon</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_icon" value="<?php echo get_option('APP_BANNERS_icon'); ?>" /></p>
                        </label>
                    </td>
                </tr>  
                
                <tr>
                    <td>
                        <label for="APP_BANNERS_button">
                            <p>Text on Button</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_button" value="<?php echo get_option('APP_BANNERS_button'); ?>" /></p>
                        </label>
                    </td>
                </tr>  
                
                <tr>
                    <td>
                        <label for="APP_BANNERS_daysHidden">
                            <p>Duration in DAYS to hide the banner after being closed (0 = always show banner)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_daysHidden" value="<?php echo get_option('APP_BANNERS_daysHidden'); ?>" /></p>
                        </label>
                    </td>
                </tr>  
                
                <tr>
                    <td>
                        <label for="APP_BANNERS_daysReminder">
                            <p>Duration in DAYS to hide the banner after 'VIEW' is clicked (0 = always show banner)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_daysReminder" value="<?php echo get_option('APP_BANNERS_daysReminder'); ?>" /></p>
                        </label>
                    </td>
                </tr>                  
            </tbody>
        </table>

    </form>
</div>