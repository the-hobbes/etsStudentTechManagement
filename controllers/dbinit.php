<?php

class dbinit extends Controller{
		
	function __construct($app){
		parent::__construct($app);
	}

	function index(){
		$this->view->render('view_dbinit');
	}

	function createTables(){
			$query = "CREATE TABLE tbl_payroll ( 
		pk_id                INT NOT NULL,
		fk_netid             VARCHAR( 100 ) NOT NULL,
		fld_startdate        DATE,
		fld_enddate          DATE,
		fld_employeeid       VARCHAR( 100 ),
		fld_budgetcode       VARCHAR( 100 ),
		fld_employeerecnum   VARCHAR( 100 ),
		fld_currentrate      VARCHAR( 100 ),
		fld_newrate          VARCHAR( 100 ),
		fld_hrsperweek       VARCHAR( 100 ),
		fld_costperweek      VARCHAR( 100 ),
		fld_hlhours          VARCHAR( 100 ),
		fld_cdchours         VARCHAR( 100 ),
		fld_hlcost           VARCHAR( 100 ),
		fld_cdccost          VARCHAR( 100 ),
		fld_confagreement    BOOL,
		fld_quizzesdone      VARCHAR( 100 ),
		CONSTRAINT pk_tbl_payroll PRIMARY KEY ( pk_id ),
		CONSTRAINT pk_tbl_payroll_0 UNIQUE ( fk_netid )
	 );";
	
		$this->db->query($query, false);
	
		$query = "
	 CREATE TABLE tbl_application ( 
		pk_id                INT NOT NULL,
		fk_netid             VARCHAR( 100 ) NOT NULL,
		fld_prevworked       BOOL,
		fld_wrkeligible      BOOL,
		fld_undergrad        BOOL,
		fld_graduatestudent  BOOL,
		fld_credits          VARCHAR( 100 ),
		fld_workstudy        VARCHAR( 100 ),
		fld_employername     VARCHAR( 100 ),
		fld_employeraddress  VARCHAR( 100 ),
		fld_employerphone    VARCHAR( 100 ),
		fld_prevpayrate      VARCHAR( 100 ),
		fld_hrsworked        VARCHAR( 100 ),
		fld_jobduties        VARCHAR( 500 ),
		fld_maywecontact     BOOL,
		fld_refname          VARCHAR( 100 ),
		fld_refphone         VARCHAR( 100 ),
		fld_refrelationship  VARCHAR( 100 ),
		fld_goodcandidate    VARCHAR( 500 ),
		fld_prevcustexperience VARCHAR( 500 ),
		fld_prevcts          VARCHAR( 500 ),
		CONSTRAINT pk_tlb_application PRIMARY KEY ( pk_id ),
		CONSTRAINT pk_tbl_application UNIQUE ( fk_netid )
	 );";

		$this->db->query($query, false);

		$query ="
			 CREATE TABLE tbl_people ( 
				pk_netid             VARCHAR( 100 ) NOT NULL,
				fld_firstname        VARCHAR( 100 ) NOT NULL,
				fld_lastname         VARCHAR( 100 ) NOT NULL,
				fld_middleinitial    VARCHAR( 1 ),
				fld_streetaddress    VARCHAR( 100 ),
				fld_zipcode          VARCHAR( 100 ),
				fld_email            VARCHAR( 100 ) NOT NULL,
				fld_major            VARCHAR( 100 ),
				fld_graddate         VARCHAR( 100 ),
				fld_phone            VARCHAR( 100 ),
				fld_schedulecode     VARCHAR( 100 ),
				CONSTRAINT pk_tbl_people PRIMARY KEY ( pk_netid )
			 );";
		
		$this->db->query($query, false);
		header('Location: '.siteURL('dbinit'));
	}

	function deleteTables(){
		$this->db->query("DROP TABLE tbl_payroll, tbl_application, tbl_people", false);
		header('Location: '.siteURL('dbinit'));
	}

	function createData(){
		
	}

	function herp(){
		echo 'derp';
	}
}


?>