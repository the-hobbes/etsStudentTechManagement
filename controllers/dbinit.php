<?php

class dbinit extends Controller{
		
	function index(){
		$this->view->render('view_dbinit');
	}

	function createTables(){
			$query = "CREATE TABLE tbl_payroll ( 
		pk_id                INT NOT NULL auto_increment,
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
	
		$this->db->execute($query);
	
		$query = "
	 CREATE TABLE tbl_application ( 
		pk_id                INT NOT NULL auto_increment, 
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

		$this->db->execute($query);

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
		$this->db->execute("DROP TABLE tbl_payroll, tbl_application, tbl_people");
		header('Location: '.siteURL('dbinit'));
	}

	function createData(){

		//tbl_people data
		$this->db->execute("INSERT INTO tbl_people VALUES('mftoth', 'Michael', 'Toth', 'F', '163 North Union St.', 
			'08530', 'mftoth@uvm.edu', 'BSCS', 'Spring 2014', '609-468-2946', 'MFT')");

		$this->db->execute("INSERT INTO tbl_people VALUES('ccaldwell', 'Carol', 'Caldwell', 'C', '123 fake st.', 
			'05401', 'ccaldwel@uvm.edu', 'BSCS', 'Spring 2000', '555-555-5555', 'CCE')");

		$this->db->execute("INSERT INTO tbl_people VALUES('jman', 'Joe', 'Man', 'D', '132 Evergreen Terrace', 
			'97475', 'jman@uvm.edu', 'English', 'Spring 2013', '541-267-1313', 'JDM')");

		$this->db->execute("INSERT INTO tbl_people VALUES('mkeyes', 'Mauro', 'Keyes', 'A', '21 Main street', 
			'08559', 'mkeyes@uvm.edu', 'Business', 'Spring 2013', '609-111-1111', 'MAK')");

		//tbl_application data
		$this->db->execute("INSERT INTO tbl_application
				VALUES(null, 'mftoth', '1', '1', '1', '0', '86', '$100', 'Eileen Flynn', '123 main st. New Hope, PA', '215-555-5455',
					   '$12.50/hr', '20 hours', 'wholly designed and created her website', '1', 'Kathleen Flynn', '609-903-1855', 
					   'Mommy','I think the fact that I am making this website makes me a good candidate. just sayin',
					   'I have had previous customer experience from working in IT and restaurants',
					   'I have much experience troubleshooting computers. You could say I am an Ace shooter of sorts')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'ccaldwell', '1', '1', '0', '0', '120', '', 'UVM', '1 Main street, Burlington VT', '802-555-5355',
				   '$100/hr', '40 hours', 'Manage team of under performing students who help with tech support', '1', 'Gary Derr', '802-903-1855', 
				   'Some random guy at UVM','I am the boss of this job, I am pretty darn qualified',
				   'Ive been working here for so long, I cant remember',
				   'I deal with kids asking me how to solve problems they cant figure out everyday')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'jman', '1', '1', '0', '1', '120', '', 'Vandeley Industries', '15st and 3rd Ave, NY, NY', '917-555-5515',
				   '$90/hr', '40 hours', 'Exporter and importer of fine linen goods', '1', 'Jerry Seinfeld', '212-231-1855', 
				   'Longtime bud of mine','I like computers and have good management skills',
				   'Dealing with fine linen goods is not as easy as you may think. The world is a dog-eat-dog place. Everyday I deal with customers 
				   on the phone who are complaining about blood stains on the linens they have received. I have learned how to deal with such customers',
				   'One time my printer broke. Upon kicking it as hard as I could, it appeared to fix itself')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'mkeyes', '1', '1', '1', '0', '90', '', 'Stockon Inn', '102 Main street, Stockton NJ', '609-555-5535',
				   '$40/hr', '28 hours', 'I serve as a highly regarded server at a fancy shmancy restaurant', '1', 'Michael Toth', '609-468-2946', 
				   'My best bud for life <3','I will do whatever it takes to make my bosses happy. Whatever it takes.',
				   'I serve dozens of people every day I serve. Not too toot my own horn, but the customers love me',
				   'One time my computer wouldnt turn on. I tried everything imaginable. I googled the issue.. nothing. Finally I realized my computer was unplugged')");

		//Payroll table queries
		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'mftoth', '2012-10-15', '', '1010101', '045121', '39102', '9.50', 
					'10.00', '12', '120', '4', '8', '40', '80', 1, 'ets_quiz1,cdc_quiz1,helpline_quiz1'
				)");

		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'ccaldwell', '2000-3-28', '', '0000101', '045001', '38190', '100.50', 
					'105.0', '40', '4020', '20', '20', '2010', '2010', 1, 'ets_quiz1,cdc_quiz1,helpline_quiz1,ets_quiz2,ets_quiz3'
				)");

		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'jman', '2010-9-21', '', '1011101', '045500', '39222', '11.00', 
					'11.50', '20', '220', '10', '10', '110', '110', 1, 'ets_quiz1,cdc_quiz1,helpline_quiz1,copyright_quiz1'
				)");

		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'mkeyes', '2011-2-17', '', '1001101', '045523', '39901', '10.00', 
					'10.50', '10', '100', '3', '7', '30', '70', 1, 'ets_quiz1,cdc_quiz1'
				)");
		

		header('Location: '.siteURL('dbinit'));
	}

	function herp(){
		echo 'derp';
	}
}


?>