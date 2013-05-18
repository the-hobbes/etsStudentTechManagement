etsApplication
==============

Web application to apply for work, UVM ETS Department

REQUIREMENTS

ETS Student tech team
Application ID

Personal Info *REQUIRED*
  Last, first, MI, PHONE, mandatory
	street city state zip email address
	UVM netid (error checking)
	UVM major

Eligibility to work in the united states (yes or no) for example: US citizen, perm resident, refugee? *REQUIRED*

previously worked at UVM (yes or no)? 
currently an undergrad student (yes or no)?
grad student (yes or no)?

enrolled for ____credits
Expected date of graduation____ (mm/dd/yyyy) *REQUIRED*

Enter any work study award amount (if applicable):______ (ETS employs student techs with or without WS)

List previous employment:
	Employer (name, address): Dates of employment: Pay rate: Hours per week: Job duties: OK to contact?
	References: Name Phone Relationship to this person (previous supervisor, professor, etc)

INSERT brief job descriptions (link to our job descriptions LINK: http://www.uvm.edu/it/help/?Page=CDCjobs.html as an example)
	Please tell us what makes you a good candidate for this job.
	Please describe any previous customer service experience you have had.
	Please describe any computer troubleshooting service experience you have had.

----------------------------------------------------------------------------------------------------------------------------------

EXTRA REQUIREMENTS

+ have an htaccess file in the dir to have people login, then pull ldap information from that. (grey out the netid- should not be editable)
+ primary key should be netid+timestamp

+ two tables: applicants and employee
	- when a person is hired, then move their information to the employee table. This table will not be purged.

	- purge applicant table every six months
		if an application has been purged, send an email to the applicant asking them to reapply if they are still interested

+ must be a way to manage the tables (delete and move people around)
+ must email carol and travis (etstechs@uvm.edu) whenever someone applies, with a link to the application interface 

----------------------------------------------------------------------------------------------------------------------------------

STORYBOARD

USER FLOW
	user goes to site
		must log in

	success takes to application page
	failure takes to error page

	On application page, user is presented with form to fill out.
		validates the required fields, (stickyform)
		User submits the application
			Auto-response to student (thank you)
			Auto-response to etstechs (here is the application and a link to the management page)

MANAGER FLOW
	manager goes to management site
		logs in with ldap
		list of pending applications
		list of employees
		ability to manage both (edit, delete, move)

----------------------------------------------------------------------------------------------------------------------------------

TIME FRAME
Before the semester is over:
	Release of dev 1, a form that will email ets techs with the results of an application
Over summer
	Release of full project with management capabilities


