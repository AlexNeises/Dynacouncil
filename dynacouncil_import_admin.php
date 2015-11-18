<?php
if($_POST['council_locator_hidden'] == 'Y')
{
	global $wpdb;
	$query_number = $_POST['council_locator_number'];
	update_option('council_locator_number', $query_number);
	
	$result = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'dynacouncil' . " WHERE council_id = " . $query_number . " ORDER BY id DESC LIMIT 1");
	update_option('text_results', $results);

	$history = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'dynacouncil' . " WHERE council_id = " . $query_number . " AND id NOT IN (SELECT MAX(id) FROM wp_dynacouncil) ORDER BY id DESC");
	update_option('history_results', $history);
}
if($_POST['revert_council_hidden'] == 'Y')
{
	global $wpdb;
	$council_id = $_POST['council_id'];
	$council_name = $_POST['council_name'];
	$district_deputy = $_POST['district_deputy'];
	$district_deputy_number = $_POST['deputy_number'];
	$district_deputy_url = $_POST['deputy_url'];
	$insurance_representative = $_POST['insurance_representative'];
	$insurance_representative_url = $_POST['insurance_url'];
	$council_contact_title = $_POST['council_contact_title'];
	$council_contact_name = $_POST['council_contact_name'];
	$council_contact_phone = $_POST['council_contact_phone'];
	$council_contact_email = $_POST['council_contact_email'];
	$meeting_time = $_POST['meeting_time'];
	$meeting_location = $_POST['meeting_location'];
	$meeting_address = $_POST['meeting_address'];
	$council_website = $_POST['council_website'];
	$fourth_degree_council = $_POST['fourth_degree_council'];
	$fourth_degree_council_url = $_POST['fourth_degree_url'];

	$creation = $wpdb->insert($wpdb->prefix . 'dynacouncil', 
		array(
				'id'						=> NULL,
				'date_added'				=> date('Y-m-d G:i:s'),
				'council_id'				=> $council_id,
				'council_name'				=> $council_name,
				'district_deputy'			=> $district_deputy,
				'deputy_number'				=> $district_deputy_number,
				'deputy_url'				=> $district_deputy_url,
				'insurance_representative'	=> $insurance_representative,
				'insurance_url'				=> $insurance_representative_url,
				'council_contact_title'		=> $council_contact_title,
				'council_contact_name'		=> $council_contact_name,
				'council_contact_phone'		=> $council_contact_phone,
				'council_contact_email'		=> $council_contact_email,
				'meeting_time'				=> $meeting_time,
				'meeting_location'			=> $meeting_location,
				'meeting_address'			=> $meeting_address,
				'council_website'			=> $council_website,
				'fourth_degree_council'		=> $fourth_degree_council,
				'fourth_degree_url'			=> $fourth_degree_council_url
		)
	);
}
if($_POST['add_council_hidden'] == 'Y')
{
	global $wpdb;
	$council_id = $_POST['add_council_council_number'];
	$council_name = $_POST['add_council_council_name'];
	$district_deputy = $_POST['add_council_district_deputy'];
	$district_deputy_number = $_POST['add_council_district_deputy_number'];
	$district_deputy_url = $_POST['add_council_district_deputy_url'];
	$insurance_representative = $_POST['add_council_insurance_representative'];
	$insurance_representative_url = $_POST['add_council_insurance_representative_url'];
	$council_contact_title = $_POST['add_council_council_contact_title'];
	$council_contact_name = $_POST['add_council_council_contact_name'];
	$council_contact_phone = $_POST['add_council_council_contact_phone'];
	$council_contact_email = $_POST['add_council_council_contact_email'];
	$meeting_time = $_POST['add_council_meeting_time'];
	$meeting_location = $_POST['add_council_meeting_location'];
	$meeting_address = $_POST['add_council_meeting_address'];
	$council_website = $_POST['add_council_council_website'];
	$fourth_degree_council = $_POST['add_council_fourth_degree_council'];
	$fourth_degree_council_url = $_POST['add_council_fourth_degree_council_url'];

	$creation = $wpdb->insert($wpdb->prefix . 'dynacouncil', 
		array(
				'id'						=> NULL,
				'date_added'				=> date('Y-m-d G:i:s'),
				'council_id'				=> $council_id,
				'council_name'				=> $council_name,
				'district_deputy'			=> $district_deputy,
				'deputy_number'				=> $district_deputy_number,
				'deputy_url'				=> $district_deputy_url,
				'insurance_representative'	=> $insurance_representative,
				'insurance_url'				=> $insurance_representative_url,
				'council_contact_title'		=> $council_contact_title,
				'council_contact_name'		=> $council_contact_name,
				'council_contact_phone'		=> $council_contact_phone,
				'council_contact_email'		=> $council_contact_email,
				'meeting_time'				=> $meeting_time,
				'meeting_location'			=> $meeting_location,
				'meeting_address'			=> $meeting_address,
				'council_website'			=> $council_website,
				'fourth_degree_council'		=> $fourth_degree_council,
				'fourth_degree_url'			=> $fourth_degree_council_url
		)
	);
}
if($_POST['update_council_hidden'] == 'Y')
{
	global $wpdb;
	$council_id = $_POST['council_id'];
	$council_name = $_POST['council_name'];
	$district_deputy = $_POST['district_deputy'];
	$district_deputy_number = $_POST['deputy_number'];
	$district_deputy_url = $_POST['deputy_url'];
	$insurance_representative = $_POST['insurance_representative'];
	$insurance_representative_url = $_POST['insurance_url'];
	$council_contact_title = $_POST['council_contact_title'];
	$council_contact_name = $_POST['council_contact_name'];
	$council_contact_phone = $_POST['council_contact_phone'];
	$council_contact_email = $_POST['council_contact_email'];
	$meeting_time = $_POST['meeting_time'];
	$meeting_location = $_POST['meeting_location'];
	$meeting_address = $_POST['meeting_address'];
	$council_website = $_POST['council_website'];
	$fourth_degree_council = $_POST['fourth_degree_council'];
	$fourth_degree_council_url = $_POST['fourth_degree_url'];

	$creation = $wpdb->insert($wpdb->prefix . 'dynacouncil', 
		array(
				'id'						=> NULL,
				'date_added'				=> date('Y-m-d G:i:s'),
				'council_id'				=> $council_id,
				'council_name'				=> $council_name,
				'district_deputy'			=> $district_deputy,
				'deputy_number'				=> $district_deputy_number,
				'deputy_url'				=> $district_deputy_url,
				'insurance_representative'	=> $insurance_representative,
				'insurance_url'				=> $insurance_representative_url,
				'council_contact_title'		=> $council_contact_title,
				'council_contact_name'		=> $council_contact_name,
				'council_contact_phone'		=> $council_contact_phone,
				'council_contact_email'		=> $council_contact_email,
				'meeting_time'				=> $meeting_time,
				'meeting_location'			=> $meeting_location,
				'meeting_address'			=> $meeting_address,
				'council_website'			=> $council_website,
				'fourth_degree_council'		=> $fourth_degree_council,
				'fourth_degree_url'			=> $fourth_degree_council_url
		)
	);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<div class="wrap">
	<h2>Dynamic Council Editor <?php print $reverted; ?></h2>
	<p>You can either search for an existing council to make updates, or you can add a new council using the forms below.</p>
	<div class="newmenu">
		<ul>
			<li><a href="javascript:void(0)"><span>Council Information Locator</span></a></li>
			<form name="council_locator_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<ul>
					<li>
						<table>
							<tr>
								<td width="50%" class="left">Council Number: </td>
								<td class="left"><input class="input_class" type="number" value="<?php print $query_number; ?>" name="council_locator_number"></td>
							</tr>
						</table>
					</li>
					<li>
						<table>
							<tr>
								<td class="center">
									<input type="hidden" name="council_locator_hidden" value="Y">
									<input type="submit" name="submit" value="Retrieve Information" />
								</td>
							</tr>
						</table>
					</li>
				</ul>
			</form>
		</ul>
	</div>
	<br/>
	<?php if(!isset($result[0])) : ?>
		<div class="newmenu">
			<ul>
				<li><a href="javascript:void(0)"><span>Add a Council</span></a></li>
				<form name="add_council_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
					<ul>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Number: </td>
									<td class="left"><input class="input_class" type="number" name="add_council_council_number"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Name: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_council_name"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">District Deputy: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_district_deputy"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">District Deputy Number: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_district_deputy_number"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">District Deputy URL: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_district_deputy_url"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Insurance Representative: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_insurance_representative"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Insurance Representative URL: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_insurance_representative_url"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Contact Title: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_council_contact_title"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Contact Name: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_council_contact_name"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Contact Phone: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_council_contact_phone"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Contact Email: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_council_contact_email"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Meeting Time: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_meeting_time"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Meeting Location: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_meeting_location"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Meeting Address: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_meeting_address"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Council Website: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_council_website"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Fourth Degree Council: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_fourth_degree_council"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td width="50%" class="left">Fourth Degree Council URL: </td>
									<td class="left"><input class="input_class" type="text" name="add_council_fourth_degree_council_url"></td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td class="center">
										<input type="hidden" name="add_council_hidden" value="Y">
										<input type="submit" name="submit" value="Add Council" />
									</td>
								</tr>
							</table>
						</li>
					</ul>
				</form>
			</ul>
		</div>
		<br/>
	<?php endif; ?>
	<div class="newmenu">
		<ul>
			<?php if(isset($result[0])) : ?>
				<li><a href="javascript:void(0)"><span>Council Information</span></a></li>
				<form name="update_council_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
					<?php foreach($result[0] as $key => $obj) : ?>
						<?php $words = ucwords(str_replace("_", " ", $key)) . ":"; ?>
						<?php if(strpos($words, 'Url') !== FALSE) : ?>
							<?php $words = str_replace("Url", "URL", $words); ?>
						<?php endif; ?>
						<?php if($key === 'id' || $key === 'date_added' || $key === 'council_id') : ?>
							<input type="hidden" value="<?php print $obj; ?>" name="<?php print $key; ?>"/>
						<?php else : ?>
							<table>
								<tr>
									<td width="50%" class="left"><?php print $words; ?></td>
									<?php if($key === 'meeting_time' || $key === 'meeting_location' || $key === 'meeting_address') : ?>
										<td class="left"><textarea class="input_class" name="<?php print $key; ?>"><?php print $obj; ?></textarea></td>
									<?php else : ?>
										<td class="left"><input class="input_class" type="text" value="<?php print $obj; ?>" name="<?php print $key; ?>"></td>
									<?php endif; ?>
								</tr>
							</table>
						<?php endif; ?>
					<?php endforeach; ?>
					<table>
						<tr>
							<td class="center">
								<input type="hidden" name="update_council_hidden" value="Y">
								<input type="submit" name="submit" value="Update Council Information" />
							</td>
						</tr>
					</table>
				</form>
			<?php endif; ?>
		</ul>
	</div>
	<br/>
	<?php if(isset($history[0])) : ?>
		<div id="cssmenu">
			<ul>
				<li><a href="javascript:void(0)"><span>History</span></a></li>
				<?php $timestamp = ''; ?>
				<?php foreach($history as $row) : ?>
					<?php foreach($row as $key => $data) : ?>
						<?php if($key === 'date_added') : ?>
							<?php $timestamp = $data; ?>
						<?php endif; ?>
					<?php endforeach; ?>
					<li><a href="javascript:void(0)"><span>Council Information (<?php print date('M j Y - g:i A e', strtotime($timestamp)); ?>)</span></a>
						<ul>
							<form name="revert_council_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
								<?php foreach($row as $key => $obj) : ?>
									<?php $words = ucwords(str_replace("_", " ", $key)) . ":"; ?>
									<?php if(strpos($words, 'Url') !== FALSE) : ?>
										<?php $words = str_replace("Url", "URL", $words); ?>
									<?php endif; ?>
									<?php $id = ''; ?>
									<?php if($key === 'id') : ?>
										<?php $id = $obj; ?>
									<?php endif; ?>
									<?php if($key === 'id' || $key === 'date_added' || $key === 'council_id') : ?>
										<input type="hidden" value="<?php print $obj; ?>" name="<?php print $key; ?>"/>
									<?php else : ?>
										<li>
											<a>
												<table>
													<tr>
														<td width="50%" class="left"><?php print $words; ?></td>
														<?php if($key === 'meeting_time' || $key === 'meeting_location' || $key === 'meeting_address') : ?>
															<td class="left"><textarea class="input_class" name="<?php print $key; ?>" readonly><?php print $obj; ?></textarea></td>
														<?php else : ?>
															<td class="left"><input class="input_class" type="text" value="<?php print $obj; ?>" name="<?php print $key; ?>" readonly></td>
														<?php endif; ?>
													</tr>
												</table>
											</a>
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
								<li>
									<a>
										<table>
											<tr>
												<td class="center">
													<input type="hidden" name="revert_council_hidden" value="Y">
													<input type="submit" name="submit" value="Use This Version"/>
												</td>
											</tr>
										</table>
									</a>
								</li>
							</form>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>
<script>
$(document).ready(function () {
	$('#cssmenu > ul > li:has(ul)').addClass("has-sub");
	$('#cssmenu > ul > li > a').click(function() {
		var checkElement = $(this).next();

		$('#cssmenu li').removeClass('active');
		$(this).closest('li').addClass('active');

		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).closest('li').removeClass('active');
			checkElement.slideUp('normal');
		}

		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('#cssmenu ul ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
		}

		if(checkElement.is('ul')) {
			return false;
		} else {
			return true;
		}
	});
})
</script>