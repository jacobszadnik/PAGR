<?php 
	/**
	 * application_bridge.php
	 * PAGR External Application Bridge
	 *
	 * This file defines the different functions that external applications
	 * can use to gather information from PAGR.  (The most obvious of which
	 * is the PAGR Android application, though in posting the right data in
	 * the right fields, anything is possible.)
	 *
	 * Fields:
	 *
	 * $_REQUEST['pagr_exec'] = the name of the action to perform (see list
	 * below)
	 *
	 * All remaining fields are dependent on the pagr_exec you're calling:
	 * 
	 *      $_REQUEST field      |      What it is      |      Functions using it
	 * --------------------------+----------------------+------------------------------
	 * 		handset_id			 |  Android handset ID  |			all
	 * --------------------------+----------------------+------------------------------
	 *		reservation_id		 |	PAGR reservation ID | create_reservation returns, 
	 *							 |                      | get_, modify_reservation uses
	 *
	 * @author Trevor Toryk
	 * @license Proprietary
	 * @package com.pagr.server
	 */
?>
<?php
	// The namespace is used for security by encapsulation.
	// Basically, now the exec statement will only call functions
	// in this namespace (on this page).
	namespace pagr\app_bridge;
?>
<?php
	function create_reservation() {
		echo "create a reservation!";
	}
	
	function get_reservation() {
		echo "get a reservation!";
	}
	
	function modify_reservation() {
		echo "mod a reservation!";
	}
	
	function create_order() {
		echo "create an order!";
	}
	
	function get_order() {
		echo "get an order!";
	}
	
	function modify_order() {
		echo "mod an order!";
	}
?>
<?php
	// Simply calls the function given in $_REQUEST['pagr_exec'] provided
	// it is within this namespace.  (And provided it exists <_< )
	if (!isset($_REQUEST['pagr_exec'])) die('ERROR: pagr_exec must be defined!');
	call_user_func("pagr\app_bridge\\" . $_REQUEST['pagr_exec']);
?>