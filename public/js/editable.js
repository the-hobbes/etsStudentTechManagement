 $(document).ready(function() {

    siteURL = $("#siteURL").attr('value');

     $('.edit').editable(siteURL + 'people/update', {
         indicator : 'Saving...',
         width: 100 + "%",
         tooltip   : 'Click to edit...',
         id	   	   : 'elementid',
         name      : 'newval',
         onsubmit  : function(settings, td){
         	option = confirm("Are you sure you want to update value?");
         	return option;
         },
         callback : function(value, settings){
            data = this.id;
            pieces = data.split(".");
            hashkey = pieces[0];
            fld = pieces[1];
            table = pieces[2];

            // has an error been returned by validation?
            var v = value.split(" ");
            isErr = v[0].toString();
            isErr = isErr.trim(v);

            if(isErr == '**'){
                // if error has been returned
                // console.log("YES error found by php");
                var t = value.split("|");
                error = t[0];
                newValue = t[1];
                $(this).addClass("error");
                $(this).text(newValue);
                alert(error);
            }
            else{
                // no error has been returned
                // console.log("NO error found by php");
                $(this).removeClass("error");
            }

            //Update calculatable fields in the view (they are already up to date in the DB)
            if(table == "tbl_payroll"){
                $.ajax({
                    type: "POST",
                    url: siteURL + "payroll/getUpdatedPayroll",
                    data: {hashkey: hashkey}
                }).done(function(data){
                    payroll = JSON.parse(data);
                
                   $("#costperweek").text(payroll.fld_costperweek);
                   $("#hrsperweek").text(payroll.fld_hrsperweek);
                   $("#hlcost").text(payroll.fld_hlcost);
                   $("#cdccost").text(payroll.fld_cdccost);
                });//end ajax  

            }
         }//end callback
     });//End editable

    //editable for selectables
     $('.editDD').editable(siteURL + 'people/update', {
         data      : "{'yes':'yes', 'no':'no'}",
         type      : 'select',
         id        : 'elementid',
         height    : 75 + '%',
         width     : 75 + 'px',
         name      : 'newval',
         submit    : 'ok',
         onsubmit  : function(settings, td){
            option = confirm("Are you sure you want to update value?");
            return option;
         },
         callback : function(value, settings){
            data = this.id;
            pieces = data.split(".");
            hashkey = pieces[0];
            fld = pieces[1];
            table = pieces[2];
            //Update calculatable fields in the view (they are already up to date in the DB)
            if(table == "tbl_payroll"){
                $.ajax({
                    type: "POST",
                    url: siteURL + "payroll/getUpdatedPayroll",
                    data: {hashkey: hashkey}
                }).done(function(data){
                    payroll = JSON.parse(data);
                
                   $("#costperweek").text(payroll.fld_costperweek);
                   $("#hrsperweek").text(payroll.fld_hrsperweek);
                   $("#hlcost").text(payroll.fld_hlcost);
                   $("#cdccost").text(payroll.fld_cdccost);
                });//end ajax  

            }
         }//end callback
     });//End editable
 });