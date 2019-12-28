<?php

$theme_name       = 'raten';
$api_url          = 'http://raten.mcdir.ru/moy/index.php';



function raten_check_license() {

    $license_verify = get_option('license_raten_verify');
    $license_error  = get_option('license_raten_error');

    if (!empty($license_verify) && empty($license_error)) {
        //TODO: проверка на истечение лицензии
    } else {
        exit('<p style="text-align: center;font-size:20px;">Необходимо активировать лицензию в разделе Настройки - Лицензия</p>');
    }
}


/**
 * Создаем страницу настроек темы
 */
add_action('admin_menu', 'revelation_admin_menu');
function revelation_admin_menu(){
    add_options_page( 'Лицензия', 'Лицензия', 'manage_options', 'revelation', 'revelation_settings_display' );
}

function revelation_settings_display(){
    ?>
    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>
        <?php  $license_verify = get_option('license_raten_verify');$revelation_options = get_option('revelation_options');
        $license_error  = get_option('license_raten_error');?>

        <form action="options.php" method="POST">
            <?php
            settings_fields( 'option_group' );     // скрытые защитные поля
            do_settings_sections( 'revelation_page' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
            submit_button();
            ?>
        </form>
    </div>
    <?php
}



/**
 * Регистрируем настройки.
 * Настройки будут храниться в массиве, а не одна настройка = одна опция.
 */
add_action('admin_init', 'plugin_settings');
function plugin_settings(){
    // параметры: $option_group, $option_name, $sanitize_callback
    register_setting( 'option_group', 'revelation_options', 'sanitize_callback' );

    // параметры: $id, $title, $callback, $page
    add_settings_section( 'section_id', 'Основные настройки', '', 'revelation_page' );

    // параметры: $id, $title, $callback, $page, $section, $args
    add_settings_field('field_license', 'Лицензия', 'field_license_display', 'revelation_page', 'section_id' );
}



function field_license_display(){
    $val = get_option('revelation_options');
    if ( isset($val['license']) ) {
        $val = $val['license'];
    } else {
        $val = '';
    }

    $license_verify = get_option('license_raten_verify');
    $license_error  = get_option('license_raten_error');

    ?>
    <?php if ( ! empty( $license_error ) ) echo '<p><strong>Ошибка проверки лицензионного ключа. Проверьте ключ и повторите.</strong></p>'; ?>
    <input type="text" name="revelation_options[license]" class="regular-text" value="<?php echo esc_attr( $val ) ?>" />
    <p class="description">Чтобы активировать тему, необходимо указать лицензионный ключ, который пришел на почту после покупки темы.</p>
    <?php
}


## Очистка данных
function sanitize_callback( $options ){

    global $api_url;
    global $ver;

    foreach( $options as $name => & $val ){

        if ( $name == 'license' ) {
            $license = $val;

            $api_params = array(
                'action'    => 'activate_license',
                'license'   => $license,
                'item_name' => urlencode( 'raten' ),
                'version'   => $ver,
                'type'      => 'theme',
                'url'       => home_url(),
            );

            // Call the custom API.
            $response = wp_remote_post( $api_url, array(
                'timeout'   => 15,
                'sslverify' => false,
                'body'      => $api_params
            ) );

            if ( is_wp_error( $response ) ) {
                $api_url = str_replace( "https", "http", $api_url );

                $response = wp_remote_post( $api_url, array(
                    'timeout'   => 15,
                    'sslverify' => false,
                    'body'      => $api_params
                ) );
            }

            // make sure the response came back okay
            if ( is_wp_error( $response ) )
                return false;

            // decode the license data
            $license_data = wp_remote_retrieve_body( $response );
			//print_r($license_data);
            

            if (mb_substr($license_data, 0, 2) == 'ok') {
				//print_r($license_data);
                update_option( 'license_raten_verify', time() + (WEEK_IN_SECONDS * 4) );
                delete_option( 'license_raten_error' );
            } else {
                //update_option( 'license_raten_error', $license_data );
				//print_r($license_data);
				//print_r($license_data);
				update_option( 'license_raten_error', "error");
            }

            //print_r($response);
            //print_r($license_data);

            // $license_data->license will be either "active" or "inactive"
            // update_option( 'license_verify', "error");
        }
    }


    return $options;
}
