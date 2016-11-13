<!-- START SCRIPTS -->
    <!-- START PLUGINS -->
    <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery-ui.min.js')}}"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->
    <script type='text/javascript' src="{{asset('js/plugins/icheck/icheck.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/plugins/morris/raphael-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/morris/morris.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/rickshaw/d3.v3.js')}}"></script>
    <script type='text/javascript' src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/owl/owl.carousel.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/tableExport.js')}}"></script>
	  <script type="text/javascript" src="{{asset('js/plugins/tableexport/jquery.base64.js')}}"></script>
	  <script type="text/javascript" src="{{asset('js/plugins/tableexport/html2canvas.js')}}"></script>
	  <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
	  <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
	  <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/base64.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/plugins/moment.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/form-helper.min.js')}}"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
    <!-- END THIS PAGE PLUGINS-->

    <!-- START TEMPLATE -->


    <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/actions.js')}}"></script>

    <script type="text/javascript">
        $('#confirm-delete').on('show.bs.modal', function (e) {
               $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });

        function loadEdit(editurl)
        {
            $.ajax({
                 url: editurl,
                    type: 'get',
                    success: function(result)
                    {
                        
                        $('#editModal').html(result);
                        $('#editModal').modal('show');
                     
                    },
                    error: function()
                    {
                       $('#modalinfo div').html(' <div class="modal-content"><div class="modal-header"><h2>Could not complete the request.</h2></div></div>');
                        $('#modalinfo').modal('show'); 
                    }
            })
        }
    </script>

    
    <!-- END TEMPLATE -->
<!-- END SCRIPTS -->


