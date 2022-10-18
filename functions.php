<?php
// Login History
	add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
	function my_custom_dashboard_widgets()
	{
		global $wp_meta_boxes;
		wp_add_dashboard_widget(
			'custom_help_widget',
			'Login History',
			'custom_dashboard_history'
		);
	}
	function custom_dashboard_history()
	{
		global $wpdb;
		$table = 'wpmo_login_history';
		$total_login_history = $wpdb->get_results("SELECT domain_url, COUNT(`status`) as no_of_visits_today ,COUNT(user_id) as total_visits FROM wpmo_login_history GROUP BY domain_url;");
		$today_login_history = $wpdb->get_results("SELECT domain_url, COUNT(`domain_url`) as no_of_visits_today FROM wpmo_login_history where updated_at = CURDATE() GROUP BY domain_url;");
		?>
		<div class="log_history" style="display:flex;">

			<!-- Todays Visit -->
			<table class="striped widefat">
				<tbody>
					<tr>
						<th>Domain</th>
						<th>No. Of Visits Total</th>
					</tr>
					<?php foreach ($total_login_history as $value) {

					?>
						<tr>
							<td><a target="_blank" href="<?php echo $value->domain_url ?>"><?php echo $value->domain_url ?></a></td>
							<td><?php echo $value->total_visits ?></td>
						</tr>
					<?php   } ?>
				</tbody>
			</table>
			<!-- Todays Visit -->
			<table class="striped widefat">
				<tbody>
					<tr>
						<th>No. Of Visits Today</th>
					</tr>
					<?php foreach ($today_login_history as $value) {
					?>
						<tr>
							<td><?php echo $value->no_of_visits_today ?></td>
						</tr>
					<?php   } ?>
				</tbody>
			</table>
		</div>

	<?php

	}

	add_action('wp_login', 'my_handle_login', 10, 2);
	function my_handle_login($username, $user)
	{
		global $wpdb;
		$domain_url  = $_SERVER['REQUEST_URI'];
		$user_id     = $user->ID;
		$log_count   = 1;
		$table       = 'wpmo_login_history';
		$data = array(
			'domain_url'  => $domain_url,
			'user_id'     => $user_id,
			'login_count' => $log_count,
			'updated_at'  => current_time('Y-m-d h:i:s'),
			'status'      => 1,
		);
		$wpdb->insert($table, $data);
	}
