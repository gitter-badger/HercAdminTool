<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Game Accounts</h1>
			</div>
		</div>
	</div>
	<p>Item DB search. Enter your search term(s) and click "Search". All fields are "wildcard". Use "=" before a string in a field to search specifically by that string for that field.</p>
	<div class="panel-body">
		<?php echo form_open('database/item_db_resultlist'); ?>
			<center>
				<table class="table">
					<tr>
						<td>
							<label>Item ID</label>
						</td>
						<td>
							<input type="text" name="item_id" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Item Name</label>
						</td>
						<td>
							<input type="text" name="item_name" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Item Type</label>
						</td>
						<td>
							Checkboxes for each item type defined in hat.php
						</td>
					</tr>
					<tr>
						<td>
							<label>Weight</label>
						</td>
						<td>
							Greater than and less than fields
						</td>
					</tr>
					<tr>
						<td>
							<label>Attack</label>
						</td>
						<td>
							Greater than and less than fields, hide if "Weapon" not selected for "Item Type"
						</td>
					</tr>
					<tr>
						<td>
							<label>Defense</label>
						</td>
						<td>
							Greater than and less than fields, hide if "armor" not selected for "item type"
						</td>
					</tr>
					<tr>
						<td>
							<label>Slots</label>
						</td>
						<td>
							Greater than and less than fields, hide if "armor" or "weapon" not selected for "item type"
						</td>
				</table>
				<div class="row">
					<button type="submit" class="btn btn-success">Submit search</button>
				</div>
			</center>
		<?php echo form_close(); ?>
	</div>
</div>