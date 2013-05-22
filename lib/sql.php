<?php
	function printrThis($string) {
		echo "<pre>";print_r($string);echo "</pre>";
	}

	/* Let us simulate some data from two tables, userDetails and userEmails. Hard coding it means our
	 * demo doesn't have to worry about SQL.
	 */
	function getSQLData() {
		// Here are our two imaginery SQL tables, userDetails and userEmails
		$userDetails = array(
			array("id"=>"112", "name"=>"John Doe", "age"=>"18"),
			array("id"=>"113", "name"=>"Jane Doe", "age"=>"19"),
			array("id"=>"114", "name"=>"Leslie Jude", "age"=>"23"),
			array("id"=>"115", "name"=>"Tila Michaels", "age"=>"27"),
			array("id"=>"116", "name"=>"Tyqwan Harris", "age"=>"17"),
			array("id"=>"117", "name"=>"Charles Darwin", "age"=>"22"),
			array("id"=>"118", "name"=>"Mick Jagger", "age"=>"31"),
			array("id"=>"119", "name"=>"Alex Dane", "age"=>"29"),
			array("id"=>"120", "name"=>"Jennifer Johnson", "age"=>"30"),
			array("id"=>"121", "name"=>"Sabrina Hope", "age"=>"29")
		);

		// Note we don't have an email for every user
		$userEmails = array(
			array("id"=>"112", "email"=>"jodoe@email.com"),
			array("id"=>"113", "email"=>"jadoe@email.com"),
			array("id"=>"115", "email"=>"tmichaels@email.com"),
			array("id"=>"116", "email"=>"tharris@email.com"),
			array("id"=>"118", "email"=>"mjagger@email.com"),
			array("id"=>"119", "email"=>"adane@email.com"),
			array("id"=>"121", "email"=>"shope@email.com")
		);

		// Now we have the data from our 'two tables'; let's join the data on 'id' (in real life we would 
		// probably already have done this with a SQL LEFT JOIN, but we'll quickly do it in PHP). Note that
		// this is a poor but simple implementation of JOIN
		$users = array();
		foreach($userDetails as $userDetail) {
			foreach($userEmails as $userEmail) {
				if($userDetail['id'] == $userEmail['id'])
					$userDetail['email'] = $userEmail['email'];
			}
			array_push($users, $userDetail);
		}

		return $users;
	}
?>