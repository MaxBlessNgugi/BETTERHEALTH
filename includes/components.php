<div id="updateModal" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PHC Diagnosis</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="form-group col-md-6">
                        <label for="ParentName" >Name</label>         
                        <input type="text" class="form-control" id="parentname" placeholder="parentname" required>            
                    </div>
                    <div class="form-group col-md-6">
                        <label for="DiagnosisChildName" >ChildName:</label>
                        <input type="text" class="form-control" id="childname" placeholder="childname">                  
                    </div>      
                    <div class="form-group col-md-6">
                        <label>DiagnosisCode:</label>                      
                        <input type="text" id="diagnosiscode" name="diagnosiscode" class="form-control" placeholder="diagnosiscode">                          
                    </div>           
                            


                </div>                                            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="txt_userid" value="0">
                <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="updtipdPhcDiagnosisModal" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PHC Diagnosis</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="form-group col-md-6">
                        <label for="ParentName" >Name</label>         
                        <input type="text" class="form-control" id="diagparentname" placeholder="parent name" required>            
                    </div>
                    <div class="form-group col-md-6">
                        <label for="DiagnosisChildName" >ChildName:</label>
                        <input type="text" class="form-control" id="diagchildname" placeholder="child name">                  
                    </div>      
                    <div class="form-group col-md-6">
                        <label>DiagnosisCode:</label>                      
                        <input type="text" id="diagnosis_code" name="diagnosis_code" class="form-control" placeholder="diagnosis code">                          
                    </div>           
                            


                </div>                                            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="txt_userid" value="0">
                <!-- <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button> -->
            </div>
        </div>

    </div>
</div>

