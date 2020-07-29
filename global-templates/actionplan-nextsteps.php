<?php
// Show sharing and next steps

if ( $flg_action_plan ) {

	// Display next steps (sharing, print, etc.)

	echo $steps_separator ;

	// Begin HTML
	?>
<h2>What to do next</h2>
<div class="wl_actions__container">
	<div class="wl_actions__row wl_actions_columns">
		<div class="wl_actions_columns__item wl_actions_email__container">
			<form name="frm_email_actionplan" id="frm_email_actionplan" class="frm_email_actionplan" action="" method="POST">
			<div class="wl_actions_email__img wl_action_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-mail.png"
					alt="Email your Action Plan"
					height="70"
					width="70">
			</div>
			<div class="wl_actions_email__info">
					<label class="visually-hidden" for="wl_actionplan_actions__email">Step 1:</label>
					<input class="wl_actionplan_actions__email" type="text" name="wl_actionplan_actions__email" id="wl_actionplan_actions__email" value="<?php echo $wl_actionplan_actions__email;?>" placeholder="you@youremail.com">
			</div>
			<div class="wl_actions_email__btn wl_action_btn">
				<!--a href="#">Email your Action Plan</a-->
				<input type="submit" name="email" value="Email your Action Plan" />
			</div>
			</form>
		</div>
		<div class="wl_actions_columns__item wl_actions_print__container">
			<div class="wl_actions_print__img wl_action_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-print.png"
					alt="Print your Action Plan"
					height="70"
					width="70">
			</div>
			<div class="wl_actions_print__info">
				Pin your Action Plan somewhere visible so you can track your progress
			</div>
			<div class="wl_actions_print__btn wl_action_btn">
				<a onclick="window.print();return false;">Print your Action Plan</a>
			</div>
		</div>
	</div>
	<div class="wl_actions__row wl_actions_full">
		<div class="wl_actions_full__item">
			<div class="wl_actions_share__info">
				<h3>Share your goals</h3>
				<p>It can feel easier to achieve your goals if you have the support of a friend, family member or health professional. If you want to share your Action Plan, please fill in some details below.</p>
			</div>
			<div class="wl_actions_share__img">
				<div class="wl_actions_share__img_container wl_action_icon">
					<img src="<?php echo $theme_path; ?>/assets/images/icon-group.png"
						alt="Share your goals"
						height="70"
						width="70">
				</div>
			</div>
			<div class="wl_actions_share__frm">
				<form name="frm_share_actionplan" id="frm_share_actionplan" class="frm_share_actionplan" action="" method="POST">
					<div class="frm_share_actionplan__row">
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__your_name">Your name</label>
							<input type="text" name="frm_share_actionplan__your_name" id="frm_share_actionplan__your_name" value="<?php echo $frm_share_actionplan__your_name;?>">
						</div>
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__your_email">Your email</label>
							<input type="text" name="frm_share_actionplan__your_email" id="frm_share_actionplan__your_email" value="<?php echo $frm_share_actionplan__your_email;?>">
						</div>
					</div>
					<div class="frm_share_actionplan__row">
						<p>Please enter the name and email address for the person you would like to share your Action Plan with.</p>
					</div>
					<div class="frm_share_actionplan__row">
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__their_name">Their name</label>
							<input type="text" name="frm_share_actionplan__their_name" id="frm_share_actionplan__their_name" value="<?php echo $frm_share_actionplan__their_name;?>">
						</div>
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__their_email">Their email</label>
							<input type="text" name="frm_share_actionplan__their_email" id="frm_share_actionplan__their_email" value="<?php echo $frm_share_actionplan__their_email;?>">
						</div>
					</div>
					<div class="frm_share_actionplan__row">
						<input type="submit" name="share" value="Share your Action Plan" />
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="wl_actions__row wl_actions_full">
		<div class="wl_actions_full__item">
			<div class="wl_actions_help__img">
				<div class="wl_actions_help__img_container wl_action_icon">
					<img src="<?php echo $theme_path; ?>/assets/images/icon-message.png"
						alt="We are here to help"
						height="70"
						width="70">
				</div>
			</div>
			<div class="wl_actions_help__info">
				<h3>Do you need help?</h3>
				<p>If you would like a hand setting up your Action Plan there is help available. The best way to get help is via a referral for a Link Worker through your GP practice.</p>
				<p>If you are having any other issues, please <a href="/get-in-touch/" title="Get in touch">Get in touch</a></p>
			</div>
		</div>
	</div>
</div>
	<?php


}


?>