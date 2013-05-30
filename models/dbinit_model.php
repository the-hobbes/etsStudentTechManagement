<?php

class dbinit_model extends Model{

	public $tables;
		
	function __construct(){

		$this->tables['authorizedusers']="CREATE TABLE if not exists tbl_authorizedusers (
				pk_netid		VARCHAR( 100 ) NOT NULL,
				CONSTRAINT pk_tbl_authorizedusers PRIMARY KEY ( pk_netid ));";

	}


	function createTables(){

		$this->tables = array(
			'payroll'=>"CREATE TABLE if not exists tbl_payroll ( 
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
			fld_confagreement    VARCHAR(3)	,
			CONSTRAINT pk_tbl_payroll PRIMARY KEY ( pk_id ),
			CONSTRAINT pk_tbl_payroll_0 UNIQUE ( fk_netid ));",
	
			'application'=>"CREATE TABLE if not exists tbl_application ( 
			pk_id                INT NOT NULL auto_increment, 
			fk_netid             VARCHAR( 100 ) NOT NULL,
			fld_submissiondate   DATE,
			fld_prevworked       VARCHAR(3),
			fld_wrkeligible      VARCHAR(3),
			fld_undergrad        VARCHAR(3),
			fld_graduatestudent  VARCHAR(3),
			fld_credits          VARCHAR( 100 ),
			fld_workstudy        VARCHAR( 100 ),
			fld_employername     VARCHAR( 100 ),
			fld_employeraddress  VARCHAR( 100 ),
			fld_employerphone    VARCHAR( 100 ),
			fld_prevpayrate      VARCHAR( 100 ),
			fld_hrsworked        VARCHAR( 100 ),
			fld_jobduties        VARCHAR( 500 ),
			fld_maywecontact     VARCHAR(3),
			fld_refname          VARCHAR( 100 ),
			fld_refphone         VARCHAR( 100 ),
			fld_refrelationship  VARCHAR( 100 ),
			fld_goodcandidate    VARCHAR( 500 ),
			fld_prevcustexperience VARCHAR( 500 ),
			fld_prevcts          VARCHAR( 500 ),
			CONSTRAINT pk_tbl_application PRIMARY KEY ( pk_id ),
			CONSTRAINT pk_tbl_application UNIQUE ( fk_netid ));",
			
			'people'=>"CREATE TABLE if not exists tbl_people ( 
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
			fld_hashkey		     VARCHAR(70),
			fld_ishired			 BOOL,
			CONSTRAINT pk_tbl_people PRIMARY KEY ( pk_netid ));",

			'quizzes'=>"CREATE TABLE if not exists tbl_quizzes (
				pk_quiz VARCHAR( 100 ) NOT NULL,
				CONSTRAINT pk_tbl_quizzes PRIMARY KEY ( pk_quiz ));",
			
			'peoplequiz'=>"CREATE TABLE if not exists tbl_peoplequiz (
					fk_netid VARCHAR( 100 ) NOT NULL,
					fk_quiz VARCHAR( 100 ) NOT NULL,
					CONSTRAINT pk_tbl_quizzes PRIMARY KEY ( fk_netid, fk_quiz ));"
		);//end tables

		foreach($this->tables as $table){
			$this->db->execute($table);
		}
	}

	function createData(){
		//tbl_people data
		$this->db->execute("INSERT INTO tbl_people VALUES('mftoth', 'Michael', 'Toth', 'F', '163 North Union St.', 
			'08530', 'mftoth@uvm.edu', 'BSCS', 'Spring 2014', '609-468-2946', 'MFT', '".$this->people_model->hash2fields('mftoth','mftoth@uvm.edu')."','1')");

		$this->db->execute("INSERT INTO tbl_people VALUES('ccaldwell', 'Carol', 'Caldwell', 'C', '123 fake st.', 
			'05401', 'ccaldwel@uvm.edu', 'BSCS', 'Spring 2000', '555-555-5555', 'CCE', '".$this->people_model->hash2fields('ccaldwell','ccaldwel@uvm.edu')."','1')");

		$this->db->execute("INSERT INTO tbl_people VALUES('jman', 'Joe', 'Man', 'D', '132 Evergreen Terrace', 
			'97475', 'jman@uvm.edu', 'English', 'Spring 2013', '541-267-1313', 'JDM', '".$this->people_model->hash2fields('jman','jman@uvm.edu')."','1')");

		$this->db->execute("INSERT INTO tbl_people VALUES('mkeyes', 'Mauro', 'Keyes', 'A', '21 Main street', 
			'08559', 'mkeyes@uvm.edu', 'Business', 'Spring 2013', '609-111-1111', 'MAK', '".$this->people_model->hash2fields('mkeyes','mkeyes@uvm.edu')."','1')");

		$this->db->execute("INSERT INTO tbl_people VALUES('ldavinc', 'Leonardo', 'Davinci', 'A', '1000 industrial ave', 
			'10001', 'ldavinc@uvm.edu', 'Art', 'Spring 2015', '217-223-3132', 'LAD', '".$this->people_model->hash2fields('ldavinc','ldavinc@uvm.edu')."','0')");

		//tbl_application data
		$this->db->execute("INSERT INTO tbl_application
				VALUES(null, 'mftoth', '2012-09-20', 'yes', 'yes', 'yes', 'no', '86', '$100', 'Eileen Flynn', '123 main st. New Hope, PA', '215-555-5455',
					   '$12.50/hr', '20 hours', 'wholly designed and created her website', 'yes', 'Kathleen Flynn', '609-903-1855', 
					   'Mommy','I think the fact that I am making this website makes me a good candidate. just sayin',
					   'I have had previous customer experience from working in IT and restaurants',
					   'I have much experience troubleshooting computers. You could say I am an Ace shooter of sorts')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'ccaldwell', '2000-01-15', 'yes', 'yes', 'no', 'no', '120', '', 'UVM', '1 Main street, Burlington VT', '802-555-5355',
				   '$100/hr', '40 hours', 'Manage team of under performing students who help with tech support', 'yes', 'Gary Derr', '802-903-1855', 
				   'Some random guy at UVM','I am the boss of this job, I am pretty darn qualified',
				   'Ive been working here for so long, I cant remember',
				   'I deal with kids asking me how to solve problems they cant figure out everyday')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'jman', '2010-08-15', 'yes', 'yes', 'no', 'yes', '120', '', 'Vandeley Industries', '15st and 3rd Ave, NY, NY', '917-555-5515',
				   '$90/hr', '40 hours', 'Exporter and importer of fine linen goods', 'yes', 'Jerry Seinfeld', '212-231-1855', 
				   'Longtime bud of mine','I like computers and have good management skills',
				   'Dealing with fine linen goods is not as easy as you may think. The world is a dog-eat-dog place. Everyday I deal with customers 
				   on the phone who are complaining about blood stains on the linens they have received. I have learned how to deal with such customers',
				   'One time my printer broke. Upon kicking it as hard as I could, it appeared to fix itself')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'mkeyes', '2011-02-01', 'yes', 'yes', 'yes', 'no', '90', '', 'Stockon Inn', '102 Main street, Stockton NJ', '609-555-5535',
				   '$40/hr', '28 hours', 'I serve as a highly regarded server at a fancy shmancy restaurant', 'yes', 'Michael Toth', '609-468-2946', 
				   'My best bud for life <3','I will do whatever it takes to make my bosses happy. Whatever it takes.',
				   'I serve dozens of people every day I serve. Not too toot my own horn, but the customers love me',
				   'One time my computer wouldnt turn on. I tried everything imaginable. I googled the issue.. nothing. Finally I realized my computer was unplugged')");

		$this->db->execute("INSERT INTO tbl_application
			VALUES(null, 'ldavinc', '2013-05-21', 'yes', 'yes', 'yes', 'no', '50', '', 'Louvre', '100 main street, Paris Fr.', '111-221-2312',
				   '$100/hr', '20 hours', 'I am a smart man by trade', 'yes', 'Medici', '321-111-2946', 
				   'Some italian dude','I have much experience doing many things. I can work with all types of people. Its cool',
				   'I dont really like people all that much',
				   'What kind of troubleshooting?')");

		//Payroll table queries
		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'mftoth', '2012-10-15', '', '1010101', '045121', '39102', '9.50', 
					'10.00', '12', '120', '4', '8', '40', '80', 'yes'
				)");

		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'ccaldwell', '2000-3-28', '', '0000101', '045001', '38190', '100.50', 
					'105.0', '40', '4020', '20', '20', '2010', '2010','yes'
				)");

		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'jman', '2010-9-21', '', '1011101', '045500', '39222', '11.00', 
					'11.50', '20', '220', '10', '10', '110', '110', 'yes'
				)");

		$this->db->execute("INSERT INTO tbl_payroll VALUES(
					null, 'mkeyes', '2011-2-17', '', '1001101', '045523', '39901', '10.00', 
					'10.40', '10', '100', '3', '7', '30', '70', 'yes'
				)");
		

		//Insert authorized user
		$this->db->execute("INSERT INTO tbl_authorizedusers VALUES('devuser')");

		//insert quizzes
		$this->db->execute("INSERT INTO tbl_quizzes VALUES('ets_quiz1')");
		$this->db->execute("INSERT INTO tbl_quizzes VALUES('ets_quiz2')");
		$this->db->execute("INSERT INTO tbl_quizzes VALUES('helpline_quiz1')");
		$this->db->execute("INSERT INTO tbl_quizzes VALUES('cdc_quiz1')");

		//insert people quizes
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('mftoth', 'ets_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('ccaldwell', 'ets_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('jman', 'ets_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('mkeyes', 'ets_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('mftoth', 'ets_quiz2')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('ccaldwell', 'ets_quiz2')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('mftoth', 'helpline_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('ccaldwell', 'helpline_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('mftoth', 'cdc_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('ccaldwell', 'cdc_quiz1')");
		$this->db->execute("INSERT INTO tbl_peoplequiz VALUES('jman', 'ets_quiz2')");
	}
	
	function deleteTables(){
		$this->db->execute("DROP TABLE tbl_payroll, tbl_application, tbl_people, tbl_authorizedusers, tbl_quizzes, tbl_peoplequiz");
	}

}

?>