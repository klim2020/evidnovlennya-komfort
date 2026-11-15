<?php
/**
 * Plugin Name: єВідновлення — лендинг
 * Description: Додає шаблон сторінки «єВідновлення» (шапка й футер з теми, посередині — лендинг) та форму «Отримати консультацію», заявки з якої приходять на пошту адміністратора сайту.
 * Version:     1.0.0
 * Author:      Klym
 * Text Domain: evidnovlennya-landing
 * Requires at least: 5.3
 * Requires PHP: 7.0
 *
 * @package Evidnovlennya_Landing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EVD_VERSION', '1.0.0' );
define( 'EVD_FILE', __FILE__ );
define( 'EVD_DIR', plugin_dir_path( __FILE__ ) );
define( 'EVD_URL', plugin_dir_url( __FILE__ ) );
define( 'EVD_TEMPLATE', 'evidnovlennya.php' );

/**
 * Показуємо шаблон у списку «Шаблон» у налаштуваннях сторінки.
 */
add_filter(
	'theme_page_templates',
	function ( $templates ) {
		$templates[ EVD_TEMPLATE ] = 'єВідновлення (лендинг)';
		return $templates;
	}
);

/**
 * Чи відкрита зараз сторінка з нашим шаблоном.
 */
function evd_is_landing() {
	return is_singular( 'page' ) && EVD_TEMPLATE === get_page_template_slug( get_queried_object_id() );
}

/**
 * Підставляємо файл шаблону з плагіна.
 */
add_filter(
	'template_include',
	function ( $template ) {
		if ( evd_is_landing() ) {
			$file = EVD_DIR . 'templates/' . EVD_TEMPLATE;
			if ( file_exists( $file ) ) {
				return $file;
			}
		}
		return $template;
	},
	99
);

/**
 * Стилі та скрипти — лише на цій сторінці.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		if ( ! evd_is_landing() ) {
			return;
		}
		wp_enqueue_style( 'evd-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap', array(), null );
		wp_enqueue_style( 'evd-aos', 'https://unpkg.com/aos@2.3.4/dist/aos.css', array(), '2.3.4' );
		wp_enqueue_style( 'evd-landing', EVD_URL . 'assets/css/evd.css', array( 'evd-aos' ), EVD_VERSION );

		wp_enqueue_script( 'evd-aos', 'https://unpkg.com/aos@2.3.4/dist/aos.js', array(), '2.3.4', true );
		wp_enqueue_script( 'evd-landing', EVD_URL . 'assets/js/evd.js', array( 'evd-aos' ), EVD_VERSION, true );
	},
	20
);

/**
 * Обробка форми «Отримати консультацію» — лист на пошту адміністратора.
 * Адресу можна змінити в «Налаштування → Загальні → Адреса електронної пошти адміністрації».
 */
function evd_handle_consult() {
	$back = isset( $_POST['evd_back'] ) ? esc_url_raw( wp_unslash( $_POST['evd_back'] ) ) : home_url( '/' );
	$back = wp_validate_redirect( $back, home_url( '/' ) );

	$valid_nonce = isset( $_POST['evd_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['evd_nonce'] ) ), 'evd_consult' );

	// Пастка для ботів: справжні відвідувачі це поле не бачать.
	if ( ! empty( $_POST['evd_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'evd_sent', '1', $back ) );
		exit;
	}

	$name    = isset( $_POST['evd_name'] ) ? sanitize_text_field( wp_unslash( $_POST['evd_name'] ) ) : '';
	$phone   = isset( $_POST['evd_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['evd_phone'] ) ) : '';
	$message = isset( $_POST['evd_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['evd_message'] ) ) : '';

	if ( ! $valid_nonce || '' === $name || '' === $phone ) {
		wp_safe_redirect( add_query_arg( 'evd_sent', 'err', $back ) );
		exit;
	}

	$to      = apply_filters( 'evd_consult_email', get_option( 'admin_email' ) );
	$subject = 'Заявка єВідновлення: ' . $name;
	$body    = "Нова заявка зі сторінки «єВідновлення»\n\n"
		. "Ім'я: {$name}\n"
		. "Телефон: {$phone}\n"
		. 'Повідомлення: ' . ( '' !== $message ? $message : '—' ) . "\n\n"
		. 'Сторінка: ' . $back . "\n"
		. 'Час: ' . wp_date( 'd.m.Y H:i' ) . "\n";

	$sent = wp_mail( $to, $subject, $body );

	wp_safe_redirect( add_query_arg( 'evd_sent', $sent ? '1' : 'err', $back ) );
	exit;
}
add_action( 'admin_post_evd_consult', 'evd_handle_consult' );
add_action( 'admin_post_nopriv_evd_consult', 'evd_handle_consult' );
